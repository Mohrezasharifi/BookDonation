<?php
  
session_start();
if(!isset($_SESSION['login_user'])){
   header("location:login.php");
}
   else{
if(isset($_POST["old_pwd"])){
   
   $success="";
   $error="";
   $id= $_SESSION['login_user'];
   $old_pass= $_POST["old_pwd"];
   $new_pass1= $_POST["new_pwd"];
   echo '<!DOCTYPE html>
<html>
<head>
   <title>Change password</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
   </head>
   <body>
   <nav class="navbar fixed-top mb-5" style="background-color:#047069;">
       <a class="mark text-white"  href="home.php" style="background-color:#047069;">BOOK+</a>
   </nav>   
   <div class="container alert">
      <div class="container">
      </div>
      
      
      </div>
   ';
   require("connection.php");
   $old_p=md5($old_pass);
   $check="SELECT `password` FROM `deliverers` WHERE deliverer_id='$id' AND password='$old_p'";
    $result=$conn->query($check);
    if ($result->num_rows==1)
    {
       $new_p=$new_pass1;
        $sql = "UPDATE `deliverers` SET `password`='$new_p' WHERE deliverer_id='$id'";

        if ($conn->query($sql) === TRUE) {
          echo'
          <div class="container text-center mt-5 col-8">
             <div class="alert alert-info text-center" style="border-left:2px solid green;" role="alert">
                  <strong>Your password has been successfully changed</strong><br> 
             </div>
          </div>';              
            
        } 

    }
    else
    {
        echo'
        <div class="col-8 container text-center mt-5">
           <div class="alert alert-danger" role="alert">
               <strong>Oops!</strong>  <span>The passwords you have entered is incorrect!</span>
           </div>
        </div>';
    }
      echo '
         <div class="panel panel-default bg-dark fixed-bottom " style="height:70px;margin:0;border:1px solid black;">
             <div class="panel-body text-center text-white mt-3">All rights reserved to BOOK+</div>
         </div>      
   </body>
</html>';
    
      }
   
   }
   
?>

