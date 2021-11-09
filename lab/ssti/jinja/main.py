from flask import Flask, render_template_string, request, send_file

app = Flask(__name__)


@app.get("/")
def home():
    return render_template_string("""
    <form method="POST">
        <input type="text" name="name" placeholder="Your name">
        <button>submit</button>
    </form>
    <p><a href="/source">Source code</a></p>
    """)


@app.post("/")
def welcome_message():
    name = request.form.get('name')
    return render_template_string("<p>Hello, " + name + "</p>")


@app.get("/source")
def source():
    return send_file(__file__, mimetype="text/plain")


if __name__ == '__main__':
    app.run(threaded=True, debug=True)
