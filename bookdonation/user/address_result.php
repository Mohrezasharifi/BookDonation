<?php
session_start();
if(!isset( $_SESSION['login_user'])){
   header("location:index.php");
}
   else{
if(isset($_POST["address"])){
   
   $error="";
   $success="";
   $id= $_SESSION['login_user'];
   $new_add=$_POST["address"];
   $zip=$_POST["zip"];
   
   require("connection.php");
  
   $check="UPDATE `donation` SET `address`='".$new_add."',`zip`='".$zip."' WHERE id='".$id."' and delivered=0";
    $result=$conn->query($check);
    if ($result)
    {
       $success.="your address has been successfuly changed";

    }
 else{
       $error.="operation failed";
    }
    

?>
<!DOCTYPE html>
<html>
      <head>
          <title>address edit </title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="bootstrap-4/css/bootstrap.min.css">
          <link rel="stylesheet" href="fontawesome/fontawesome-free/css/all.css">
          <link rel="stylesheet" href="css/login.css">
          <script src="jquery-3.min/jquery-3.min.js"></script>
          <script src="bootstrap-4/js/bootstrap.min.js"></script>
          
          
      </head>
      <body >
          <nav class="navbar  mb-lg-5 mb-md-4 mb-sm-1 pb-lg-3 pb-md-2 pb-sm-1" style="background-color:#047069;">
            <a class="mark fa-bold" style="text-align:center;background-color:#047069; color:white;" href="index.php"><i class="fas fa-home mr-3  "></i>Home</a>
          </nav>
           <div class="container alert alert-info mt-lg-5 mt-md-4 mt-sm-1 pb-lg-3 pb-md-3 pb-sm-2 ">
              <p class="text-center text-danger"><?php echo $error; ?></p>
              <p class="text-center text-success"><?php echo $success; }}?></p>
          </div>
          <!-- Footer -->
<footer class="page-footer font-small bg-dark py-lg-2 py-sm-1 fixed-bottom">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 text-light">© 2019 Copyright:
   
  </div>


</footer>

      </body>
</html>

