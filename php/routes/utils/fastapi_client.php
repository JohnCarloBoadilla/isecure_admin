<?php
function call_fastapi($endpoint, $params = []) {
    $url = "http://localhost:8000/admin/cameras/$endpoint";
    if (!empty($params)) {
        $url .= '?' . http_build_query($params);
    }

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if(curl_errno($ch)){
        curl_close($ch);
        return null;
    }
    curl_close($ch);
    return json_decode($response, true);
}
?>
