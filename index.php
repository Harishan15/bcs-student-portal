<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sign in to BCS Student Portal</title>

    <link rel="icon" href="./images/icon.png">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/floating-labels.css" rel="stylesheet">
    <link href="./css/index.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./assets/lib/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="./assets/dist/jquery.validate.js"></script>

</head>

<body>

    <!-- <div>
        <nav class="navbar fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Student Dashboard</a>
            </div>
        </nav>
        <img src="../images/bcs-logo.svg" alt="BCS logo" class="img-bcs-logo" />
    </div> -->
    <!-- <form action="./php/signin.php" id="validateForm" method="POST"> -->
    <form action="./php/signin.php" id="validateForm" method="POST">


        <div class="container">
            <div class="row justify-content-center centered">

                <div class="card main-container ">
                    <div class="card-body">

                        <div class="text-center">
                            <img src="./images/final-logo.png" alt="Matrix logo" class="text-center mt-2 mb-3" style="width:140px;" />
                        </div>

                        <h5 class="card-title mb-1">Sign in</h5>
                        <p class="card-text">Use your BCS Student Portal account</p>

                        <div class="form-label-group">
                            <!-- <input type="email" name="useremail" class="form-control custom-input" placeholder="Email address" autofocus /> -->
                            <input type="text" id="inputEmail" name="useremail" class="form-control custom-input" placeholder="Email address" required autofocus>
                            <label for="inputEmail">Email address</label>
                        </div>

                        <div class="row custom-row">
                            <div class="col align-self-center">
                                <div class="link-text">
                                    Don't have an account? <br>
                                    <a href="./pages/create-account.php" class="link-text-link"> create new account </a>
                                </div>
                            </div>
                            <div class="col align-self-center text-right">
                                <input type="submit" name="login" id="continueBtn" class="btn btn-warning custom-btn" value="Continue">
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </form>

    <!-- <footer class="page-footer font-small pt-5">
        <div class="footer-copyright text-center custom-foot py-3">
            Copyright © 2019 Matrix TES. All rights reserved.
        </div>
    </footer> -->

    <!--/*************************  The Real Script **************************/-->


    <script type="text/javascript">
        $(document).ready(function() {
            $("#validateForm").validate({
                onkeyup: true,
                rules: {
                    useremail: {
                        required: true,
                        email: true,
                        remote: {
                            url: "./php/checkemail.php",
                            type: "post",
                            data: {
                                useremail: function() {
                                    return $("#inputEmail").val();
                                }
                            }
                        }
                    }
                },
                messages: {
                    useremail: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                        // remote: "Couldn't find your account"
                        // remote: "There is no account associated with this email"

                    }
                },
                errorElement: "span",
                errorPlacement: function(error, element) {
                    // Add the `invalid-feedback` class to the error element
                    error.addClass("invalid-feedback");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.next("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                },
                submitHandler: function(form) {
                    var email = $("#inputEmail").val();

                    $.ajax({
                        method: "POST",
                        url: "./php/signin.php",
                        data: {
                            useremail: email
                        },

                        success: function(data) {
                            if ($.trim(data) == "1") {
                                window.location.href = "./pages/signinpass.php";
                            } else if ($.trim(data) == "2") {
                                window.location.href = "./pages/finishsign.php";
                            } else if ($.trim(data) == "3") {
                                Swal.fire({
                              icon: 'info',
                              title: 'Wait till the Admin approves you',
                              showConfirmButton: true,
                                })
                            } else if ($.trim(data) == "4") {
                                window.location.href = "./pages/signinpass.php";
                            } else if ($.trim(data) == "5") {
                                window.location.href = "./pages/finishsign.php";
                            } else if ($.trim(data) == "6") {
                                Swal.fire({
                              icon: 'info',
                              title: 'Wait till the Admin approves you',
                              showConfirmButton: true,
                                })
                            } else if ($.trim(data) == "7") {
                                window.location.href = "./index.php";
                            }
                        },

                        error: function(data) {
                            alert("error");
                        }

                    });
                }
            });

        });
    </script>


</body>



</html>