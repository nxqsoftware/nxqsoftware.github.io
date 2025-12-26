<?php
header('Content-Type: application/json');

// Simple license generator
function generateLicenseKey($length = 16) {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $key = '';
    for($i=0; $i < $length; $i++) {
        $key .= $chars[rand(0, strlen($chars)-1)];
    }
    return $key;
}

// You can also validate ITN here by PayFast (optional)
if(isset($_POST['item_name']) && isset($_POST['amount'])) {
    $licenseKey = generateLicenseKey();
    // Here you can save $licenseKey, $item_name, $amount to database for future verification
    echo json_encode([
        'success' => true,
        'licenseKey' => $licenseKey
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request.'
    ]);
}
?>
