import pyodbc
import psycopg2
"""
Hosted by: ElephantSQL 
"""

class Database:
    def __init__(self, app):
        self.app = app

    def connect(self):
        try:
            conn = psycopg2.connect(
                host=self.app.config['PG_HOST'],
                port=self.app.config['PG_PORT'],
                user=self.app.config['PG_USER'],
                password=self.app.config['PG_PASSWORD'],
                database=self.app.config['PG_DATABASE']
            )
            print("Connected to the PostgreSQL database.")
            return conn
        except (Exception, psycopg2.Error) as error:
            print("Error while connecting to PostgreSQL database:", error)


    def execute_query(self, query):
        conn = self.connect()
        cur = conn.cursor()
        try:
            cur.execute(query)
            result = cur.fetchall()
            return result
        except (Exception, psycopg2.Error) as error:
            print("Error executing query:", error)
        finally:
            cur.close()
            conn.close()

    def insert_data(self, query):
        conn = self.connect()
        cur = conn.cursor()
        try:
            cur.execute(query)
            conn.commit()
            print("Data inserted successfully.")
        except (Exception, psycopg2.Error) as error:
            print("Error inserting data:", error)
        finally:
            cur.close()
            conn.close()

    def delete_data(self, query):
        conn = self.connect()
        cur = conn.cursor()
        try:
            cur.execute(query)
            conn.commit()
            print("Data deleted successfully.")
        except (Exception, psycopg2.Error) as error:
            print("Error deleting data:", error)
        finally:
            cur.close()
            conn.close()