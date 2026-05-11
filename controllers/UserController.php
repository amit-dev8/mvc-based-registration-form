<?php
require_once "models/User.php";
require_once "models/qrcode.php";

class UserController {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $user = new User();
            $qrObj = new QrcodeGenerator();

            $userData = $user->register($_POST['name'], $_POST['company'], $_POST['designation'], $_POST['email'], $_POST['contact']);

            if ($userData === "EXISTS") {
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>
                    setTimeout(function() {
                        Swal.fire({ icon: 'error', title: 'Sorry...', text: 'Already registered Mobile Number' })
                        .then(() => { window.location = 'https://shackathon.iddllp.com/registration/'; });
                    }, 100);
                </script>";
                return;
            }

            if ($userData) {
                $qrImage = $qrObj->generate($userData);

                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>
                    setTimeout(function() {
                        Swal.fire({
                            title: 'Registration Successful',
                            text: 'Reg No: " . $userData['regnumber'] . "',
                            icon: 'success',
                        }).then(() => {
                            window.location = 'https://shackathon.iddllp.com/registration/';
                        });
                    }, 100);
                </script>";
            } else {
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>
                    Swal.fire({ icon: 'error', title: 'Error', text: 'Please Try Again!' })
                    .then(() => { window.location = 'https://shackathon.iddllp.com/registration/'; });
                </script>";
            }
        }
        if (file_exists("views/register.php")) {
            require "views/register.php";
        } else {
            echo "Error: View file not found at views/register.php";
        }
    }
}