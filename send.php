<?php
	// Authorisation details.
    if(isset($_POST['save'])){
        $username = "gemmalyncuilan@gmail.com";
        $hash = "9181408c71a82c797c00ac4e32c863ad595f0aa45953504f98a745d9c0e0d2f9";
    
        // Config variables. Consult http://api.txtlocal.com/docs for more info.
        $test = "0";
    
        // Data for text message. This is the text message data.
        $sender = $_POST['sender']; // This is who the message appears to be from.
        $numbers = $_POST['number']; // A single number or a comma-seperated list of numbers
        $message = $_POST['message'];
        // 612 chars or less
        // A single number or a comma-seperated list of numbers
        $message = urlencode($message);
        $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
        $ch = curl_init('https://api.txtlocal.com/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API
        curl_close($ch);
    }

?>
                   <div class="modal fade" id="sendmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Send Message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="donor.php" method="POST">

                        <div class="modal-body">
                        <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Username:</label>
                                <input type="text" class="form-control" name="uername">
                            </div>
                        <form>
                        <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Username:</label>
                                <input type="text" class="form-control" name="skirt">
                            </div>
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" name="number">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" name="message"></textarea>
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name = "save" >Send message</button>
                            </div>
                        </div>
                    </div>
                </div>
                       
               