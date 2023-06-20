import pyodbc

password = "Jl7HF9t0W5XgmxE"
host = "sql206.epizy.com"
username = "epiz_26370711"
db_name = "epiz_26370711_app_vlasta"
driver = "{ODBC Driver 17 for SQL Server}"

connection_string = f"DRIVER={driver};SERVER={host};DATABASE={db_name};UID={username};PWD={password}"

def create_connection()->object:
    conn = pyodbc.connect(connstring=connection_string)
    return conn

def close_connection(conn):
    conn.close()
    
def query(conn,query_string) -> dict:
    cursor = conn.cursor()
    cursor.execute(query_string)
    results = cursor.fetchall()
    return results
