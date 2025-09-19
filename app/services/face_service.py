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

def get_all_personnels_encodings():
    """Fetch all registered personnels' face encodings from PHP backend."""
    res = requests.get(f"{PHP_API}/personnels/all_face_encodings")
    res.raise_for_status()
    return res.json()  # Expected: [{ "id":1, "name":"Jane", "face_encoding":[...]}]

def recognize_face(file: UploadFile):
    """Recognize the uploaded visitor or personnel image."""
    image = face_recognition.load_image_file(file.file)
    uploaded_encodings = face_recognition.face_encodings(image)
    
    if not uploaded_encodings:
        return {"recognized": False}
    
    uploaded_encoding = uploaded_encodings[0]
    visitors = get_all_visitors_encodings()
    personnels = get_all_personnels_encodings()

    for visitor in visitors:
        known_encoding = np.array(visitor["face_encoding"])
        match = face_recognition.compare_faces([known_encoding], uploaded_encoding)
        if match[0]:
            # Update time_in in PHP backend for visitor
            requests.post(f"{PHP_API}/visitors/update_time_in", json={"visitor_id": visitor["id"]})
            return {
                "recognized": True,
                "type": "visitor",
                "id": visitor["id"],
                "name": visitor["name"]
            }
    for personnel in personnels:
        known_encoding = np.array(personnel["face_encoding"])
        match = face_recognition.compare_faces([known_encoding], uploaded_encoding)
        if match[0]:
            # Update time_in in PHP backend for personnel
            requests.post(f"{PHP_API}/personnels/update_time_in", json={"personnel_id": personnel["id"]})
            return {
                "recognized": True,
                "type": "personnel",
                "id": personnel["id"],
                "name": personnel["name"]
            }
    return {"recognized": False}
