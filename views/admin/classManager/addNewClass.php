<!-- MODAL CONTAINER -->
<div class="modal fade" id="insertClass" tabindex="-1" role="dialog" aria-labelledby="insertClass" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- MODAL HEADER -->
            <div class="modal-header">
                <h5 class="modal-title" id="insertClass">Añadir nueva clase</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> <!-- END MODAL HEADER -->

            <!-- MODAL BODY -->
            <div class="modal-body">
                <!-- FORM CONTAINER -->
                <form class="container-fluid" action="<?=base_url?>/class/register" method="POST">
                    <!-- NAME INPUT -->
                    <div class="form-group">
                        <label>id_teacher</label>
                        <input type="number" name="id_teacher" class="form-control"  autofocus>
                    </div>
                    <!-- SURNAME INPUT -->
                    <div class="form-group">
                        <label>id_course</label>
                        <input type="number" name="id_course" class="form-control" >
                    </div>
                    <!-- TELEPHONE INPUT -->
                    <div class="form-group">
                        <label>id_schedule</label>
                        <input type="number" name="id_schedule" class="form-control" >
                    </div>
                    <!-- NIF INPUT -->
                    <div class="form-group">
                        <label>name</label>
                        <input type="text" name="name" class="form-control" >
                    </div>
                    <!-- EMAIL INPUT -->
                    <div class="form-group">
                        <label>color</label>
                        <input type="text"name="color" class="form-control" >
                    </div>
                    <!-- PASSWORD INPUT -->

                    <br>

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <input type="submit" class="btn btn-success btn-block" value="CREAR CLASE">
                    </div> <!-- END MODAL FOOTER -->

                </form> <!-- END FORM CONTAINER -->
            </div> <!-- END MODAL BODY -->



        </div>
    </div>
</div>
<!-- END MODAL CONTAINER -->