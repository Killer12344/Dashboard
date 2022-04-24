<?php session_start() ?>
<?php require_once "front_panel/head.php" ?>

<title>Index</title>

<?php require_once "front_panel/side.php" ?>

<div class="container">
   <div class="row">

       <!-- left side -->
       <div class="col-12 col-md-8">
           <div class="">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white p-2">
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                        </ol>
                    </nav>

                    <div class="dropdown text-end">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i data-feather="calendar" class="mb-1 me-1"></i> Sort
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <a class="dropdown-item" href="?order_by=created_at&order_type=ASC">
                                    Oldest To Newest
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="?order_by=created_at&order_type=DESC">
                                    Newest To Oldest
                                </a>
                            </li>
                            </ul>
                     </div>
                    <?php 

                        if (isset($_GET['order_by']) && isset($_GET['order_type']) ) {
                            $orderCol = $_GET['order_by'];
                            $orderType = $_GET['order_type'];
                            $posts =  fPost($orderCol,$orderType);
                        }else {
                            $posts = fPost();
                        }

                       foreach ($posts as $p) {
                           ?>
                            <?php include "single.php" ?>
                           <?php
                       }
                    ?>

           </div>
       </div>

       <!-- right side -->
        <?php require_once "right-sidebar.php" ?>
   </div>
</div>

<?php require_once "front_panel/footer.php" ?>
