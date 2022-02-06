<?php
session_start();

?>
<html>
   <head>
      <title>Edit Account</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <style>
         .container{
            margin-top: 100px;
            max-width: 400px;
         }
         .matched
         {
            color: green;
            display: none;
         }
         .inmatched
         {
            display: none;
            color: red;
         }  
    .valid
{
    border: 1.3px solid red;
    outline: 0px;
}
.invalid
{
    border: 1.3px solid green;
    outline: 0px;
}

.invalidPwd
{
    color: orange;
    display: block;
}
.validPwd
{
    display: none;
}         
      </style>      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
      <script src="Js/jquery-3.3.1.js"></script>
      <script src="Js/changepass.js"></script>      
   </head>


</html>
<body>
                <nav class="navbar fixed-top mb-5" style="background-color:#047069;">
                    <a class="mark text-white"  href="home.php" style="background-color:#047069;">BOOK+</a>
                </nav>

              <div class="container col-md-4  text-center">
                 
                        <div class="text-center h4">Change Password</div>
             
              <form class="mt-4 container" method="post" action="changepass.php">
                        
                        <div class="form-group" id="success_result">
                           <a href="index.php" id="go_to_home_link" class="alert-success" style="display:none;" >Go to the home page</a>
                        </div>   
                        <div id="succeded_container">
                              <div class="form-group mb-3">
                                  <input type="password" name="old_pwd" class="form-control" id="current_pwd" placeholder="Your Current Password" required autocomplete="off">
                              </div>
                               <div class="form-group" id="wrong_pwd">

                               </div>
                               <div class="form-group mb-3">

                                  <input type="password" name="new_pwd" class="form-control" id="new_pwd" placeholder="Type New Password" required autocomplete="off">
                            <small id="paswordLabel" class="validPwd text-justify">
                                 Passwords must be {4-10} characters &amp; a letter from {A-Z}
                            </small> 
                              </div>
                               <div class="form-group mb-3">

                                  <input type="password" name="confirm_pwd" class="form-control" id="confirm_pwd" placeholder="re-type New Password" required autocomplete="off">
                                  <p class="small inmatched text-justify">
                                       Matched passwords.
                                  </p>
                                  <p class="small matched text-justify">
                                       Doesnot Match.
                                  </p>                                  
                              </div>
                             <center><button type="submit" id="save-changes" class="btn btn-block text-white my-4" style="background-color:#047069;"  >Save Changes</button></center>                 
                        </div>
   
               </form>
              
   
   
   
    </div>
                 <div class="panel panel-default bg-dark fixed-bottom " style="height:70px;margin:0;border:1px solid black;">
                   <div class="panel-body text-center text-white mt-3">All rights reserved to BOOK+</div>
                 </div>


</body>