<?php
  session_start();
  if(!$_SESSION['login_user']){
      header("location:login.php");
   }

 

?>

        <!DOCTYPE html>
            <html>
              <head>
                 <title>Contact form</title>
                 <meta name="viewport" content="width=device-width, initial-scale=1.0">
                 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
                 <link rel="stylesheet" href="css/contact_form.css">
                 <script src="bootstrap-4/js/bootstrap.min.js"></script>
                 <script src="jquery-3.min.js"></script>
                 <script src="jquery-3.min/jquery-3.min.js"></script>
                 <style>
                form{
                  max-width: 500px;
                  border:1px solid gray;
                  border-radius: 10px;
                   }
                </style>
              </head>
                
              <body>
                <nav class="navbar fixed-top mb-3 pb-2" style="background-color:#047069;">
            <a class="mark" style="text-align:center;background-color:#047069; color:white;" href="index.php">BOOK+</a>
          </nav>

                <div class="container col-md-6" style="margin-top:30px;font-size:20px;">
                   <form id="form" class="form py-5 px-4" method="post" action="contact_result.php">
                      <h3 class="text-center">Get in touch with us</h3>
                      

                      <div class="form-group">
                        <label for="Subject">Subject</label>
                        <input type="text" class="form-control " id="subject" name="subject" placeholder="Subject" required autocomplete="off">
                      </div>

                      <div class="form-group">
                        <label for="content">What would you like to ask about ?</label>
                        <textarea class="form-control" id="content" name="content" rows="6" required ></textarea>
                      </div>
                      <center><button type="submit" id="submit" class="btn btn-outline-primary " style="width:200px;">Send</button></center>
                   </form>
                </div>
                  <div class="panel panel-default bg-dark fixed-bottom " style="height:70px;margin:0;border:1px solid black;">
                   <div class="panel-body text-center text-white mt-3">All rights reserved to BOOK+</div>
                 </div>
              </body>
          </html>