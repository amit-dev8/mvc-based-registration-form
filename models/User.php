<?php
require_once "config/database.php";

class User {
    public function register($name, $company, $designation, $email, $contact) {
        $db = (new Database())->connect();

    date_default_timezone_set('Asia/Kolkata');
    $currentDate = date('Y-m-d');
    $currentTime = date('H:i:s');
        
        $checkMobileQuery = "SELECT id FROM `userdata` WHERE `contact` = ?";
        if ($checkStmt = mysqli_prepare($db, $checkMobileQuery)) {
            mysqli_stmt_bind_param($checkStmt, "s", $contact);
            mysqli_stmt_execute($checkStmt);
            mysqli_stmt_store_result($checkStmt);

            if (mysqli_stmt_num_rows($checkStmt) > 0) {
                mysqli_stmt_close($checkStmt);
                return "EXISTS";
            }
            mysqli_stmt_close($checkStmt);
        }

        $name_esc = mysqli_real_escape_string($db, $name);
        $company_esc = mysqli_real_escape_string($db, $company);
        
        $sql = "INSERT INTO userdata (name, company, designation, email, contact, date, time)
                VALUES ('$name_esc', '$company_esc', '$designation', '$email', '$contact', '$currentDate', '$currentTime')";

        if($db->query($sql)){
            $last_id = $db->insert_id;
            $regnumber = 'REG' . str_pad($last_id, 4, '0', STR_PAD_LEFT);

            $update = "UPDATE userdata SET urn='$regnumber' WHERE id='$last_id'";
            $db->query($update);

            return [
                'regnumber'   => $regnumber,
                'name'        => $name,
                'company'     => $company,
                'designation' => $designation,
                'email'       => $email,
                'contact'     => $contact
            ];
        }
        return false;
    }
}
?>