<?php

session_start();
if(!isset($_SESSION['login_user']))
{
  header("location:login.php");
}
?>

<!DOCTYPE>
<html>
    <head>
         <title>User Info</title>
        
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
        
        
        
       
        <style>

        </style>
    </head>
    <body>
        
  <!-- Image and text -->
  

  
<nav class="navbar navbar-expand-sm  fixed-top" style="background-color:#047069">
  <a class="navbar-brand text-white text-middle" href="dashboard.php">BOOK+</a>
 
</nav>

<div class="content container" >
    
    <table class="table table-hover ">
    <thead class="table-header">
        <tr>

          <th scope="col">Username</th>
          <th scope="col">Email</th>
          
          <th scope="col"> Date</th>
          
          
        </tr>
    </thead>
 
      <tbody>
        <?php
        include("connection.php");
        $sql = "SELECT `id`, `username`, `email`, `join_date` FROM `register` WHERE 1";
        $result = mysqli_query($conn,$sql); //$conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
          while($row = $result->fetch_assoc()) {
             
        
        
          ?>
               
          <?php 
            echo"<tr>";
          echo"<td >".$row["username"]."</td>";
          $email = substr( $row["email"], 0, 16)."...";
          echo"<td >".$email."</td>";
          
         
          
          echo"<td >".$row["join_date"]."</td>"; 
             
           
           echo "</form><td><a onclick="; echo "deletedata("; echo $row['id']; echo ")"; 
           echo"</tr>";
          
              
         }
                
         } 
            $conn->close();

       ?>
      </tbody>
</table>
        

</div>
    
       <div class="panel panel-default bg-dark fixed-bottom" style="height:70px;margin:0px;border:1px solid black;">
    <div class="panel-body text-center text-white mt-3">BOOK+</div>
  </div>   
    </body>

</html>