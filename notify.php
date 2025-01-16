<?php
// Function to send a notification to Discord
function send_discord_notification($message) {
    $webhook_url = "YOUR_DISCORD_WEhttps://discord.com/api/webhooks/1319818482967253068/4Mz65PkiXneJJPaZhtZ_zJNmmn8bYhQvKYLTUCy5bN_HR1MIdRLk6O54sfOLg4jmtpdwBHOOK_URL"; // Replace with your Discord Webhook URL
    $payload = json_encode(["content" => $message]);

    // cURL to send the message
    $ch = curl_init($webhook_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

// Check if triggered manually
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Replace this with the actual update message
    $message = "The website has been updated! Check it out: https://ttvleeroy.com";
    send_discord_notification($message);
    echo "Notification sent to Discord!";
}
?>
