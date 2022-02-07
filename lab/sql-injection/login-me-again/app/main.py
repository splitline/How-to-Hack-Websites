from flask import Flask, render_template, redirect, request, g, Response
import sqlite3

app = Flask(__name__)


def get_db():
    db = getattr(g, '_database', None)
    if db is None:
        db = g._database = sqlite3.connect('/tmp/database.db')
        db.row_factory = sqlite3.Row
    return db


@app.before_first_request
def init_db():
    cursor = get_db().cursor()
    cursor.execute("""
    CREATE TABLE IF NOT EXISTS "admin" (
        "username"  TEXT NOT NULL,
        "password"  TEXT NOT NULL
    )
    """)
    cursor.execute("SELECT COUNT(*) as count FROM admin WHERE username='admin'")
    count = cursor.fetchone()['count']
    if count == 0:
        import secrets
        cursor.execute("INSERT INTO admin (username, password) VALUES (?,?)",
                       ('admin', secrets.token_urlsafe()))
    get_db().commit()


@app.teardown_appcontext
def close_connection(exception):
    db = getattr(g, '_database', None)
    if db is not None:
        db.close()


@app.route("/")
def home():
    return render_template("index.html",
                           failed=request.args.get('failed') != None)


@app.route("/login", methods=['POST'])
def login():
    username = request.form.get('username')
    password = request.form.get('password')

    if not username or not password:
        return redirect("/?failed")

    cur = get_db().execute(f"SELECT * FROM admin WHERE (username='{username}')")
    res = cur.fetchone()
    cur.close()

    if res['username'] == 'admin' and res['password'] == password:
        return "FLAG: FLAG{lab_flag}"

    return redirect("/?failed")



@app.route("/source")
def source():
    import re
    source_code = open(__file__).read()
    source_code = re.sub(r'FLAG{.*}', r'FLAG{not_real_flag}', source_code, count=1)
    return Response(source_code, mimetype='text/plain')


if __name__ == '__main__':
    app.run(debug=True)
