<?php session_start() ?>
<?php require_once "front_panel/head.php" ?>


<title>Index</title>

<?php require_once "front_panel/side.php" ?>

<?php 
   
   if ($_GET['id']) {
      $id=$_GET['id'];
      $current = post($id);
   }
   else{
      toLink('index.php');
   }

   if (!$current) {
      toLink('index.php');      
   }
   
   
   
   $currentCat = $current['category_id'];

   if (isset($_SESSION['user']['id'])) {
      $userId = $_SESSION['user']['id'];
   }else{
      $userId = 0;
   }

   viewerControl($userId,$id,$_SERVER['HTTP_USER_AGENT'])
?>


<div class="container">
   <div class="row">

       <!-- left side -->
       <div class="col-12 col-md-8">
           <div class="">
               <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                     <ol class="breadcrumb bg-white p-2">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Post</li>
                     </ol>
               </nav>
               <div class="card">
                  <div class="card-body">
                     <h4 class="fw-bolder">
                        <?php echo post($id)['title']; ?>
                     </h4>
                     <div class="my-3">
                        <i data-feather="user" class="text-info mb-2"></i>
                        <?php echo user($current['user_id'])['name'] ?>
                        <i data-feather="layers" class="text-success mb-2"></i>
                        <?php echo category($current['category_id'])['title']; ?>
                        <i data-feather="calendar" class="text-secondary mb-2"></i>
                        <?php echo showTime("j-M-Y h:i a", strtotime($current['created_at'])) ?>
                     </div>
                        <?php echo html_entity_decode($current['description']) ?>
                  </div>
               </div>

               <div class="row">
                  <?php 
                       foreach (fPostOrder($currentCat,2,$id) as $p) {
                           ?>
                     <div class="col-12 col-md-6">
                              <?php include "single.php" ?>
                     </div>      
                     <?php
                       }
                   ?>
               </div>
           </div>
       </div>

       <!-- right side -->
        <?php require_once "right-sidebar.php" ?>
   </div>
</div>

<?php require_once "front_panel/footer.php" ?>
