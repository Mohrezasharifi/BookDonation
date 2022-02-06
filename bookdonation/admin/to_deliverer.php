<?php 

session_start();
if(!isset($_SESSION['login_user']))
{
  header("location:login.php");
}
$error="";
$success="";
if(isset($_POST['deliverer_id'] )){

 $donate_id=$_POST['donate_id'];
 $deliverer_id=$_POST['deliverer_id'];
  include("connection.php");
 $sql="INSERT INTO `assign_delivery`(`deliverer_id`, `donate_id`,`status`,`date_`) VALUES ( '$deliverer_id','$donate_id',0,Now())";
  $result = mysqli_query($conn,$sql);
 if($result){
  $sql="UPDATE `donation` SET `status`= 1 WHERE donate_id = '$donate_id ' ";
  mysqli_query($conn,$sql); 
  $success=$success.'<div class="alert alert-info text-center" style="border-left:2px solid green;" role="alert"><strong>The donation  has been successfully assigned</strong><br> </div>';
  
 }
 else
 {
  $error.="Operation failed";
 }
 if($error!="")
    {
        $error='<div class="alert alert-danger text-center" role="alert"><strong>We have found some errors</strong><br>'.$error.'</div>';
     }

?>

<!DOCTYPE html>
<html>
 <head>
  <title>Assign To Deliverer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <style>
   .alert{
    margin-top: 100px;
    height: 400px;
   }
  </style>
 </head>
 <body>
    <nav class="navbar navbar-expand-sm  fixed-top" style="background-color:#047069">
  <a class="navbar-brand text-white text-middle" href="dashboard.php">BOOK+</a>
  </nav>
  <div class="container">
  <div id="error"><?php echo $error; ?></div>
     <div id="success"><?php echo $success; }?></div>
     <center> <a class="text-white" href="dashboard.php"><button class="btn btn-outline-info" style="width:160px;">Back to dashboard</button></a></center>
  </div>
 
  
  <div class="panel panel-default bg-dark fixed-bottom" style="height:70px;margin:0px;border:1px solid black;">
    <div class="panel-body text-center text-white mt-3">BOOK+</div>
  </div>
 </body>
</html>