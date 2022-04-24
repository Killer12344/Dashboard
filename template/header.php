<?php require_once "core/core.php" ?>
<?php require_once "core/function.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>
   <link rel="icon" href="https://www.freeiconspng.com/thumbs/dashboard-icon/dashboard-icon-3.png">
   <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
   <script src="assets/vendor/feather/feather.min.js"></script>
   <link rel="stylesheet" href="assets/vendor/data_table/jquery.dataTables.min.css">
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container-fluid main">

<div class="row">
    <!-- side bar -->
         <?php include "side.php" ?>
    <!-- side bar -->

    <div class="col-12 col-lg-9 col-xl-10 right-side vh-100">

        <!-- header -->

        <div class="row header mb-4">
            <div class="col-12">
                <div class="bg-info p-1 rounded rounded-1 d-flex justify-content-between align-items-center">
                    <button class="btn btn-info show-sidebar d-block d-md-block d-lg-none">
                        <i data-feather="menu" class="text-light"></i>
                    </button>
                    <form method="post" class="d-none justify-content-center align-items-center d-md-flex">
                        <div class="w-100 me-2">
                            <input class="form-control" type="search">
                        </div>
                        <button class="btn btn-light btn-sm w-25">
                            <i data-feather="search" class="text-info"></i>
                        </button>
                    </form>
                    <div class="btn-group">
                        <button type="button" class="btn btn-light text-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i data-feather="user"></i>
                            <span><?php print_r($_SESSION['user']['name']) ?></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="register.php">Register</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li>
                              <a class="dropdown-item text-danger fw-bold" href="logout.php"><i data-feather="log-out"></i> Logout</a>
                          </li>
                        </ul>
                      </div>
                </div>
            </div>
        </div>
        <!-- header end-->