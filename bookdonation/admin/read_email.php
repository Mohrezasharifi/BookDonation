<?php 

session_start();
if(!isset($_SESSION['login_user']))
{
  header("location:login.php");
}
include("connection.php");
if(isset($_POST['contactid'])){
    
 $contactid = $_POST['contactid'];  
 $sql = "SELECT username, subject, content,date_ 
        FROM `contact` INNER JOIN register USING (id) 
        WHERE contactid = '".$contactid."'";
        $result = mysqli_query($conn,$sql); //$conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
          while($row = $result->fetch_assoc()) {
           
          
 
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Report Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <style>
   .alert{
    margin-top: 100px;
    height: auto;
    margin-bottom: 80px;
    
   }
  </style>
 </head>
 <body>
  <nav class="navbar navbar-expand-sm  fixed-top" style="background-color:#047069">
  <center><a class="navbar-brand text-white text-middle" href="dashboard.php">BOOK+</a></center>
  </nav>
  <div class="container ">
   <div class="alert alert-info pb-lg-5" style="border-left:3px solid green;">
    <h5>From :<small> <?php echo $row["username"];?></small></h5>
    <h5>Subject :<small><?php echo $row["subject"];?></small></h5>  
     <p >  At :<small><?php echo $row["date_"];?></small></p>
   <?php echo  $row["content"];}}}?>
 
</div>
  </div>
    <div class="panel panel-default bg-dark fixed-bottom" style="height:70px;margin:0;border:1px solid black;">
    <div class="panel-body text-center text-white mt-3">BOOK+</div>
  </div>
 </body>
</html>