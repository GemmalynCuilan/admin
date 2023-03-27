<div class="modal fade" id="update_modal<?php echo $row['id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="updatecode.php">
				<div class="modal-header">
					<h3 class="modal-title">Update</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label>Lastname</label>
							<input type="hidden" name="id" value="<?php echo $row['id']?>"/>
							<input type="text" name="lastname" value="<?php echo $row['lastname']?>" class="form-control" required="required"/>
						</div>
						<div class="form-group">
							<label>Firstname</label>
							<input type="text" name="firstname" value="<?php echo $row['firstname']?>" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Date</label>
							<input type="date" name="date" value="<?php echo $row['date']?>" class="form-control" required="required"/>
						</div>
						<div class="form-group">
							<label>Location</label>
							<input type="text" name="location" value="<?php echo $row['location']?>" class="form-control" required="required"/>
						</div>
						<div class="form-group">
						<label for="message-text" class="col-form-label">Comment:</label>
						<textarea class="form-control" id="" value="<?php echo $row['comment']?>"name="comment"required></textarea>
					</div>
				
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					<button name="updatebtn" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Update</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>