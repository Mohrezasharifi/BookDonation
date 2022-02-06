<?php

   include("connection.php");
   if(isset($_POST['id'])){
         $sql = "DELETE FROM `assign_delivery` WHERE  donate_id = '".$_POST['id']."'";
       if( mysqli_query($conn,$sql)){
        $sql1 = "DELETE FROM `donation` WHERE  donate_id = '".$_POST['id']."'";
        mysqli_query($conn,$sql1);
       }
   }  
?>