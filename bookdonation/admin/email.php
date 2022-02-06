<?php

session_start();
if(!isset($_SESSION['login_user']))
{
  header("location:login.php");
}
include("connection.php");
    
        
 ?>

<!DOCTYPE>
<html>
    <head>
      <title>User Reports</title>
        
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="script/bootbox.min.js"></script>
        <script type="text/javascript" src="script/deleteRecords.js"></script>
        <script>
        var deleteid;
        function deletedata(id){
            deleteid = id;
        }
        function confirmdelete(){
            document.getElementById(deleteid).style.display = "none";
            $.ajax({
              method: "POST",
              url: "delete_email.php",
              data: { id: deleteid}
            });
        }
            function readdata(rid){
               
                document.getElementById("form"+rid).submit();
              
            }
        </script>
        
        
       
        <style>
            .icon-color{
                color: red;
            }
        </style>
    </head>
    <body>
        
  <!-- Image and text -->
  

  
<nav class="navbar navbar-expand-sm  fixed-top" style="background-color:#047069">
  <a class="navbar-brand text-white text-middle" href="dashboard.php">BOOK+</a>
 
</nav>
  <br>
  <br>
  <br>
<div class="content container" >
    <table class="table table-hover ">
    <thead class="table-header bg-info text-white">
        <tr>

          <th scope="col">Subject</th>
          <th scope="col">Date</th>
          <th scope="col">Content</th>
          <th scope="col">Delete</th>
          
        </tr>
    </thead>
 
      <tbody>
        <?php

        $sql = "SELECT  `contactid`,`subject`, `content`, `date_` FROM `contact` WHERE 1";
        $result = mysqli_query($conn,$sql); //$conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
          while($row = $result->fetch_assoc()) {
          $content = substr($row["content"], 0, 15)."...";
          echo"<tr id="; echo $row['contactid']; echo ">"; 
          echo "<form action=\"read_email.php\" method=\"post\" id=form"; echo $row['contactid']; echo ">";
          ?>
          <input type="hidden" name="contactid" value=" <?php echo $row['contactid']; ?> " >      
          <?php 
          echo"<td>".$row["subject"]."</td>";
            
          echo"<td>".$row["date_"]."</td>";?>
              <button type="submit" class="btn btn-link" >
          <?php echo"<td onclick=\"readdata("; echo $row['contactid']; echo ")\" style = \"cursor:pointer;\">".$content."</td>"; ?>
              </button>
           
          <?php echo "</form><td><a onclick="; echo "deletedata("; echo $row['contactid']; echo ")"; ?>
              
          data-toggle="modal" data-target="#myModal"
           <?php echo " href="; echo "javascript:void(0)"; echo "><i class='fa fa-trash icon-color' ></i>delete</a>"."</td>";
          echo"</tr>";
               }
                
         
            $conn->close();
}
        ?>
      </tbody>
</table>
        
  
</div>
    
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to Delete ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary"  data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger"  data-dismiss="modal" onclick="confirmdelete()">Delete</button>
          </div>
        </div>

      </div>
    </div>
        <div class="panel panel-default bg-dark fixed-bottom" style="height:70px;margin:0;border:1px solid black;">
    <div class="panel-body text-center text-white mt-3">BOOK+</div>
  </div>
    </body>

</html>