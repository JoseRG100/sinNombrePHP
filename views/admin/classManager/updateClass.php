<!-- MODAL CONTAINER -->
<div class="modal fade" id="btnUpdateTeacher" tabindex="-1" role="dialog" aria-labelledby="btnUpdateClass" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- MODAL HEADER -->
            <div class="modal-header">
                <h5 class="modal-title" id="btnUpdateClass">Añadir nueva clase</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> <!-- END MODAL HEADER -->

            <!-- MODAL BODY -->
            <div class="modal-body">
                <!-- FORM CONTAINER -->
                <form class="container-fluid" action="<?=base_url?>/class/update" method="POST">
                    <!-- ID -->
                    <div class="form-group">
                        <label><ID_CLASS></label>
                        <input type="text" id="id_class" name="id_class" readonly>
                    </div>
                    <!-- NAME INPUT -->
                    <div class="form-group">
                        <label>ID_TEACHER</label>
                        <input type="text" id="id_teacher" name="id_teacher" class="form-control"  autofocus>
                    </div>
                    <!-- SURNAME INPUT -->
                    <div class="form-group">
                        <label>ID_COURSE</label>
                        <input type="text" id="id_course" name="id_course" class="form-control" >
                    </div>
                    <!-- TELEPHONE INPUT -->
                    <div class="form-group">
                        <label>NAME</label>
                        <input type="text" id="name" name="name" class="form-control" >
                    </div>
                    <!-- NIF INPUT -->
                    <div class="form-group">
                        <label>COLOR</label>
                        <input type="text" id="color" name="color" class="form-control" ">
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