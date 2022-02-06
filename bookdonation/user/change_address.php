<?php
session_start();

?>
<html>
   <head>
      <title>Edit Account</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
      
      <style>
         .container{
            margin-top: 100px;
            width: 400px;
            border:2px solid lightblue;
            border-radius: 10px;
         
         }
         nav a:hover{
            text-decoration: none;
            
         }
      
      </style>  
   </head>


</html>
<body>
                <nav class="navbar fixed-top mb-5" style="background-color:#047069;">
                    <a class="mark text-white"  href="index.php" style="background-color:#047069;">BOOK+</a>
                </nav>
     
                 <div class="container py-4 px-3">
                   <h4 class="text-center">Change Address</h4>
                     <form method="post" action="address_result.php" >
                        <div class="form-group">
                          <label for="usr">New Address:</label>
                          <input type="text" name="address" class="form-control" id="usr"  required>
                        </div>
                        <div class="form-group">
                          <label for="pwd">Zip:</label>
                          <input type="number" name="zip" class="form-control" id="pwd" required>
                        </div>
                       <center> <button type="submit" class="btn btn-outline-info">Submit</button></center>
                      </form>
    
                 </div>
   
    
                <div class="panel panel-default bg-dark fixed-bottom " style="height:70px;margin:0;border:1px solid black;">
                  <div class="panel-body text-center text-white mt-3">All rights reserved to BOOK+</div>
                </div>


</body>