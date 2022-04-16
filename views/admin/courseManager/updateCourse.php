<!-- MODAL CONTAINER -->
<div class="modal fade" id="btnUpdateCourse" tabindex="-1" role="dialog" aria-labelledby="btnUpdateCourse" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- MODAL HEADER -->
            <div class="modal-header">
                <h5 class="modal-title" id="btnUpdateTeacher">Añadir nueva asignatura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> <!-- END MODAL HEADER -->

            <!-- MODAL BODY -->
            <div class="modal-body">
                <!-- FORM CONTAINER -->
                <form class="container-fluid" action="<?=base_url?>/course/update" method="POST">
                    <!-- ID -->
                    <div class="form-group">
                        <label>ID: </label>
                        <input type="text" id="id_course" name="id_course" readonly>
                    </div>
                    <!-- NAME INPUT -->
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" id="courseName" name="name" class="form-control"  autofocus>
                    </div>
                    <!-- SURNAME INPUT -->
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" id="courseDescription" name="descripcion" class="form-control" >
                    </div>
                    <!-- TELEPHONE INPUT -->
                    <div class="form-group">
                        <label>date_start</label>
                        <input type="date" id="courseDate_start" name="date_start" class="form-control" >
                    </div>
                    <!-- NIF INPUT -->
                    <div class="date_end">
                        <label>NIF</label>
                        <input type="date" id="courseDate_end" name="date_end" class="form-control" >
                    </div>
                    <!-- EMAIL INPUT -->
                    <div class="form-group">
                        <label>active</label>
                        <input type="number" id="courseActive" name="active" class="form-control" >
                    </div>
                    <!-- PASSWORD INPUT -->

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