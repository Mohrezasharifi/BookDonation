<?php

   include("connection.php");
   if(isset($_POST['id'])){
        
        $sql = "DELETE FROM `contact` WHERE contactid = '".$_POST['id']."'";
        mysqli_query($conn,$sql);
   }  
?>