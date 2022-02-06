<?php

session_start();
if(!isset($_SESSION['login_user']))
{
  header("location:login.php");
}
$error="";
$success="";
                if($_POST){
                     $uname=$_POST["username"];
                     $phone=$_POST["phone"];
                     $email=$_POST["email"];
                     $city=$_POST["city"];
                     $password1=$_POST["password1"];
                     $password2=$_POST["password2"];

                            if(!$uname){
                                $error=$error."The username  is required.<br>";

                            }
                           if(!$phone){
                                $error=$error."The phone number  is required.<br>";

                            }
                            if(!$city){
                                $error=$error."The city  is required.<br>";

                            }
                            if(!$password1){
                                $error=$error."please choose a password.<br>";

                            }
                            if(!$password2){
                                $error=$error."please choose a password.<br>";

                            }
                            if($password1!=$password2){
                              $error=$error."Repeat the password correctly.<br>";
                            }
                            if(!$email){
                                $error=$error."the email field is required<br>";
                            }
                            if( $email && filter_var( $email ,FILTER_VALIDATE_EMAIL)===false)
                            {
                                $error=$error."Invalid email address";
                            }
                            if($error!="")
                            {
                                $error='<div class="alert alert-danger" role="alert"><strong>Error</strong><br>'.$error.'</div>';
                             }
                    else{
                            // Create connection
                           include("connection.php");
                            $check="SELECT `email` FROM `deliverers` WHERE email= = '$email'";
                            $result=$conn->query($check);
                            if ($result->num_rows!=0)
                            {
                               $error=$error.'<div class="alert alert-danger" role="alert"><strong>User already exists</strong></<br></div>';
                            }
                        else{
                          
                                $password=$password1;
                                $sql = "INSERT INTO `deliverers`( `name`, `email`, `password`, `city`, `phone`)
                                VALUES ('$uname','$email','$password','$city','$phone')";

                                if ($conn->query($sql) === TRUE) {
                                     $success=$success.'<div class="alert alert-success" role="alert"><strong> Well done,you have successfully registered a new deliverer </strong><br>
                                         </div>';
                                    
                                } 

                                else {
                                    $error.= "Operation failed";
                                }

                                $conn->close();
                            }
                       }

                  }


?>
<!DOCTYPE html>
<html>
   <head>
     <title>Add new deliverer</title>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

   </head>
  <style>
    #container{
      max-width: 600px;
      max-height:600px;
      margin-top: 150px;
      margin-bottom: 80px;
    }
    
  </style>
    
   <body >
     <nav class="navbar navbar-expand-md  fixed-top" style="background-color:#047069">
  <a class="navbar-brand text-white text-center" href="#">BOOK+</a>
 
</nav>
     
      
        <div class="container">
              <div id="error" style="margin:40 auto;width:500px; "><?php echo $error; ?></div>
      <div id="success" style="margin:40px auto;width:500px;"><?php echo $success; ?></div>
           <div class="container bg-light border border-dark rounded pt-3 mb-7 pb-4 px-4" id="container">
                 <div class="container text-dark text-bold mb-3 h4"><center> Registration Form</center></div>   
        <form method="post" class="container">
              <div class="row">
              <div class="form-group col-sm">
                
                <input type="text" name="username" class="form-control" id="exampleUserName" placeholder="Username" required autocomplete="off">
              </div>
              <div class="form-group col-sm">
                
                <input type="text" name="phone" class="form-control" id="exampleInputPhone1"  placeholder="Enter your active phone no. " pattern="[0-9]{10}" title="the phone number must be 10 digits" required autocomplete="off">
              </div>
              
                </div>
               <div class="row">
               <div class="form-group col-sm ">
                
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required autocomplete="off">
              </div>
                 <div class="form-group col-sm">
                    
                    <select id="inputCity" class="form-control" name="city" required>
                      <option selected disabled>choose city</option>
                      <option>Mysore</option>
                      <option>Bangalore</option>
                      <option>Mangalore</option>
                      <option>Mandiya</option>
                      <option>Hassan</option>
                    </select>
                  </div>
               </div>
               <div class="row">
              <div class="form-group col-sm">
                
                <input type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
              </div>

              <div class="form-group col-sm">
                
                <input type="password" name="password2" class="form-control" id="exampleInputPassword2" placeholder="Repeat Password" required>
              </div>
          </div>
              <div class="text-center">
                <button type="submit" class="btn btn-outline-info  " style="width:200px;">Register</button>
              </div>
            
        </form>

     </div>
    </div>
    
     <div class="panel panel-default bg-dark fixed-bottom" style="height:70px;margin:0;border:1px solid black;">
    <div class="panel-body text-center text-white mt-3">BOOK+</div>
  </div>
  </body>

</html>
