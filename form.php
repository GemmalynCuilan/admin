<?php
@session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');
include('includes/scripts.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
         
     <title>Document</title>
</head>
<body> 
<div class="container-fluid">
   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary"> Add donor </h3>
        </div>
        <div class="card-body">
        <div style="height: 400px; overflow-y: auto;">
			<table id="example" class="table table-striped table-bordered">
                        <form action="save_user.php" method="POST">
                        <div class="form-group">
						<form method="POST" class="row" id="form-group">
						<label>Name</label>  
                              <input type="text" id="searchField" class="form-control" placeholder="Enter Name" />  
                              <input type="hidden"  name="donor_id" id="donor_id">
                              <div id="donorList">
                              </div> 
                         </div>     
                         <div class="form-group">
                         <label for="message-text" class="col-form-label">Comment:</label>
                         <textarea class="form-control" id="" name="comment" required></textarea>
                         </div>
                    </div>
                    <div class="modal-footer">
                    <a href="task.php" class="btn btn-secondary"> Cancel </a>
                    <button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                    </div>
                    </form>
               
                    </div>
               </div>
               </div>

               </div>
               </div>       
               </table>
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
               <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
               <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
               <script>  
               $(document).ready(function(){  
                    $('#lastname').keyup(function(){  
                         var query = $(this).val();  
                         if(query != '')  
                         {  
                              $.ajax({  
                                   url:"search.php",  
                                   method:"POST",  
                                   data:{query:query},  
                                   success:function(data)  
                                   {  
                                        $('#lastnameList').html(data);  
                                   }  
                              });  
                         }  
                    });  
                    $(document).on('click', 'li', function(){  
                         $('#lastname').val($(this).text());  
                         $('#lastnameList').fadeOut();  
                    });  
               });  
          </script> 

          <script>  
          $(document).ready(function(){  
               $('#searchField').keyup(function(){  
                    var query = $(this).val();  
                    if(query != '')  
                    {  
                         $.ajax({  
                              url:"search.php",  
                              method:"POST",  
                              data:{query:query},  
                              success:function(data)  
                              {  
                                   $('#donorList').fadeIn();  
                                   $('#donorList').html(data);  
                                   $('#donor_id').val('');  
                              }  
                         });  
                    }  
               });  
               $(document).on('click', 'li', function(){  
                    $('#searchField').val($(this).text());  
                    $('#donor_id').val($(this).data('id'));  
                    $('#donorList').fadeOut();  
               });  
          });  
          </script> 
      <script>
	$(".multiple-select").select2({
  	//maximumSelectionLength: 2
	});
</script>
</body>
</html>