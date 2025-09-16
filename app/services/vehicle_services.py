import cv2
import pytesseract
from fastapi import UploadFile
import requests
import numpy as np

PHP_API = "http://localhost/api"

def get_all_vehicles():
    """Fetch all vehicles from PHP backend."""
    res = requests.get(f"{PHP_API}/vehicles/all")
    res.raise_for_status()
    return res.json()

def detect_vehicle_plate(file: UploadFile):
    """Detect plate number from uploaded vehicle image."""
    img_array = np.frombuffer(file.file.read(), np.uint8)
    img = cv2.imdecode(img_array, cv2.IMREAD_COLOR)
    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    
    # Basic OCR for plate detection
    plate_text = pytesseract.image_to_string(gray)
    return plate_text.strip()

def detect_vehicle_color(file: UploadFile):
    """Detect dominant vehicle color."""
    img_array = np.frombuffer(file.file.read(), np.uint8)
    img = cv2.imdecode(img_array, cv2.IMREAD_COLOR)
    # Simple average color
    avg_color_per_row = np.average(img, axis=0)
    avg_color = np.average(avg_color_per_row, axis=0)
    return tuple(int(c) for c in avg_color)