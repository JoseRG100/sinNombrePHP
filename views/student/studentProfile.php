<div class="contentContainer" style="border: solid red">

    <!-- -------------------------- ALERTS -------------------------- -->

    <!-- SUCCESS: STUDENT UPDATE -->
    <?php if(isset($_SESSION['studentUpdate']) && $_SESSION['studentUpdate'] == 'complete') {
        $_SESSION['message_type'] = 'success';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END SUCCESS: TEACHER UPDATE -->

    <!-- ERROR: STUDENT UPDATE -->
    <?php if(isset($_SESSION['studentUpdate']) && $_SESSION['studentUpdate'] == 'failed') {
        $_SESSION['message_type'] = 'danger';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END ERROR: STUDENT UPDATE -->

    <!-- -------------------------- END ALERTS -------------------------- -->

    <!-- -------------------------- MAIN VIEW -------------------------- -->

    <!-- USER MANAGER -->
    <div class="container">
        <div class="row">
            <form method="post" id="perfil">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >

                    <div class="panel panel-success"><br>
                        <h2 class="panel-title"><center><font size="5"><i class='glyphicon glyphicon-user'></i>GESTIÓN DE USUARIO</font></center></h2>

                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-3 col-lg-3 " align="center">
                                    <div id="load_img">
                                        <img class="img-responsive" src="" alt="Logo">

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class='filestyle' data-buttonText="Logo" type="file" name="imagefile" id="imagefile" onchange="upload_image();">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class=" col-md-9 col-lg-9 ">
                                    <table class="table table-condensed">
                                        <tbody>
                                        <!-- USERNAME -->
                                        <tr>
                                            <td class='col-md-3'>Username:</td>
                                            <td><input type="text" class="form-control input-sm" name="nombre_apellido" value="" required></td>
                                        </tr> <!-- END USERNAME -->
                                        <!-- PASSWORD -->
                                        <tr>
                                            <td>Password:</td>
                                            <td><input type="text" class="form-control input-sm" name="ocupacion" value="" required></td>
                                        </tr> <!-- END PASSWORD -->
                                        <!-- EMAIL -->
                                        <tr>
                                            <td>Correo electrónico:</td>
                                            <td><input type="email" class="form-control input-sm" name="correo" value="" ></td>
                                        </tr> <!-- END EMAIL -->
                                        <!-- NAME -->
                                        <tr>
                                            <td>Nombres:</td>
                                            <td><input type="text" class="form-control input-sm" required name="telefono" value=""></td>
                                        </tr> <!-- END NAME -->
                                        <!-- LASTNAME -->
                                        <tr>
                                            <td>Apellidos:</td>
                                            <td><input type="text" class="form-control input-sm" required name="salario" value=""></td>
                                        </tr> <!-- END LASTNAME -->
                                        <!-- TELEPHONE -->
                                        <tr>
                                            <td>Telefono:</td>
                                            <td><input type="text" class="form-control input-sm" name="idioma" value="" required></td>
                                        </tr> <!-- END TELEPHONE -->
                                        <!-- NIF -->
                                        <tr>
                                            <td>NIF:</td>
                                            <td><input type="text" class="form-control input-sm" name="ciudad" value="" required></td>
                                        </tr> <!-- END NIF -->

                                        </tbody>
                                    </table>

                                </div>
                                <div class='col-md-12' id="resultados_ajax"></div><!-- Carga los datos ajax -->
                            </div>
                        </div>
                        <div class="panel-footer text-center">


                            <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-refresh"></i> Actualizar hoja de vida</button>



                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>



    <!-- END USER MANAGER -->


    <!-- USER TABLE -->
    <table style="border: solid 1px" class="mt-2">
        <thead>
        <tr>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>CONTRASEÑA</th>


        </tr>
        </thead>

            <tbody>
            <tr>

                <td> <?php echo $_SESSION['student']->username;?> </td>
                <td> <?php echo $_SESSION['student']->email;?> </td>
                <td> <?php echo $_SESSION['student']->password;?> </td>


                <!-- CRUD BUTTONS -->
                <td>
                    <!-- BUTTON UPDATE STUDENT (MODAL) -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateStudent">


                        Editar
                    </button> <!-- END BUTTON UPDATE STUDENT (MODAL) -->

                </td> <!-- END CRUD BUTTONS -->

            </tr>
            </tbody>

    </table> <!-- END TEACHERS TABLE -->
    <!-- -------------------------- END MAIN VIEW -------------------------- -->



</div>

