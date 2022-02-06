<?php 

session_start();
if(!isset($_SESSION['login_user']))
{
  header("location:login.php");
}

if(isset($_POST['donate_id'])){
  $success="";
  $error="";
    include("connection.php");
 $donate_id = $_POST['donate_id'];
  $d_id=$_SESSION['login_user'];
 $sql = "UPDATE `donation` SET `delivered`=1 WHERE donate_id='".$donate_id."'";
        $result = mysqli_query($conn,$sql); //$conn->query($sql);
        
        if ($result ) {
         $sql2="UPDATE `assign_delivery` SET `status`=1 WHERE donate_id='".$donate_id."' AND deliverer_id='".$d_id."'";
         $result2=mysqli_query($conn,$sql2);
          if($result2){
            $success.="Thank you for your co-operation";
          }
          else{
            $error.="second operation failed";
          }
          
           
          
 
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
      <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
      
  <style>
   .alert{
    margin-top: 100px;
    height: 400px;
   }
  </style>
 </head>
 <body>
  <nav class="navbar navbar-expand-sm  fixed-top" style="background-color:#047069">
  <a class="navbar-brand text-white text-middle" href="home.php">BOOK+</a>
  </nav>
  <div class="container ">
   <div class="alert alert-info" style="border-left:2px solid green;">
   <div class="aler font-weight-bold"><?php echo $success;  ?></div>
     <div class="aler font-weight-bold"><?php echo $error; }} ?></div>
   
   </div>
  </div>
 <center><a href="home.php"><button class="btn btn-outline-primary px-4">Back to home</button></a></center> 
  
   <div class="panel panel-default bg-dark fixed-bottom" style="height:70px;margin:0px;border:1px solid black;">
    <div class="panel-body text-center text-white mt-3">BOOK+</div>
  </div>
 </body>
</html>
 
