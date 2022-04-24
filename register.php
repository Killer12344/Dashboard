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
                border: 1px solid #2078F9D7;
            }

        </style>
    </head>
    <body style="background: #c2c9d2">


    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-5 col-12">
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-primary">
                        <h2 class="fw-bolder text-light m-0 py-3">
                            Register Form
                        </h2>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_POST['registerBtn'])){
                            echo register();
                        }
                        ?>
                        <form  method="post">
                            <div class="mt-3 text-primary">
                                <i data-feather="user" class="mb-2 me-2"></i>
                                <label class="fw-bold mb-2">Username</label>
                                <input type="text" class="form-control" autofocus required  name="username">
                            </div>
                            <div class="mt-3 text-primary">
                                <i data-feather="mail" class="mb-2 me-2"></i>
                                <label class="fw-bold mb-2">Email</label>
                                <input type="email" class="form-control" required  name="email">
                            </div>
                            <div class="mt-3 text-primary">
                                <i data-feather="lock" class="mb-2 me-2"></i>
                                <label class="fw-bold mb-2">Password</label>
                                <input type="password" class="form-control" required  min="8" name="password">
                            </div>
                            <div class="mt-3 text-primary">
                                <i data-feather="lock" class="mb-2 me-2"></i>
                                <label class="fw-bold mb-2">Confirm Password</label>
                                <input type="password" class="form-control" required min="8"  name="cpassword">
                            </div>
                            <div class="text-center my-3">
                                <button type="submit" name="registerBtn" class="btn btn-primary fw-bold text-light"> Register </button>
                                <a href="login.php" type="submit" class="btn btn-outline-primary fw-bold px-3"> Sign In </a>
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
