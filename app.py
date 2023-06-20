from flask import Flask,render_template, request,session,redirect
from db import Database
import hashlib

app = Flask(__name__)
app.secret_key = "hehe_secret"

db_password = "TuQwDbAZieYmjoRNRV1vxLbOUDdKxdJ6"
db_host = "mel.db.elephantsql.com"
db_username = "lqxuynvr"
db_name = "lqxuynvr"

app = Flask(__name__)
app.config['PG_HOST'] = db_host
app.config['PG_PORT'] = '5432'
app.config['PG_USER'] = db_username
app.config['PG_PASSWORD'] = db_password
app.config['PG_DATABASE'] = db_name

db = Database(app)
conn = db.connect()

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
	check_if_user_loggedin(session)
	
	return render_template("index.html")

@app.route("/login", methods=["POST","GET"])
def login():
	error = None
	username = request.form['username']
	passw = request.form['password']
	result = db.execute_query(f"Select * from users u where username={username} and password={hashlib.md5(passw.encode()).hexdigest()};")
	print(result)
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