<div class="modal fade" id="update_modal<?php echo $row['id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="updatecode.php">
				<div class="modal-header">
					<h3 class="modal-title">Update Task Details</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label>Full Name</label>
							<input type="hidden" name="id" value="<?php echo $row['id']?>"/>
							<input type="text" readonly name="lastname" value="<?php echo $row['lname'].' '.$row['fname']?>" class="form-control" required="required"/>
						</div>
						<div class="form-group">
							<label>Date Created</label>
							<input value="<?php echo $row['created_at']?>" class="form-control" readonly/>
						</div>
						<div class="form-group">
							<label>Status</label>
							<input value="<?php echo $row['status']?>" class="form-control" readonly/>
						</div>
						<div class="form-group">
						<label for="message-text" class="col-form-label">Comment:</label>
						<textarea class="form-control" id="" name="comment"required><?php echo $row['comment']?></textarea>
					</div>
					
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					<button name="update" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Update</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>