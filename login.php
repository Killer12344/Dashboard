<?php
require_once "core/core.php";
require_once "core/function.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <script src="assets/vendor/feather/feather.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .form-control{
            border: 1px solid #2078f9;
        }
    </style>
</head>
<body style="background: #c2c9d2">


<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-5 col-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary">
                    <h2 class="fw-bolder text-light m-0 py-3">
                        Login Form
                    </h2>
                </div>
                <div class="card-body">

                    <form  method="post">
                    <?php
                    if (isset($_POST['loginBtn'])){
                            login();
                        }
                    ?>
                        <div class="mt-3 text-primary">
                            <i data-feather="mail" class="mb-2 me-2"></i>
                            <label class="fw-bold mb-2">Email</label>
                            <input type="email" class="form-control" autofocus required  name="email">
                        </div>

                        <div class="mt-3 text-primary">
                            <i data-feather="lock" class="mb-2 me-2"></i>
                            <label class="fw-bold mb-2">Password</label>
                            <input type="password" class="form-control" required  name="password">
                        </div>

                        <div class="text-center my-4">
                            <button type="submit" name="loginBtn" class="btn btn-primary fw-bold text-light px-3"> Sign In </button>
                        </div>
                        <div class="text-center fw-lighter">
                            <a href="register.php" class="text-decoration-none" style="font-size: 15px"> Create New Account </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<script src="assets/vendor/jquery.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/app.js"></script>
<script>
    feather.replace();
</script>
</body>
</html>
