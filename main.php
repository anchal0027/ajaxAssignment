<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="load.js"></script>
      <meta charset="utf-8">
   </head>
   
   <body>
      <div class="container">
      </div>
      <ul class="pagination"></ul>
      <div class="container-fluid">
         <!-- Trigger the modal with a button -->
         <CENTER><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Guest</button></CENTER>
         <!-- Modal -->
         <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <center><h4 class="modal-title">Enter Guest Details</h4></center>
                  </div>
                  <div class="modal-body">
                     <div id="form-content"  align="center" >
                        <form  style="width:50%;" align="center" id="form" METHOD="POST">
                           <fieldset>
                              <div class="form-group"align="left">
                                 <label for="name">Name:</label>
                                 <input type="text" name="name"class="form-control" id="pname" placeholder="Enter Name here" required> 
                              </div>
                              <div class="form-group"align="left">
                                 <label for="email">Email:</label>
                                 <input type="email" class="form-control" name="email" id="pemail" placeholder="Enter Email" required>
                              </div>
                              <div class="form-group"align="left">
                                 <label for="messages">Messages:</label>
                                 <input type="text" class="form-control" name="messages" id="pmessage" placeholder="Enter Messages" required>
                              </div>
                              <div class="form-group"align="left">
                                 <label for="messages">Date:</label>
                                 <input type="date" class="form-control" name="messages" id="pdate" placeholder="Enter Date" required>
                              </div>
                              <button type="submit" class="btn-success" style="float: right;" id="save">Submit</button>
                           </fieldset>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--body for pagination button-->
   </body>
   <script>
      $('#save').click(function(evt){
            evt.preventDefault();
             var name=$('#pname').val();
             var email=$('#pemail').val();
             
             var message=$('#pmessage').val();
             var date=$('#pdate').val();
      if(name == ''){
        alert("name can't be blank");
        return false;
      }
      
      if(email == ''){
        alert("email can't be blank");
        return false;
      }
      var emailpattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if (!emailpattern.test(email)) {
        alert("please enter valid email");
        return false;
      }
      if (!message)
      { 
        alert("please fill message field");
       return false;
      }
      if(!date)
      { alert ("please enter date");
        return false;
      }
      
      
      
      else
      { 
        $.ajax({
              type: 'POST',
              url: 'insert.php',
              data: {
                      "name":name,
                      "email":email,
                      "date":date,
                      "messages":message
                      },
              success: function (response) {
          
       alert("data submitted ");
                        console.log(response);
                      }
                      
                  });
      
          //evt.preventDefault();
      $("#form")[0].reset();

      } 
      //alert(date);
           
         return true;
      
      });
   </script>
   

</html>