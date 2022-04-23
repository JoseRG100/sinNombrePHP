<!-- MODAL CONTAINER -->
<div class="modal fade" id="updateStudent" tabindex="-1" role="dialog" aria-labelledby="updateStudent" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- MODAL HEADER -->
            <div class="modal-header">
                <h5 class="modal-title" id="updateStudent">Modificar perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> <!-- END MODAL HEADER -->

            <!-- MODAL BODY -->
            <div class="modal-body">
                <!-- FORM CONTAINER -->
                <?php $currentStudent = DAOStudentImpl::getOneToObject($_SESSION['student']->id);?>
                <form class="container-fluid" action="<?=base_url?>/student/update" method="POST">

                    <!-- ID INPUT -->
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" name="id" class="form-control" value="<?php echo $_SESSION['student']->id;?>" readonly>
                    </div>
                    <!-- USERNAME INPUT -->
                    <div class="form-group">
                        <label>USERNAME</label>
                        <input type="text" id="studentUsername" name="username" class="form-control" value="<?php echo $currentStudent->getUsername();?>">
                    </div>
                    <!-- EMAIL INPUT -->
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="studentEmail" name="email" class="form-control" value="<?php echo $currentStudent->getEmail();?>">
                    </div>
                    <!-- PASSWORD INPUT -->
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="studentPassword" name="password" class="form-control" value="<?php echo $currentStudent->getTelephone();?>">
                    </div>
                    <br>

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                        <input type="submit" class="btn btn-success btn-block" value="ACTUALIZAR">
                    </div> <!-- END MODAL FOOTER -->

                </form> <!-- END FORM CONTAINER -->
            </div> <!-- END MODAL BODY -->



        </div>
    </div>
</div>
<!-- END MODAL CONTAINER -->
