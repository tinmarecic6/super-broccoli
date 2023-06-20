from flask import Flask,render_template, request,session, flash,redirect, url_for
import db
from flask_mysqldb import MySQL
app = Flask(__name__)
app.secret_key = "hehe_secret"

app.config['MYSQL_HOST'] = 'sql206.epizy.com'
app.config['MYSQL_USER'] = 'epiz_26370711'
app.config['MYSQL_PASSWORD'] = 'Jl7HF9t0W5XgmxE'
app.config['MYSQL_DB'] = 'epiz_26370711_app_vlasta'
app.config['MYSQL_CURSORCLASS'] = 'DictCursor'
app.config['MYSQL_PORT'] = 5432


mysql = MySQL(app)

"""
Helper methods
"""
def check_if_user_loggedin(session):
	username = session.get("username")
	if username:
		pass
	else:
		print("Not logged in!")
		return redirect("/")

@app.route("/")
def index():
	check_if_user_loggedin()
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
			session["username"] = username
			return redirect("/guest_evidention")
	return render_template("/index.html", error=error)

@app.route("/guest_evidention")
def guest_evidention():
	check_if_user_loggedin(session)
	return render_template("guest_evidention.html")


@app.route("/cust_signin")
def cust_signin():
	check_if_user_loggedin(session)
	return render_template("/cust_signin.html")

@app.route("/logout")
def logout():
	session.pop("username",None)
	return redirect("/")

if __name__ == '__main__':
	app.run()