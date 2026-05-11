<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Registration</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    	body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .registration-wrapper {
            padding: 40px 0;
        }

        .registration-card {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        }

        .header-image img {
            width: 100%;
            height: auto;
            max-height: 320px;
            object-fit: cover;
        }

        .form-section {
            padding: 35px;
        }

        .main-title h1 {
            font-size: 32px;
            font-weight: 700;
            color: #1c1c1c;
            margin-bottom: 10px;
        }

        .sub-text {
            color: #666;
            font-size: 15px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .form-control {
            height: 48px;
            border-radius: 10px;
            border: 1px solid #dcdcdc;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }

        .btn-submit {
            height: 50px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            padding: 0 40px;
        }

        .registered-link a {
            text-decoration: none;
            font-weight: 600;
        }

        .registered-link a:hover {
            text-decoration: underline;
        }

        .modal-content {
            border-radius: 15px;
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-title {
            font-weight: 700;
        }

        @media(max-width:768px) {
            .form-section {
                padding: 20px;
            }

            .main-title h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <div class="container registration-wrapper">

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="registration-card">

                    <!-- Header Image -->
                    <div class="header-image">
                        <img src="assests/header.png" alt="Header Image">
                    </div>

                    <!-- Form Section -->
                    <div class="form-section">

                        <!-- Title -->
                        <div class="text-center mb-4">
                            <div class="main-title">
                                <h1>Visitor Registration</h1>
                            </div>

                            <p class="sub-text">
                                Please fill in your details to complete registration
                            </p>
                        </div>

                        <!-- Already Registered -->
                        <!-- <div class="registered-link text-end mb-4">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#alreadyRegisteredModal">
                                Already Registered? Get Your QR Code
                            </a>
                        </div> -->

                        <!-- Registration Form -->
                        <form method="POST" id="registrationForm">

                            <div class="row g-3">

                                <!-- Full Name -->
                                <div class="col-md-12">
                                    <label class="form-label">Full Name*</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <!-- Designation -->
                                <div class="col-md-6">
                                    <label class="form-label">Designation*</label>
                                    <input type="text" name="designation" class="form-control" required>
                                </div>

                                <!-- Company -->
                                <div class="col-md-6">
                                    <label class="form-label">Company*</label>
                                    <input type="text" name="company" class="form-control" required>
                                </div>

                                <!-- Mobile -->
                                <div class="col-md-6">
                                    <label class="form-label">Mobile*</label>
                                    <input type="tel"
                                           name="contact"
                                           class="form-control"
                                           pattern="[0-9]{10}"
                                           maxlength="10"
                                           required>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="form-label">Email*</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <!-- Submit -->
                                <div class="col-12 text-center mt-4">
                                    <button type="submit"
                                            id="submitBtn"
                                            class="btn btn-primary btn-submit">
                                        Submit
                                    </button>
                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- Modal -->
<!--     <div class="modal fade"
         id="alreadyRegisteredModal"
         tabindex="-1"
         aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">
                        Get Your QR Code
                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">

                    <form id="searchForm"
                          action="searchqr.php"
                          method="POST">

                        <div class="mb-3">
                            <label class="form-label">
                                Enter Registered Mobile Number
                            </label>

                            <input type="text"
                                   class="form-control"
                                   name="searchValue"
                                   required>
                        </div>

                        <div class="text-center">
                            <button type="submit"
                                    class="btn btn-primary px-4">
                                Search
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div> -->

    <!-- Disable Submit -->
    <script>
        document.getElementById("registrationForm")
            .addEventListener("submit", function () {

                const btn = document.getElementById("submitBtn");

                btn.disabled = true;
                btn.innerHTML = "Please wait...";
            });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>