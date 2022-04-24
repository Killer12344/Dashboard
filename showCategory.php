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
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                           <?php echo category($_GET['cat_id'])['title'] ?>
                        </li>
                     </ol>
               </nav>
                     <?php 
                        foreach (fPostOrder($_GET['cat_id']) as $p) {
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
                  