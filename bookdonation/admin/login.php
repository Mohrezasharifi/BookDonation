<?php
    session_start();
    $error="";
    $success="";
                if(isset($_POST['email']) && isset($_POST['passw'])){
                     $email=$_POST["email"];
                     $passw = $_POST['passw'];
                     

                     if(!$passw){
                        $error=$error."please choose a password.<br>";

                      }
                     if(!$email){
                        $error=$error."the email field is required<br>";
                      }
                     if( $email && filter_var( $email ,FILTER_VALIDATE_EMAIL)===false){
                         $error=$error."Invalid email address";
                      }
                    
                     if($error!=""){
                                $error='<div class="alert alert-danger" role="alert"><strong>Error</strong><br>'.$error.'</div>';
                       }
                     else{
                        // Create connection
                        require("connection.php");
                        //password encryption
                       
                        //Mysql query for selecting data from register table
                        $check="SELECT `id`, `name`, `email`, `password` FROM `admin` WHERE `email` = '".$email."' AND `password` = '".$passw."' ";
                        //checking the result of query
                        $result=$conn->query($check);
                             if ($result->num_rows > 0){
                                 while($row = mysqli_fetch_array($result)){
                                    $_SESSION['login_user'] = $row['id'];
                                    header("location:dashboard.php");
                                   $conn->close();
                                 }
                              }
                        else{
                             $error=$error.'<div class="alert alert-danger" role="alert"><strong>Incorrect email or password</strong></<br></div>';

                            }
                        }
                     }


?>
<!DOCTYPE html>
<html>
      <head>
          <title>Admin Login</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<!--          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
          <link rel="stylesheet" href="css/login.css">
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
         <script src="Js/jquery-3.3.1.js" type="text/javascript"></script>
         <script src="Js/adminLogin.js" type="text/javascript"></script>
      </head>
      <body >
          <nav class="navbar fixed-top mb-3 pb-2" style="background-color:#047069;">
            <a class="mark" style="text-align:center;background-color:#047069; color:white;" href="dashboard.php">BOOK+</a>
          </nav>
           <div class="container ">
              <div class="container bg-light border border-dark rounded pt-5 pb-4 px-4" id="container">
                 <div class="container  rounded  text-center mt-5 py-4 align-middle" id="header" style="background-color:#047069">
                    <h6 class="text-light">Login </h6>
                 </div>
                <div id="error" style="margin:10px auto;width:300px; "><?php echo $error; ?></div>
                    <form action="login.php" method="post">
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="h5">Email </label>
                          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required autocomplete="off">
                            <small id="emailLabel" class="validEmail">
                                The email must match {abc123@abc.xyz} pattern
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1" class="h5" id="password">Password</label>
                            <input type="password" name="passw" class="form-control" id="password" placeholder="Password" required>
                            <small id="paswordLabel" class="validPwd">
                                The passwords must be {4-10} characters &amp; a letter from {A-Z}
                            </small>
                        </div>

<!--
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">remember me</label>
                        </div>
-->
                        <div class="text-center">
                            <button type="submit" class="btn my-3 px-5 py-2 h5" style="background-color: #047069;color:white;" id="login">Login</button>
                        </div>

                       
                    </form>
                </div>
          </div>
          <div class="panel panel-default bg-dark fixed-bottom" style="height:70px;margin:0;border:1px solid black;">
            <div class="panel-body text-center text-white mt-3">BOOK+</div>
          </div>
      </body>
</html>