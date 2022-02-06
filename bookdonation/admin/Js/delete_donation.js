     var deleteid;
        function deletedata(id){
            deleteid = id;
        }
        function confirmdelete(){
            document.getElementById(deleteid).style.display = "none";
            $.ajax({
              method: "POST",
              url: "delete_donation.php",
              data: { id: deleteid}
            });
        }
            function readdata(rid){
               
                document.getElementById("form"+rid).submit();
              
            }