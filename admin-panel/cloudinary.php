<?php
$cloud_name = 'ditsopubp';
$upload_preset = 'TucanMarket';

function subirACloudinary($archivoTemporal) {
    global $cloud_name, $upload_preset;

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.cloudinary.com/v1_1/ditsopubp/image/upload",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => [
            'file' => new CURLFile($archivoTemporal),
            'upload_preset' => $upload_preset
        ],
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    $data = json_decode($response, true);
    return $data['secure_url'] ?? null;
}
?>