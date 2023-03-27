 <!-- VIEW POP UP FORM (Bootstrap MODAL) -->
 <div class="modal fade" id="viewmodal<?php echo $row['id']?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> View Medical History </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST" action="delete.php">

                                    <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $row['id']?>"/>

                                    <p><b>History of previous donation</b><input type="text" id="previous" value="<?php echo $row['previous']?>"style="border: none;" readonly></p>
                                    <p><b>No. of times</b><input type="text" id="numtimes"value="<?php echo $row['numtimes']?>" style="border: none;" readonly></p>
                                    <p><b>Date of last donation</b><input type="text" id="age"value="<?php echo $row['lastdate']?>" style="border: none;" readonly></p>
                                    <p><b>Place of last donation</b><input type="text" id="age"value="<?php echo $row['place']?>" style="border: none;" readonly></p>
                                    <p><b>Cancer, blood disease or bleeding disorder(haemophilia)?</b><input type="text" id="age"value="<?php echo $row['group1']?>" style="border: none;" readonly></p>
                                    <p><b>Heart disease/surgery, rheumatic fever or chest pains?</b><input type="text" id="age"value="<?php echo $row['group2']?>" style="border: none;" readonly></p>
                                    <p><b>Lung disease, tuberculosis or asthma?</b><input type="text" id="age"value="<?php echo $row['group3']?>" style="border: none;"readonly></p>
                                    <p><b>Kidney disease, thyroid disease, diabetes, epilepsy?</b><input type="text" id="age"value="<?php echo $row['group4']?>" style="border: none;" readonly></p>
                                    <p><b>Chicken pox and/or cold sores?</b><input type="text" id="age"value="<?php echo $row['group5']?>" style="border: none;" readonly></p>
                                    <p><b>Had a positive test for the HIV virus, Hepatitis virus, Syphilis or Malaria?</b><input type="text" id="age"value="<?php echo $row['group6']?>" style="border: none;" readonly></p>
                                    <p><b>Have Malaria or Hepatitis in the past?</b><input type="text" id="age"value="<?php echo $row['group7']?>" style="border: none;"  readonly></p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>