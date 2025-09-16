import face_recognition
import numpy as np
from fastapi import UploadFile
import requests

PHP_API = "http://localhost/api"  # Your PHP API endpoint

def get_all_visitors_encodings():
    """Fetch all registered visitors' face encodings from PHP backend."""
    res = requests.get(f"{PHP_API}/visitors/all_face_encodings")
    res.raise_for_status()
    return res.json()  # Expected: [{ "id":1, "name":"John", "face_encoding":[...]}]

def recognize_face(file: UploadFile):
    """Recognize the uploaded visitor image."""
    image = face_recognition.load_image_file(file.file)
    uploaded_encodings = face_recognition.face_encodings(image)
    
    if not uploaded_encodings:
        return {"recognized": False}
    
    uploaded_encoding = uploaded_encodings[0]
    visitors = get_all_visitors_encodings()

    for visitor in visitors:
        known_encoding = np.array(visitor["face_encoding"])
        match = face_recognition.compare_faces([known_encoding], uploaded_encoding)
        if match[0]:
            return {
                "recognized": True,
                "visitor_id": visitor["id"],
                "visitor_name": visitor["name"]
            }
    return {"recognized": False}
