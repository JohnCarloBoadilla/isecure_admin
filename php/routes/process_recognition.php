<?php
if (!isset($_FILES['image']) || !isset($_POST['mode'])) {
    http_response_code(400);
    echo json_encode(["error"=>"Missing image or mode"]);
    exit;
}

$mode = $_POST['mode'];
$file = $_FILES['image']['tmp_name'];

function callFastAPI($url, $filePath) {
    $curl = curl_init();
    $cfile = new CURLFile($filePath);
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => ['file' => $cfile],
    ]);
    $response = curl_exec($curl);
    if(curl_errno($curl)) throw new Exception('FastAPI call failed: ' . curl_error($curl));
    curl_close($curl);
    return json_decode($response, true);
}

switch($mode){
    case "face": $url="http://127.0.0.1:8000/recognize/face"; break;
    case "vehicle": $url="http://127.0.0.1:8000/recognize/vehicle"; break;
    case "ocr": $url="http://127.0.0.1:8000/ocr/id"; break;
    default: http_response_code(400); echo json_encode(["error"=>"Invalid mode"]); exit;
}

try {
    $result = callFastAPI($url, $file);
    echo json_encode($result);
} catch(Exception $e){
    http_response_code(500);
    echo json_encode(["error"=>$e->getMessage()]);
}