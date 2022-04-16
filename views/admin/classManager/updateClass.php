<!-- MODAL CONTAINER -->
<div class="modal fade" id="btnUpdateTeacher" tabindex="-1" role="dialog" aria-labelledby="btnUpdateClass" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- MODAL HEADER -->
            <div class="modal-header">
                <h5 class="modal-title" id="btnUpdateTeacher">Añadir nuevo profesor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> <!-- END MODAL HEADER -->

            <!-- MODAL BODY -->
            <div class="modal-body">
                <!-- FORM CONTAINER -->
                <form class="container-fluid" action="<?=base_url?>/teacher/update" method="POST">
                    <!-- ID -->
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" id="id_teacher" name="id_teacher" readonly>
                    </div>
                    <!-- NAME INPUT -->
                    <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" id="teacherName" name="name" class="form-control" placeholder="Ingrese nombre" autofocus>
                    </div>
                    <!-- SURNAME INPUT -->
                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" id="teacherSurname" name="surname" class="form-control" placeholder="Ingrese apellidos">
                    </div>
                    <!-- TELEPHONE INPUT -->
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" id="teacherTelephone" name="telephone" class="form-control" placeholder="Ingrese teléfono">
                    </div>
                    <!-- NIF INPUT -->
                    <div class="form-group">
                        <label>NIF</label>
                        <input type="text" id="teacherNif" name="nif" class="form-control" placeholder="Ingrese NIF">
                    </div>
                    <!-- EMAIL INPUT -->
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="teacherEmail" name="email" class="form-control" placeholder="Ingrese email">
                    </div>
                    <!-- PASSWORD INPUT -->
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="teacherPassword" name="password" class="form-control" placeholder="Password" readonly>
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