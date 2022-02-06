 <?php
    session_start();
    $error="";
    $success="";
                if($_POST){
                     $email=$_POST["email"];
                     $password=$_POST["password"];
                     

                     if(!$password){
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
                        //$password1=md5($password);
                         $password1=$password;
                        //Mysql query for selecting data from register table
                        $check="SELECT id,email,password FROM register WHERE email = '$email' AND password='$password1'";
                        //checking the result of query
                        $result=$conn->query($check);
                            if ($result->num_rows==1){
                            
                                     while($row = mysqli_fetch_array($result))
                                      $_SESSION['login_user'] = $row['id'];
                                      header("location: index.php");
                               $conn->close();
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
          <title>User Login</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          
<!--          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">-->
         <link rel="stylesheet" href="bootstrap-4/css/bootstrap.min.css">
          <link rel="stylesheet" href="fontawesome/fontawesome-free/css/all.css">
          <link rel="stylesheet" href="css/login.css">
          <script src="jquery-3.min/jquery-3.min.js"></script>
          <script src="bootstrap-4/js/bootstrap.min.js"></script>
          <script src="Js/login_validation.js" type="text/javascript"></script>
          
      </head>
      <body >
          <nav class="navbar  mb-lg-5 mb-md-4 mb-sm-1 pb-lg-3 pb-md-2 pb-sm-1" style="background-color:#047069;">
              <a href="index.php" style="text-decoration: none; color:white;">
                  <i class="fas fa-home mr-1"></i>
                  Book+
              </a>
          </nav>
           <div class="container mt-lg-5 mt-md-4 mt-sm-1 pb-md-3 pb-sm-2 ">
              <div class="container bg-light border border-dark rounded pt-lg-5 pt-md-4 pt-sm-4 px-4 mt-5" id="container">
<!--
                 <div class="container  rounded  text-center mt-5 py-lg-4 py-md-4 py-sm-4  align-middle" id="header" style="background-color:#047069">
                    <h6 class="text-light">Login </h6>
                 </div>

-->              <div class="text-center font-weight-bold h5 py-4 text-light " style="background-color:#047069;">Login to continue</div>
                 <div id="error" style="margin:10px auto;width:300px; "><?php echo $error; ?></div>
                    <form method="post" class="mb-lg-4 mb-xl-4 py-lg-4 py-sm-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="h5">Email </label>
                          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email" required autocomplete="off">
                            <small id="emailLabel" class="validEmail">
                                The email must match {abc123@abc.xyz} pattern
                            </small>
                        </div>

                        <div class="form-group my-2">
                            <label for="exampleInputPassword1" class="h5">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your Password" required autocomplete="off">
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

                        <div class="text-center  mt-lg-4 pt-lg-3">
                            <button type="submit" class="btn btn-block px-5 py h5" style="background-color: #047069;color:white;" id="login"><i class="fas fa-sign-in-alt mr-2 "></i>Login</button>
                        </div>

                       
                    </form>
                </div>
          </div>
      </body>
</html>
