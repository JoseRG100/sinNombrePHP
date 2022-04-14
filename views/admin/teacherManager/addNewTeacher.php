<!-- MODAL CONTAINER -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- MODAL HEADER -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo profesor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> <!-- END MODAL HEADER -->

            <!-- MODAL BODY -->
            <div class="modal-body">
                <!-- FORM CONTAINER -->
                <form class="container-fluid" action="<?=base_url?>/teacher/register" method="POST">
                    <!-- NAME INPUT -->
                    <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" name="name" class="form-control" placeholder="Ingrese nombre" autofocus>
                    </div>
                    <!-- SURNAME INPUT -->
                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" name="surname" class="form-control" placeholder="Ingrese apellidos">
                    </div>
                    <!-- TELEPHONE INPUT -->
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" name="telephone" class="form-control" placeholder="Ingrese teléfono">
                    </div>
                    <!-- NIF INPUT -->
                    <div class="form-group">
                        <label>NIF</label>
                        <input type="text" name="nif" class="form-control" placeholder="Ingrese NIF">
                    </div>
                    <!-- EMAIL INPUT -->
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"name="email" class="form-control" placeholder="Ingrese email">
                    </div>
                    <!-- PASSWORD INPUT -->
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <br>

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <input type="submit" class="btn btn-success btn-block" value="CREAR PROFESOR">
                    </div> <!-- END MODAL FOOTER -->

                </form> <!-- END FORM CONTAINER -->
            </div> <!-- END MODAL BODY -->



        </div>
    </div>
</div>
<!-- END MODAL CONTAINER -->