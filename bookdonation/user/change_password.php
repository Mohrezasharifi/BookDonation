<?php
session_start();
if(!isset( $_SESSION['login_user'])){
   echo "unathorized ";
}
   else{
if(isset($_POST["old_pwd"])){
   
   
   $id= $_SESSION['login_user'];
   $old_pass= $_POST["old_pwd"];
   $new_pass1= $_POST["new_pwd"];
   
 
   
   require("connection.php");
   $old_p=$old_pass;
   $check="SELECT `password` FROM `register` WHERE id='$id' AND password='$old_p'";
    $result=$conn->query($check);
    if ($result->num_rows==1)
    {
       $new_p=$new_pass1;
        $sql = "UPDATE `register` SET `password`='$new_p' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo 1;
               
            
        } 

    }
 else{
       echo 0;
    }
    
}
}
?>
