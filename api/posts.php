<?php 

   require_once "../core/core.php";
   require_once "../core/function.php";

   $sql = "select * from posts";
   $rows = fetchAll($sql);

   apiOutPut($rows);

?>