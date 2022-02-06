<?php
session_start();
   if(!isset( $_SESSION['login_user'])){
      header("location:index.php");
   }
   else{
         $error="";
         $success="";
      if(isset($_POST["phone"])){

        
         $id= $_SESSION['login_user'];
         $new_phone=$_POST["phone"];
         require("connection.php");
         $check="UPDATE `donation` SET `phone`='".$new_phone."' WHERE  id='".$id."' and delivered=0";
          $result=$conn->query($check);
          if ($result)
          {
             $success.="your phone number has been successfuly changed";
          }
       else{
             $error.="operation failed";
          }

}
?>
<!DOCTYPE html>
<html>
      <head>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
      
          <style>
             .container{
                width: 400px;
                border: 2px solid lightblue;
                border-radius: 10px;
             }
             nav a:hover{
                text-decoration: none;
             }
         
         </style>
      </head>
      <body >
          <nav class="navbar  mb-lg-5 mb-md-4 mb-sm-1 pb-lg-3 pb-md-2 pb-sm-1" style="background-color:#047069;">
            <a class="font-weight-normal" style="text-align:center;background-color:#047069; color:white;" href="index.php"><i class="fas fa-home mr-3  "></i>Book+</a>
          </nav>
            <div class="container px-4 py-5">
                   <h4 class="text-center">Changing Phone number</h4>
                     <form method="post" >
                        <div class="form-group py-4">
                          <label for="usr">New phone No.:</label>
                          <input type="text" name="phone" class="form-control" id="usr" pattern="[0-9]{10}" title="the phone number must be 10 digits" required>
                        </div>
                        
                       <center> <button type="submit" class="btn btn-outline-info">Submit</button></center>
                      </form>
    
                 </div>
           
              <p class="text-center text-danger"><?php echo $error ?></p>
              <p class="text-center text-success "><?php echo $success; }?></p>
          
          <!-- Footer -->
<footer class="page-footer font-small bg-dark py-lg-2 py-sm-1 fixed-bottom">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 text-light">© 2019 Copyright:
   
  </div>


</footer>

      </body>
</html>

