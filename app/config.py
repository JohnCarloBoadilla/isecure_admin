import pymysql

DB_CONFIG = {
    "host": "localhost",
    "user": "root",
    "password": "1234",  # set your MySQL password
    "database": "isecuredb",
    "cursorclass": pymysql.cursors.DictCursor
}

def get_db_connection():
    return pymysql.connect(**DB_CONFIG)