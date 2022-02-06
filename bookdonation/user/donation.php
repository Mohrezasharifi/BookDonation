<?php
session_start();
if(!$_SESSION['login_user'])
{
  header("location:login.php");
}
$error="";
$success="";
                if($_POST){
                     $phone=$_POST["d-phone"];
                     $address=$_POST["d-address"];
                     $city=$_POST["d-city"];
                     $state=$_POST["d-state"];
                     $zip=$_POST["d-zip"];
                     $no_book=$_POST["no-book"];
                     $catagory=$_POST["d-catagory"];
                     
                            
                            
                            if(!$phone){
                                $error=$error."The phone number is required.<br>";

                            }
                             if(!$address){
                                $error=$error."The address is required.<br>";

                            }
                             if(!$city){
                                $error=$error."The city is required.<br>";

                            }
                             if(!$state){
                                $error=$error."The state is required.<br>";

                            }
                             if(!$zip){
                                $error=$error."The zip code is required.<br>";

                            }
                             if(!$no_book){
                                $error=$error."The number of books is required.<br>";

                            }
                            
                             if(!$catagory){
                                $error=$error."The catagory is required.<br>";

                            }
                            
                            
                            
                            if($error!="")
                            {
                                $error='<div class="alert alert-danger" role="alert"><strong>We have found some errors</strong><br>'.$error.'</div>';
                             }
                    else{
                            // Create connection
                        require("connection.php");
                        //$value_address = mysqli_real_escape_string($conn,$address);
                        
                        $sql = "INSERT INTO `donation`(`id`, `phone`, `address`,"
                                . " `city`, `state`, `zipcode`, `no_book`, `category`) "
                                . " VALUES ('".$_SESSION['login_user']."', '".$phone."','".$address."','".$city."','".$state."','".$zip."','".$no_book."','".$catagory."')";

                        $conn->query($sql);
                        if ($conn->query($sql) === TRUE) {
                             $success=$success.'<div class="alert alert-success" role="alert"><strong>Thank you, Your donation request has been successfully done ,we will contact you as soon as possible</strong><br>
                                 </div>';
                        } else {                            
                            $error.= '<div class="alert alert-danger" role="alert"><strong>there is an issue regarding the syntax please try again</strong><br></div>';
                        }

                        $conn->close();
                            }

                }
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/donation.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  
    </head>
  
  
  
  
  
  
  <body>
<!--   <nav class="navbar fixed-top " style="background-color:#047069;">
    <a class="mark" style="text-align:center;background-color:#047069; color:white;" href="index.php">BOOK+</a>
   </nav>-->
     
    <div class="container">
        <h3 class="my-3 text-center"><b>Donate Books</b></h3>
    <div class="row">
    <div class="donate-info text-left col-md">
          
    
     <div id="error"><?php echo $error; ?></div>
     <div id="success"><?php echo $success; ?></div>

    
    <p><b>We will accept:</b></p>
          <ol>
          <li>School textbooks and notebooks</li>
          <li>Hardcover and paperbooks in good condition</li>
          <li>Puzzles and board games are accepted</li>
          <li>Unused stationary products</li>
          
          </ol>
    <p><b>We will not accept</b></p>
          <ol>
          <li>Books which are heavily damaged</li>
          <li>Board games which have missing pieces</li>
          <li>Adult books and other stuff will not be accepted</li>
          <li>Non educational magazine will not be accepted</li>
          
          </ol>
    
    
    </div>
     
<form method="post" class="col-md" >

  <div class="form-row">
    <div class="form-group col-md">
    <input type="text" class="form-control" name="d-phone" id="inputPhone" pattern="[0-9]{10}" placeholder="Your active mobile number *" title="The phone number must be 10 digits long" required>
    </div>
   </div>
   <div class="form-row">
    <div class="form-group col-md">
    <input type="text" class="form-control" id="inputAddress" 
           name="d-address" placeholder="Your Correct Address . like :1234 Main St,apartment,floor" required>
  </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <select id="inputCity" class="form-control " name="d-city" required>
        <option selected disabled>choose city</option>
        <option value="Mysore">Mysore</option>
        <option>Bangalore</option>
        <option>Mangalore</option>
        <option>Mandiya</option>
        <option>Hassan</option>
        <option>Kuchi</option>
        <option>Thrissur</option>
        <option>Malappuram</option>
        <option>Kannur</option>
        <option>Kollam</option>
      </select>
    </div>
    <div class="form-group col-md-6">
     
      <select id="inputState" class="form-control" name="d-state" required>
        <option selected disabled>choose state</option>
        <option>Karnataka</option>
        <option>Kerala</option>

      </select>
    </div>
   
  </div>
  <div class="form-row">
      <div class="form-group col-md-6">
     
      <input type="text" class="form-control" id="inputZip" name="d-zip" pattern="[0-9]*" title="only numbers are accepted" placeholder="Zip code" required>
    </div>
    <div class="form-group col-md-6">
    <input type="number" class="form-control" id="inutNoOfBooks" name="no-book"  pattern="[0-9]*" title="only numbers are accepted" placeholder="No.of books .(1-99) *" required>
  </div>
   </div>
   <div class="row">
     <div class="form-group col-md">
     
      <select id="inputState" class="form-control" name="d-catagory" required >
        <option disabled selected>choose catagory</option>
        <option>school books</option>
        <option>college books</option>
        <option>story books</option>
        <option>board  games</option>
        <option>fresh stationary</option>
        <option>other books</option>
       
      </select>
    </div>
  </div>
 
 <center> <button type="submit" class="btn text-white mt-3" style="background-color:#047069;width:200px;">Submit</button></center>
  
</form>
       </div>
  </div>
    <div class="panel panel-default bg-dark fixed-bottom " style="height:40px;margin:0;border:1px solid black;">
                   <div class="panel-body text-center text-white mt-2">All rights reserved to BOOK+</div>
                 </div>
    
  </body>
  </html>