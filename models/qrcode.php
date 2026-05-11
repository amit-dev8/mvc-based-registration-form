<?php
require 'libs/vendor/autoload.php';

class QrcodeGenerator {

    public function generate($userData) {

        $urn         = $userData['regnumber'];
        $name        = strtoupper($userData['name']);
        $company     = $userData['company'];
        $designation = $userData['designation'];
        $email       = trim($userData['email']);
        $mobile      = trim($userData['contact']);
        
        // QR Data
        $qrData = "$urn:$name:$designation:$company:::::$email:$mobile";

        $encodedData = urlencode($qrData);

        // QR API URL
        $qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=$encodedData";

        // Folder Path
        $qrFolder = 'assests/qr/';

        // Create folder if not exists
        if (!file_exists($qrFolder)) {
            mkdir($qrFolder, 0777, true);
        }

        // File Path
        $qrFilePath = $qrFolder . $urn . ".png";

        // Get QR Image
        $qrImageContent = file_get_contents($qrUrl);

        // Save QR File
        if ($qrImageContent !== false) {

            file_put_contents($qrFilePath, $qrImageContent);

            return $qrFilePath;

        } else {

            return false;
        }
    }
}
?>