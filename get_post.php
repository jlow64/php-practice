<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>
<?php
    $api_url = "https://github.com/jlow64";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $api_url); // Applying url 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Enable option to return response as string
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Time out in 30 sec

    $response = curl_exec($ch);

    // Error handling
    if(curl_errno($ch)) {
        // If there is an error, handle it
        $error_message = curl_error($ch);
        // Handle error
        die("Error occured: {$error_message}");
    }

    // Close curl session
    curl_close($ch);

    // print response 
    echo $response;
    
?>