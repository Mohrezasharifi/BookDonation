<?php
        $error="";
        $success="";
                if($_POST){
                     $uname=$_POST["username"];
                     $email=$_POST["email"];
                     $password1=$_POST["password1"];
                     $password2=$_POST["password2"];

                            if(!$uname){
                                $error=$error."The username  is required.<br>";

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
                            require("connection.php");
                            $check="SELECT email FROM register WHERE email = '$email'";
                            $result=$conn->query($check);
                            if ($result->num_rows!=0)
                            {
                               $error=$error.'<div class="alert alert-danger" role="alert"><strong>User already exists</strong></<br></div>';
                            }
                        else{
                          
                                $password=$password1;
                                $sql = "INSERT INTO register (username, email, password,join_date)
                                VALUES ('$uname','$email','$password',Now())";

                                if ($conn->query($sql) === TRUE) {
                                     $success=$success.'<div class="alert alert-success" role="alert"><strong> Welcome,your have successfully joined </strong><br>
                                         </div>';
                                    header("location:login.php");
                                } 

                                else {
                                    $error.= "there is an issue regarding the syntax please try again";
                                }

                                $conn->close();
                            }
                       }

                  }


?>

<!DOCTYPE html>
<html>
   <head>
       <title>User registration form</title>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="bootstrap-4/css/bootstrap.min.css">
       <link rel="stylesheet" href="css/register.css">
       <script src="bootstrap-4/js/bootstrap.min.js"></script>
       <script src="Js/jquery-3.3.1.js" type="text/javascript"></script>
       <script src="Js/register.js" type="text/javascript"></script>
   </head>
    
   <body >
                       <nav class="navbar fixed-top mb-3 pb-2" style="background-color:#047069;">
            <a class="mark" style="text-align:center;background-color:#047069; color:white;" href="index.php">BOOK+</a>
          </nav>
      <div id="error" style="margin:50px auto;width:500px; "><?php echo $error; ?></div>
        <div id="success" style="margin:50px auto;width:500px;"><?php echo $success; ?></div>
       
         <div class="container">
           <div class="container bg-light border border-dark rounded pt-4 pb-5 px-4" id="container">
<!--
             <div class="container  rounded  text-center py-3 align-middle mt-5" id="header">
                 <h6 class="text-light  ">
                    Create new account 
                 </h6>
             </div>
-->            <div class="text-center font-weight-bold py-lg-3">Create new account</div>
               
               <form method="post" class="pt-1" >

                  <div class="form-group">
                    <label for="exampleUserName" class="h5">Username</label>
                    <input type="text" name="username" class="form-control"
                     id="exampleUserName" placeholder="Username" required autocomplete="off">
                      <small>
                      The username must include {4-12} characters
                      </small>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1" class="h5">Email </label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required autocomplete="off">
                      <small>
                      The email must match {abc123@abc.xyz} pattern
                      </small>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1" class="h5">Password</label>
                    <input type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                    <small id="paswordLabel" class="validPwd">
                       The passwords must be {4-10} characters &amp; a letter from {A-Z}
                    </small> 
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword2" class="h5">Confirm</label>
                    <input type="password" name="password2" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password" required>
                    <p class="inmatched small" id="inmatched">
                        password desnot match
                    </p>
                    <p class="matched small" id="matched">
                        passwords matches
                    </p>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-block px-5  my-4 text-light h5" style="background-color:#047069;" id="join"> 
                        Join
                    </button>
                  </div>

             </form>

         </div>
      </div>  
       <div class="panel panel-default bg-dark py-3 " >
            <div class="panel-body text-center text-white mt-3 pb-3">© 2019 Copyright</div>
          </div>
  </body>

</html>
