 <?php  

session_start();
  if(!$_SESSION['login_user']){
      header("location:login.php");
   }
    $error="";
    $success="";
            if($_POST["subject"] && $_POST["content"]){

             $subject=$_POST["subject"];
             $content=$_POST["content"];
             //Form validation
                    if(!$subject){
                        $error=$error."The subject field is required.<br>";

                    }
                    if(!$content){
                        $error=$error."The content field is required.<br>";

                    }

                    if($error!=""){
                        $error='<div class="alert alert-danger" role="alert"><p>We have found some errors</p><br>'.$error.'</div>';
                     }
            else{
                    // Create connection
                 require("connection.php");
                $value = mysqli_real_escape_string($conn,$content);
                //Mysql query to insert data to contact table
                $sql = "INSERT INTO `contact`(`id`, `subject`, `content`, `date_`) VALUES ('".$_SESSION['login_user']."','".$subject."','".$content."',Now())";
                //checking the result of the Mysql query
                if ($conn->query($sql) === TRUE) {
                     $success=$success.'<div class="alert alert-success" role="alert"><p>your email successfully sent ,we will respond to it ASAP thanks</p><br>
                         </div>';
                } else {
                    $error.= "Failled";
                }

                $conn->close();
                    }

        }
?>
  <!DOCTYPE html>
            <html>
              <head>
                 <title>Report status</title>
                 <meta name="viewport" content="width=device-width, initial-scale=1.0">
                 <link rel="stylesheet" href="bootstrap-4/css/bootstrap.min.css">
                 
                 <script src="bootstrap-4/js/bootstrap.min.js"></script>
                 <script src="jquery-3.min.js"></script>
                 <script src="jquery-3.min/jquery-3.min.js"></script>

              </head>
                
              <body>
                <nav class="navbar fixed-top " style="background-color:#047069;">
                    <a class="mark text-white"  href="index.php" style="background-color:#047069;">BOOK+</a>
                </nav>

                <div class="container col-md-6" style="margin-top:30px;font-size:20px;">
                   <div id="error" style=" height:200px;"><?php echo $error; ?></div>
                      <div id="success" style=" height:200px;"><?php echo $success; ?></div>
                </div>
                  <div class="panel panel-default bg-dark fixed-bottom " style="height:70px;margin:0;border:1px solid black;">
                   <div class="panel-body text-center text-white mt-3">All rights reserved to BOOK+</div>
                 </div>
              </body>
          </html>