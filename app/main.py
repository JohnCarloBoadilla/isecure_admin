from fastapi import FastAPI, File, UploadFile, HTTPException
from fastapi.middleware.cors import CORSMiddleware
from app.services import face_service, vehicle_service, ocr_service

app = FastAPI(title="iSecure Recognition API")

# Allow PHP frontend (Apache) to access this API
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],  # Adjust to your domain in production
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

@app.post("/recognize/face")
async def recognize_face(file: UploadFile = File(...)):
    try:
        result = face_service.recognize_face(file)
        return result
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

@app.post("/recognize/vehicle")
async def recognize_vehicle(file: UploadFile = File(...)):
    try:
        plate = vehicle_service.detect_vehicle_plate(file)
        file.file.seek(0)  # Reset file pointer for color detection
        color = vehicle_service.detect_vehicle_color(file)
        return {"plate_number": plate, "color": color}
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

@app.post("/ocr/id")
async def ocr_id(file: UploadFile = File(...)):
    try:
        result = ocr_service.extract_id_info(file)
        return result
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

@app.get("/")
def health_check():
    return {"status": "API running"}