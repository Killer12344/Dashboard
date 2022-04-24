<?php 
   if ($_SESSION['user']['role']!=0) {
      header("location:index.php");
   }
?>