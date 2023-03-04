<?php
@session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');
include('includes/scripts.php');
?>
<?php require 'archive.php'?>
 <!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- CSS for full calender -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
<!-- JS for jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- JS for full calender -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<!-- bootstrap css and js -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</style>
    <script>$(document).ready(function () {
        $('#example').DataTable();
    });
    </script>
</head>
<body>

<div style="height: 500px; overflow-y: auto;">
			<table id="example" class="table table-striped table-bordered">
  <div class="row">
		<div class="col-lg-12">
			<h5 align="center">ANNOUNCEMENT</h5>
			<div id="calendar"></div>
		</div>
	</div>
</div>
<!-- Start popup dialog box -->
<div class="modal fade" id="event_entry_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabel">Add New Event</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="img-container">
					<div class="row">
						<div class="col-sm-12">  
							<div class="form-group">
							  <label for="event_name">Event name</label>
							  <input type="text" name="event_name" id="event_name" class="form-control" placeholder="Enter your event name">
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-sm-12">  
							<div class="form-group">
							  <label for="event_description">Event description</label>
							  <input type="text" name="event_description" id="event_description" class="form-control" placeholder="Enter your event description">
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-sm-12">  
							<div class="form-group">
							  <label for="event_venue">Event venue</label>
							  <input type="text" name="event_venue" id="event_venue" class="form-control" placeholder="Enter your event venue">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">  
							<div class="form-group">
							  <label for="event_start_date">Event start</label>
							  <input type="date" name="event_start_date" id="event_start_date" class="form-control onlydatepicker" placeholder="Event start date">
							 </div>
						</div>
						<div class="col-sm-6">  
							<div class="form-group">
							  <label for="event_end_date">Event end</label>
							  <input type="date" name="event_end_date" id="event_end_date" class="form-control" placeholder="Event end date">
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-sm-12">  
							<div class="form-group">
							  <label for="event_name">Event time</label>
							  <input type="time" name="event_time" id="event_time" class="form-control" placeholder="Enter your event time">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="save_event()">Save Event</button>
			</div>
		</div>
	</div>
</div>
<!-- End popup dialog box -->

<script>
$(document).ready(function() {
	display_events();
}); //end document.ready block

function display_events() {
	var events = new Array();
$.ajax({
    url: 'display_event.php',  
    dataType: 'json',
    success: function (response) {
         
    var result=response.data;
    $.each(result, function (i, item) {
    	events.push({
            event_id: result[i].event_id,
            title: result[i].title,
            description: result[i].description,
            venue: result[i].venue,
            start: result[i].start,
            end: result[i].end,
            color: result[i].color,
            time: result[i].time
        }); 	
    })
	var calendar = $('#calendar').fullCalendar({
	    defaultView: 'month',
		 timeZone: 'local',
	    editable: true,
        selectable: true,
		selectHelper: true,
        select: function(start, end) {
				alert(start);
				alert(end);
				$('#event_start_date').val(moment(start).format('YYYY-MM-DD'));
				$('#event_end_date').val(moment(end).format('YYYY-MM-DD'));
				$('#event_entry_modal').modal('show');
			},
        events: events,
	    eventRender: function(event, element, view) { 
            element.bind('click', function() {
					alert(event.event_id);
				});
    	}
		}); //end fullCalendar block	
	  },//end success block
	  error: function (xhr, status) {
	  alert(response.msg);
	  }
	});//end ajax block	
}

function save_event()
{
var event_name=$("#event_name").val();
var event_description=$("#event_description").val();
var event_venue=$("#event_venue").val();
var event_start_date=$("#event_start_date").val();
var event_end_date=$("#event_end_date").val();
var event_time=$("#event_time").val();
if(event_name=="" || event_description=="" || event_venue=="" || event_start_date=="" || event_end_date=="" || event_time=="")
{
alert("Please enter all required details.");
return false;
}
$.ajax({
 url:"save_event.php",
 type:"POST",
 dataType: 'json',
 data: {event_name:event_name,event_description:event_description,event_venue:event_venue,event_start_date:event_start_date,event_end_date:event_end_date,event_time:event_time},
 success:function(response){
   $('#event_entry_modal').modal('hide');  
   if(response.status == true)
   {
	alert(response.msg);
	location.reload();
   }
   else
   {
	 alert(response.msg);
   }
  },
  error: function (xhr, status) {
  console.log('ajax error = ' + xhr.statusText);
  alert(response.msg);
  }
});    
return false;
}
</script>
</html> 
</div>
</div>
						<?php
                            $query = "SELECT * FROM event";
                            $query_run = mysqli_query($connection, $query);
                          ?>
               
               <div style=" width: 400px; overflow-y: auto;">
               <table id="example" class="table table-hover table-light">
                    <thead>
                    <tr>
                    <td style="display:none;"> ID </th>
                            <th> Title </th>
                            <th> Description </th>
                            <th> Venue </th>
                            <th> Start </th>
                            <th> End </th>
                            <th> Time </th>
                          
                        </tr>
                        </thead>
                    <tbody>
                    <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                         <td style="display:none;"><?php  echo $row['event_id']; ?></td>
                                <td><?php  echo $row['event_name']; ?></td>
                                <td><?php  echo $row['event_description']; ?></td>
                                <td><?php  echo $row['event_venue']; ?></td>
                                <td><?php  echo $row['event_start_date']; ?></td>
                                <td><?php  echo $row['event_end_date']; ?></td>
                                <td><?php  echo $row['event_time']; ?></td>
								<td style="text-align" horizontal:align>
                                    <form action = "edit_an.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['event_id']; ?>">
                                    <button type = "submit" name="edit_btn" class ="btn btn-warning btn-m"> <i class="fa fa-pencil-square-o"></i>&nbsp;</button>
                                    </form>
                                
                                    </td>
							</td>  
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
					   <!-- DELETE POP UP FORM  -->
					   <div class="modal fade" id="deletedmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Delete </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="delete.php" method="POST">

                            <div class="modal-body">

                                <input type="hidden" name="deletedid" id="deletedid">

                                <h4> Do you want to delete this data?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                                <button type="submit" name="deletedbtn" class="btn btn-success"> YES </button>
                            </div>
                        </form>

                    </div>
                </div>
                </table>
				<!-- /.container-fluid -->
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
					</div>
					</div>
					<script>
        $(document).ready(function () {

            $('.deletedbtn').on('click', function () {

                $('#deletedmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#deletedid').val(data[0]);

            });
        });
    </script>
