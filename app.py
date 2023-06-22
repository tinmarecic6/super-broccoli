from flask import Flask,render_template, request,session,redirect
from db import Database
import hashlib


db_password = "TuQwDbAZieYmjoRNRV1vxLbOUDdKxdJ6"
db_host = "mel.db.elephantsql.com"
db_username = "lqxuynvr"
db_name = "lqxuynvr"

app = Flask(__name__)
app.secret_key = "hehe_secret"
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
		return True
	else:
		print("Not logged in!")
		return redirect("/")

def calculate_final_price(date_from, date_to, accontation, unit_price):
	date_diff = date_to - date_from
	final_price = accontation + (unit_price*date_diff.days)
	return final_price

@app.route("/")
def index():
	check_if_user_loggedin(session)
	return render_template("index.html")

@app.route("/login", methods=["POST","GET"])
def login():
	error = None
	username = request.form['username']
	passw = request.form['password']
	query = f"Select * from users u where username='{username}' and password='{hashlib.md5(passw.encode()).hexdigest()}';"
	result = db.execute_query(query)
	if request.method == "POST":
		if result:
			session["username"] = username
			return redirect("/guest_evidention")			
	return render_template("/index.html", error=error)

@app.route("/guest_evidention")
def guest_evidention():
	check_if_user_loggedin(session)
	query = f"Select * from bill;"
	result = db.execute_query(query)
	modified_results = list()
	for r in result:
		bill_id = r[0]
		guest_name = r[1]
		has_pet = r[2]
		pet_price = r[3]
		accontation = r[4]
		unit_price = r[5]
		date_from = r[6]
		date_to = r[7]
		bill_date = r[8]
		final_price = calculate_final_price(date_from,date_to,accontation,unit_price)
		pet = "Da" if has_pet else "Ne" 
		modified_list = (bill_id,guest_name,pet,pet_price,accontation,final_price,date_from,date_to,bill_date)
		modified_results.append(modified_list)
	return render_template("guest_evidention.html",username=session["username"],results=modified_results)


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