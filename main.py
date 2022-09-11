from flask import Flask,render_template, request, flash,redirect, url_for
import sqlalchemy
app = Flask(__name__)


@app.route("/")
def index():
	return render_template("index.html")

@app.route("/login", methods=["POST","GET"])
def login():
	error = None
	username = request.form['username']
	passw = request.form['password']
	if request.method == "POST":
		if (username != 'tinz' or passw != '123'):
			error = "Krivi username ili password!"
		else:
			return render_template("/guest_evidention.php")
	return render_template("/index.html", error=error)


if __name__ == '__name__':
	app.run(debug=True)