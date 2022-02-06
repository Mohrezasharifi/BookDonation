<?php
session_start();
if(!$_SESSION['login_user'])
{
  header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
 <head>
   <title>New assignements</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="fontawesome/fontawesome-free/css/all.css">
       <link rel="stylesheet" href="bootstrap-4/css/bootstrap.min.css">
       <script src="jquery-3.min/jquery-3.min.js"></script>
       <script src="bootstrap-4/js/bootstrap.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script>  
    function readdata(rid){
               
                document.getElementById("form"+rid).submit();
              
            }
   
   </script>
  <style>
   .navbar-link:hover{
    text-decoration: none;
   
   }
  </style>
 </head>
 <body>
<nav class="navbar navbar-expand-lg  fixed-top mb-4" style="background-color:#047069">
  <a class="navbar-brand text-white text-middle" href="home.php">BOOK+</a>
  <li class="nav-item dropdown " style="list-style-type:none;">
                      <a class="nav-link dropdown-toggle text-light mb-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fa fa-cog pr-2 " aria-hidden="true"></i>Account
                      </a>
                      <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="myaccount.php">Change Password</a>
                        <a class="dropdown-item" href="logout.php">Log Out</a>
                      
                      </div>
                    </li>
    </nav>
 <div class="content container my-5 pt-3" >
    <table class="table table-hover ">
    <thead class="table-header bg-info text-light">
        <tr>

          <th scope="col">Phone</th>
          <th scope="col">Date</th>
          
          <th scope="col">Address</th>
          
          
        </tr>
    </thead>
 
      <tbody>
        <?php
        include("connection.php");
        $del_id=$_SESSION['login_user'];
        $donate_id="";
        $sql1="SELECT `donate_id` FROM `assign_delivery` WHERE deliverer_id='".$del_id."' AND status=0";
        $result1 = mysqli_query($conn,$sql1);
       if (mysqli_num_rows($result1) > 0){
        while($row1 = $result1->fetch_assoc()) {
          $donate_id=$row1["donate_id"];
         }
        $sql = "SELECT  `donate_id`,`status`,`delivered`, `phone`, `address`, `city`, `state`, `zip`, `no-book`, `catagory`, `donation_date` FROM `donation` WHERE donate_id='". $donate_id."' AND delivered=0";
        $result = mysqli_query($conn,$sql); //$conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
         
            // output data of each row
          while($row = $result->fetch_assoc()) {
              $content=$row["address"]." , ".$row["city"]." , ".$row["state"]." , ".$row["zip"];
          $address = substr( $content, 0, 15)."...";
          echo"<tr id=".'"'; echo $row['donate_id'].'"'; echo">"; 
          echo "<form action=\"donation_details.php\" method=\"post\" id=form"; echo $row['donate_id']; echo ">";
          ?>
          <input type="hidden" name="donate_id" value=" <?php echo $row['donate_id']; ?> " >      
          <?php 
          echo"<td >".$row["phone"]."</td>";
            
          echo"<td >".$row["donation_date"]."</td>";
          
          ?>
          
              <button type="submit" class="btn btn-link" >
          <?php echo"<td onclick=\"readdata("; echo $row['donate_id']; echo ")\" style = \"cursor:pointer;\">".$address."</td>"; ?>
              </button>
           
          <?php echo "</form></tr>";
               }
        }
         
            $conn->close();
}
        ?>
      </tbody>
</table>
        

</div>
  
 

<div class="panel panel-default bg-dark fixed-bottom" style="height:70px;margin:0px;border:1px solid black;">
    <div class="panel-body text-center text-white mt-3">BOOK+</div>
  </div> 
 </body></html>