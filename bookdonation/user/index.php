<?php
    session_start();
?>    
<! DOCTYPE html>
<html>
    <head>
    
            
      <meta charset="UTF-8">
      <meta name="description" content="Online book donation system(Book++)">
      <meta name="keywords" content="Book+,Knowledge+">
      <meta name="author" content="Ali Aqa Mohammadi">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<!--     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
      <link rel="stylesheet" href="fontawesome/fontawesome-free/css/all.css">
      <link rel="stylesheet" href="css/index1.css">
    </head> 
  
  
  
  
    <body>
      
      
        <nav class="navbar fixed-top w-100 mb-3 navbar-expand-lg navbar-dark " style="background-color:#047069;">
          <div class="container-fluid">
             <a class="navbar-brand" href="#">
             <img src="image/logo.png" width="40" height="40" class="d-inline-block align-top" alt="">
             </a>
             <button class="navbar-toggler  " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon text-white"  ></span>
             </button>

               <div class="collapse navbar-collapse" id="navbarTogglerDemo02" style="color:white;">
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                      <li class="nav-item active">
                      <a class="nav-link" href="donation.php">Donate Book </a>
                      </li>
<!--
                    
                      <li class="nav-item">
                      <a class="nav-link" href="#">Our Process</a>
                      </li>
                    
                      <li class="nav-item">
                      <a class="nav-link " href="#">About</a>
                      </li>
-->
                    
                      <li class="nav-item ">
                      <a class="nav-link " href="contact_form.php"><i class="far fa-envelope mr-2"></i>Contact</a>
                      </li>
                      <?php if(!isset($_SESSION['login_user'])){?>
                      <li class="nav-item text-white">
                      <a href="login.php" class="nav-link "><i class="fas fa-sign-in-alt mr-2"></i> Login</a>
                      </li>
                      <li class="nav-item">
                      <a href="register.php" class="nav-link "><i class="fas fa-sign-in-alt mr-2"></i> Sign Up</a>
                      </li>
                      
                      <?php }
                      else {?>
                      <li class="nav-item float-right">
                      <a href="logout.php" class="nav-link "><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
                      </li>
                      <li class="nav-item dropdown ">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fa fa-cog pr-2" aria-hidden="true"></i>setting
                      </a>
                      <div class="dropdown-menu text-light bg-info" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="user_account.php">Change Password</a>
                        <a class="dropdown-item" href="change_address.php">Change Address</a>
                        
                        <a class="dropdown-item" href="change_phone.php">Change phone</a>
                      </div>
                    </li>

                    <?php }?>
                </ul>
              </div>
            </div>
        </nav>
     
        <div class="jumbotron jumbotron-fluid w-100 h-75 ">
                 <div class="container flow  ">
                      <h1 class="display" style="color: #fff; ">BOOK+</h1>
                      <p>journey. They are home.Reading is an exercise in empathy; an exercise in walking in someone else’s shoes for a while. -Malorie Blackman</p>
                      <a  href="donation.php" role="button"><button class=" btn  my-2 my-sm-0" style="" >Donate Now</button></a>
                 </div>
      
                 <div class="text-white">
                      <h3 style="margin:12px;">what we accept</h3>
                      <ul class="container list-inline flow">&nbsp;&nbsp; 
                        <li class="list-inline-item"><i class="fas fa-check"></i> Fresh books</li>&nbsp;&nbsp;
                        <li class="list-inline-item"><i class="fas fa-check"></i> used books</li>&nbsp;&nbsp;
                        <li class="list-inline-item"><i class="fas fa-check"></i> school books </li>&nbsp;&nbsp;
                        <li class="list-inline-item"><i class="fas fa-check"></i> Fresh books</li>&nbsp;&nbsp;
                        <li class="list-inline-item"><i class="fas fa-check"></i> used books</li>&nbsp;&nbsp;
                        <li class="list-inline-item"><i class="fas fa-check"></i> school books </li>
                      </ul>
                </div>
        </div>

        <div class="text-justify container" style="margin:50px auto;">
         <div class="text-center row " style="font-weight:bold;font-size:30px;"><h2 class="para"><i>About US</i></h2></div>
          <div class="row container">
            <div class="col-sm-12 col-md-6 col-lg-4">
             <img class="img-responsive" src="image/donate1%20(1).jpg" height="300" width="300" >
          
          </div>
          <div class="col-sm-12 col-md-6 col-lg-8"  >
Book+ is an initiative by Green Community Organization to help bridge the gap between those who want to help children read and those who need books for children. Together we will build a Reading India by making storybooks accessible to thousands of children and spread the joy of reading. 
 
This led to the idea of a crowd-funding initiative – this initiative! That would make it easy to help India’s children read. All a donor needs to do is pick an NGO, librarian, or a Reading Champion they would like to support, and with a few clicks send them a set of books that a group of children can discover, read, and enjoy! 
Our sole aim is to see more Indian children read, and that is why every book donated on this platform goes  the children for whom they are meant. 
At BOOK+ we connect those who need children's books across India, with those who can help get these books to them.  
            </div>
       </div>
      </div>
 
              
             <div class="card-deck  ">
               <div class="  col-sm-12 col-md-4 col-lg-4">
             <div class="card bg-info my-3 py-4 text-white">
                  <div class="card-body">
                    <h5 class="card-title">Our Process</h5>
                    <ol class="card-text">
                      <li>Fill the form</li>
                      <li>We will contact you </li>
                      <li>We will collect from your address</li>
                    </ol>
                  </div>
             </div>
            </div>
               <div class="  col-sm-12 col-md-4 col-lg-4">
                 <div class="card bg-success  py-4 my-3  text-white ">
                  <div class="card-body">
                    <h5 class="card-title">Our Achievements</h5>
                    <ol class="card-text">
                      <li>200 NGO partners</li>
                      <li>10000 Books donated so far </li>
                      <li>we oover 8 city</li>
                    </ol>
                  </div>
                 </div>
             </div>
               <div class="  col-sm-12 col-md-4 col-lg-4">
               <div class="card bg-info  py-3 my-3 text-white ">
                  <div class="card-body">
                    <h5 class="card-title">We Collect For</h5>
                    <ol class="card-text">
                      <li> Remote schools</li>
                      <li>Government schools that have less access to books</li>
                      <li>Public libraries  </li>
                    </ol>
                  </div>
                 </div>
             </div>
         </div>
        
      
      <div style="text-align:center;margin:50px;" class="para"><h2><i>Our Team</i></h2></div>
          <div class="card-deck ">
             <div class="card">
                  <img src="image/card.jpg" class="card-img-top"  alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Sara Sara</h5>
                    <p class="card-text">The founder of BOOK+ organization  .</p>
                  </div>
             </div>
             <div class="card">
                  <img src="image/card1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Ali Paiman</h5>
                    <p class="card-text">The survey manager of BOOK+ organization.</p>
                  </div>
             </div>
             <div class="card">
                   <img src="image/card2.jpg" class="card-img-top" alt="...">
                   <div class="card-body">
                     <h5 class="card-title">John Doe</h5>
                     <p class="card-text">The financial manager of BOOK+ organization.</p>
                   </div>
             </div>
         </div>
       
    <div class="panel panel-default bg-dark py-5" >
       <div class="panel-body  text-white mt-2 mx-3">
         <div class="text-center">
           <i class='fa fa-copyright'></i>All rights reserved to BOOK+
         </div>
       
      
      </div>
    </div>
      

    </body>
</html>