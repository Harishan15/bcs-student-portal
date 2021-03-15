<!DOCTYPE html>
<html>

<head>
    <title>ADMIN SIGN-IN </title>
    <link rel="icon" href="./images/icon.png">

    <link href='https://fonts.googleapis.com/css?family=Montserrat Alternates' rel='stylesheet'>
    <!-- Bootstrap -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/signin.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar custom-nav justify-content-center">
        <h4>ADMIN Sign in</h4>
    </nav>
    <img src="./images/bcs-logo.svg" width="120" height="100" class="d-inline-block align-top bcs-logo">


    <div class="login-container d-flex align-items-center justify-content-center">
        <form action="./php/admin-signin.php" method="POST" class="login-form text-center">
            <div class="col-12 user-img">
                <img src="./images/final-logo.png">
            </div>
            <div class="form-group">
                <input name="adminemail" type="email" class="form-control rounded-pill form-control-lg" placeholder="Email" autofocus>
            </div>
            <div class="form-group">
                <input name="adminpassword" type="password" class="form-control rounded-pill form-control-lg" placeholder="Password">
            </div>
            <div>
                <button type="submit" name="login" class="btn mt-2 btn-custom btn-warning rounded-pill btn-lg">Login</button>
            </div>
        </form>
    </div>
</body>

<footer class="page-footer font-small custom-foot">
    <div class="footer-copyright text-center py-3">Copyright © 2019 Matrix TES. All rights reserved.
    </div>
</footer>

</html>