<div class="modal fade" id="rel_modal<?php echo $row['id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="save_user.php">
				<div class="modal-header">
					<h3 class="modal-title">Released out</h3>
				</div>
				<div class="modal-body">
                <div class="form-group">
                                <label>Full Name</label>
                                <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
                                <input type="text" readonly name="lastname" value="<?php echo $row['lname'].', '.$row['fname']?>" class="form-control" required="required"/>
                </div>
                <div class="form-group">
                                <label>Blood Type/Group</label>
                                <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
                                <input type="text" readonly name="bgroup"value="<?php echo $row['bgroup']?>" class="form-control" required="required"/>
                </div>
                <div class="form-group">
                <label>Serial Number</label>
                <input type="text" name="sernum" class="form-control" placeholder="Enter serial number"required>
            </div>
                <div class="form-group">
                            <label for="" class="control-label">Blood Component</label>
                            <select name="bcomponent" id="bcomponent" class="custom-select select2" required>
                            <option value = "">Select blood component</option>    
                            <option value = "platelet">Platelet</option>
                                <option value = "rbc">RBC</option>
                                <option value = "wbc">WBC</option>
                                <option value = "plasma">Plasma</option>
                                <option value = "redblood">Red blood</option>
                            </select>
                             </div>
            <div class="form-group">
                <label>Name of patient</label>
                <input type="text" name="patient_name" class="form-control" placeholder="Enter name of patient"required>
            </div>
            <div class="form-group">
                <label> Date extracted </label>
                <input type="date" name="ex_date" class="form-control" placeholder="Enter date extracted"required>
            </div>
            <div class="form-group">
                <label> Expiration of blood </label>
                <input type="date" name="expdate" class="form-control" placeholder="Enter expiration of blood"required>
            </div>
            <div class="form-group">
            <label for="message-text" class="col-form-label">Comment:</label>
            <textarea class="form-control" id="comment_rel" name="comment_rel"required></textarea>
          </div>
        </div>
        <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
         <button name="insert" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
        </div>
      </form>
		</div>
	</div>
</div>