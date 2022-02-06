<?php 

session_start();
if(!isset($_SESSION['login_user']))
{
  header("location:login.php");
}

if(isset($_POST['donate_id'])){
    include("connection.php");
 $donate_id = $_POST['donate_id'];  
 $sql = "SELECT username,`status`, `phone`, `address`, `city`, `state`, `zip`, 
        `no-book`, `catagory`, `donation_date` FROM `donation` INNER JOIN 
        register USING (id) 
        WHERE donate_id = '".$donate_id."'";
        $result = mysqli_query($conn,$sql); //$conn->query($sql);
        $city = "";
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
          while($row = $result->fetch_assoc()) {
           
           $city = $row["city"];
 
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
   <h4 class="text-center"><i>Donation Details</i></h4>
   <p><b>Donated By :</b> <?php echo $row["username"];?></p><p><b> At :</b><?php echo $row["donation_date"];?></p>  
       
   <p><b>Catagory :</b> <?php echo  $row["catagory"]; ?></p>
   <p><b>No.books :</b> <?php echo  $row["no-book"]; ?></p>
   <p><b>Mobile no. :</b> <?php echo  $row["phone"]; ?></p>
   <p><b>Address:</b> <br><?php echo  $row["address"]."--".$row["city"]." -- ".$row["state"]." --zip code : ".$row["zip"]; ?></p>
   
    
   </div>
   <?php 
}} ?>
   <form action="result.php" method="post" class="text-center pb-5">
     
     <input type="hidden" name="donate_id" value= "<?php echo  $donate_id; ?>"  >
     
     <button type="submit" class="btn btn-outline-primary text-center">Delivered</button>
   </form>
  </div>
  
   <div class="panel panel-default bg-dark fixed-bottom" style="height:70px;margin:0px;border:1px solid black;">
    <div class="panel-body text-center text-white mt-3">BOOK+</div>
  </div>
 </body>
</html>
 
 <?php } ?>