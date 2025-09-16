import pytesseract
from fastapi import UploadFile

def extract_id_info(file: UploadFile):
    """Extract text from uploaded ID using OCR."""
    img_bytes = file.file.read()
    text = pytesseract.image_to_string(img_bytes)
    
    # Example parsing (adjust regex as needed)
    import re
    id_number = re.search(r"ID[:\s]*([A-Z0-9]+)", text)
    dob = re.search(r"DOB[:\s]*([0-9/]+)", text)
    
    return {
        "id_number": id_number.group(1) if id_number else None,
        "dob": dob.group(1) if dob else None,
        "raw_text": text
    }