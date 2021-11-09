from flask import Flask, render_template, session, request
import secrets

app = Flask(__name__)
app.secret_key = secrets.token_bytes()

items = {5427: ("White Cat", 1024),
         5428: ("Orange Cat", 1024),
         5429: ("Ranibow Cat", 4096),
         5430: ("FLAG", 2147483648),
         5431: ("Evil Cat", 65536),
         5432: ("Null Cat", 0)}


@app.route("/")
def home():
    if 'money' not in session:
        session['money'] = 65536
    if 'stuff' not in session:
        session['stuff'] = []
    return render_template("index.html", items=items)


@app.route("/item/<int:item_id>")
def view_item(item_id):
    return render_template("item.html", item=items[item_id], item_id=item_id)


@app.route("/buy", methods=['POST'])
def buy_item():
    cost = int(request.form.get("cost"))
    item_id = int(request.form.get("item_id"))
    if cost > session['money']:
        return "<script>alert(`You don't have enough money Q_Q`); location.href='/';</script>"
    session['money'] -= cost
    session['stuff'].append(items[item_id])
    return "<script>alert(`Success!`); location='/'</script>"


if __name__ == "__main__":
    app.run(debug=True)
