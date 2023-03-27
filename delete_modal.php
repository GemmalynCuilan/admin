 <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
 <div class="modal fade" id="deletemodal<?php echo $row['id']?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Delete </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST" action="delete.php">

                                    <div class="modal-body">

                                    <input type="hidden" name="id" value="<?php echo $row['id']?>"/>

                                        <h4> Do you want to Delete this Data ??</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                                        <button type="submit" name="deletebtn" class="btn btn-primary"> YES</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                     <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
 <div class="modal fade" id="deletesmodal<?php echo $row['id']?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Delete </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST" action="delete.php">

                                    <div class="modal-body">

                                    <input type="hidden" name="id" value="<?php echo $row['id']?>"/>

                                        <h4> Do you want to Delete this Data ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                                        <button type="submit" name="delete" class="btn btn-primary"> YES</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
         <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
            <div class="modal fade" id="delmodal<?php echo $row['id']?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Delete </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST" action="delete.php">

                                    <div class="modal-body">

                                    <input type="hidden" name="id" value="<?php echo $row['id']?>"/>

                                        <h4> Do you want to Delete this Data ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                                        <button type="submit" name="del" class="btn btn-primary"> YES</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
            <div class="modal fade" id="deletedmodal<?php echo $row['id']?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Delete </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST" action="view_data.php">

                                    <div class="modal-body">

                                    <input type="hidden" name="id" value="<?php echo $row['id']?>"/>

                                        <h4> Do you want to Delete this Data ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                                        <button type="submit" name="delete_btn" class="btn btn-primary"> YES</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>