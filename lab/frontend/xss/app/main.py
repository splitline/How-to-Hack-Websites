from flask import Flask, render_template, request, redirect, session
import json
import base64
import secrets
import os

from redis import Redis
from rq import Queue

app = Flask(__name__)
app.queue = Queue(connection=Redis('xss-bot'))
app.secret_key = secrets.token_bytes()

users = {
    'guest': 'guest',
    'admin': os.getenv("PASSWORD")
}


@app.route("/")
def main():
    message = request.args.get('message')
    _type = request.args.get('type', "info")
    available_type = ['success', 'info', 'error', 'warning']
    msg_type = _type if _type in available_type else "info"
    if message:
        data = json.dumps({
            "icon": msg_type,
            "titleText": message,
            "timer": 3000,
            "showConfirmButton": False,
            "timerProgressBar": True,
        })
    else:
        data = "null"
    return render_template("index.html", message=data)


@app.route("/login", methods=['POST'])
def login():
    username, password = request.form.get("username"), request.form.get("password")
    if username in users:
        if users[username] == password:
            session['user'] = request.form.get("username")
            return redirect("/getflag")
        return redirect("/?type=error&message=Password Incorrect Q_Q")
    return redirect("/?type=error&message=User not found.")


@app.route("/getflag")
def flag():
    if 'user' in session:
        if session['user'] == 'admin':
            return 'FLAG{lab_flag}'
        return f'<p>嗨，{session["user"]}。只有 <code>admin</code> 能看到 FLAG 喔 :D</p>' +\
            '<a href="/logout">Logout</a>'
    return "wut?"


@app.route("/report", methods=['GET', 'POST'])
def report():
    if request.method == 'POST':
        url = str(request.form.get('url'))
        if url.startswith(request.url_root):
            app.queue.enqueue('xssbot.browse',  url)
            return 'Reported.'
        return f'[error] url should start with "{request.url_root}"'
    
    return f'''
<form method="POST" action="/report">
    <input type="text" name="url" placeholder="{request.url_root}...">
    <button>提交</button>
</form>
'''.strip()
    


@app.route("/logout")
def logout():
    session.clear()
    return redirect("/?message=Logout success!")


if __name__ == '__main__':
    app.run(debug=True)
