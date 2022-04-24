<?php

if ($_SESSION['user']['role']>1) {
   header("location:index.php");
}