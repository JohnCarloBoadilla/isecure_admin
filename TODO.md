# TODO: Fix Code Issues

- [x] Create php/models/Database.php: Define Database class with getConnection() method that calls get_db_connection()
- [x] Update php/models/visitor.php: Change require from '../utils/db.php' to 'Database.php'
- [x] Fix php/routes/visitor_form.php: Update includes and database connection
- [x] Update all route files to use Database class and fix include paths
- [x] Update database credentials in db.php
- [x] Test database connection by running a simple PHP script or checking the app
- [x] Check for any remaining errors in other files if needed
- [x] Install Python dependencies (FastAPI, face_recognition, etc.)
- [x] Fix import issues in app/main.py
- [x] Install uvicorn and run FastAPI server
- [x] Verify FastAPI server is running on http://127.0.0.1:8000