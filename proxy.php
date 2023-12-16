<?php
// The URL of your HTTP API
$apiUrl = 'http://74.235.53.222:8080/imageavatar/';

// Check if a file is being uploaded
if ($_FILES && $_FILES['avatar_images']['error'] == UPLOAD_ERR_OK) {
    // Prepare the file for uploading
    $file = new CURLFile($_FILES['avatar_images']['tmp_name'], $_FILES['avatar_images']['type'], $_FILES['avatar_images']['name']);

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['avatar_images' => $file]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the cURL session
    $response = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    // Echo the response back to the client
    echo $response;
} else {
    echo "No file uploaded or an upload error occurred.";
}
?>
