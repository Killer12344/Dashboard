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
                        <li class="breadcrumb-item active" aria-current="page">
                           Search by <b>"<?php echo $_POST['search_key'];?>"</b>
                        </li>
                     </ol>
               </nav>



               <?php 
               $date = fSearchByDate($_POST['start'],$_POST['end']);
                        if (count($date)==0) {
                           echo alertError('This is Not Found!');
                        }
                       foreach ($date as $p) {
                           ?>
                           <?php include_once "single.php" ?>
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
