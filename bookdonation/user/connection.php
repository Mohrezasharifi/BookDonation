<?php 
// Create connection
  /*  $server_name="localhost";
    $user_name="root";
    $password="";
    $db_name="online_book+";
   */
      $conn = new mysqli("localhost","root","","online_book+");
    // Check connection
      if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
?>