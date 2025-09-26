import face_recognition
import numpy as np
from fastapi import UploadFile
import requests

PHP_API = "http://localhost/api"

def get_all_visitors_encodings():
    res = requests.get(f"{PHP_API}/visitors/all_face_encodings")
    res.raise_for_status()
    return res.json()

def get_all_personnels_encodings():
    res = requests.get(f"{PHP_API}/personnels/all_face_encodings")
    res.raise_for_status()
    return res.json()

def recognize_face(file: UploadFile):
    image = face_recognition.load_image_file(file.file)
    uploaded_encodings = face_recognition.face_encodings(image)
    
    if not uploaded_encodings:
        return {"recognized": False}
    
    uploaded_encoding = uploaded_encodings[0]
    visitors = get_all_visitors_encodings()
    personnels = get_all_personnels_encodings()

    for visitor in visitors:
        known_encoding = np.array(visitor["face_encoding"])
        match = face_recognition.compare_faces([known_encoding], uploaded_encoding, tolerance=0.5)
        if match[0]:
            try:
                requests.post(f"{PHP_API}/visitors/update_time_in", json={"visitor_id": visitor["id"]})
            except requests.RequestException as e:
                print(f"Failed to update visitor {visitor['id']}: {e}")
            return {"recognized": True, "type": "visitor", "id": visitor["id"], "name": visitor["name"]}

    for personnel in personnels:
        known_encoding = np.array(personnel["face_encoding"])
        match = face_recognition.compare_faces([known_encoding], uploaded_encoding, tolerance=0.5)
        if match[0]:
            try:
                requests.post(f"{PHP_API}/personnels/update_time_in", json={"personnel_id": personnel["id"]})
            except requests.RequestException as e:
                print(f"Failed to update personnel {personnel['id']}: {e}")
            return {"recognized": True, "type": "personnel", "id": personnel["id"], "name": personnel["name"]}

    return {"recognized": False}
