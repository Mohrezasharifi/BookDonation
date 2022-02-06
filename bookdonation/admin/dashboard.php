<?php

session_start();
if(!isset($_SESSION['login_user']))
{
  header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
    <head>
      <title>Admin Dashboard</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<style>
  .text-right{
    text-align: right;
    
  }
  .text-right a:hover{
    text-decoration: none;
  }
  .row{
    margin-top: 100px;
   
    
    
  }
 
  .col a{
    text-decoration: none;
    color: black;
  }
  .icon-size{
    font-size: 50px;
    color:#047069;
    text-align: center;
  }
  .icon-warning{
    
    font-size: 50px;
    color:darkorange;
    text-align: center;
  }
  

        </style>

    </head>

<body>
  <!-- Image and text -->
  
 
  
<nav class="navbar navbar-expand-md  fixed-top" style="background-color:#047069">
  <a class="navbar-brand text-white text-center" href="#">BOOK+</a>
  <div class="text-right">
  <a class="navbar-link text-white px-3 mx-1" href="logout.php">Log Out</a>
  </div>
 
</nav>

<div class="content container">
  
<div class="row container">
 
  <div class="col text-center"><a href="donation.php"><i class='fa fa-plus-circle icon-size text-primary'></i><br>
  <p >New Donations</p></a>
  </div>
  <div class="col text-center"><a href="pending_donations.php"><i class='fa fa-plus-circle icon-size text-warning' ></i><br>
     <p >Pending List</p></a>
  </div>
  <div class="col text-center"><a href="recieved_donations.php"><i class='fa fa-plus-circle icon-size text-success'></i><br>
  <p >Recieved Donations</p></a>
  </div>
  
</div>
  <div class="row container">
  <div class="col text-center"><a href="user_info.php"><i class='fa fa-user-circle icon-size text-info'></i><br>
    <p >User Information</p></a>
  </div>
  
  <div class="col text-center"><a href="add_deliverer.php"><i class='fa fa-user-circle icon-size text-info'></i><br>
    <p >Add New Deliverer </p></a>
  </div>

   <div class="col text-center"><a href="email.php"><i class='fa fa-envelope icon-size text-info ' ></i><br>
     <p >Email</p></a>
  </div>
</div>
</div>

     <div class="panel panel-default bg-dark fixed-bottom" style="height:70px;margin:0;border:1px solid black;">
    <div class="panel-body text-center text-white mt-3">BOOK+</div>
  </div>
    
    
    </body>
</html>