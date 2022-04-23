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
    <div class="container pb-4">
        <div class="row">

            <!-- FORM CONTAINER -->
            <?php $currentStudent = DAOStudentImpl::getOneToObject($_SESSION['student']->id);?>
            <form id="perfil" action="<?=base_url?>/student/update" method="POST">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >

                    <!-- PANEL -->
                    <div class="panel panel-success"><br>
                        <!-- PANEL-TITTLE -->
                        <h2 class="panel-title"><center><font size="5"><i class='glyphicon glyphicon-user'></i>GESTIÓN DE USUARIO</font></center></h2>
                        <!-- END PANEL-TITTLE -->

                        <!-- PANEL-BODY -->
                        <div class="panel-body">
                            <div class="row">

                                <!-- FORM-IMG -->
                                <div class="col-md-3 col-lg-3 " align="center">

                                    <div id="load_img">
                                        <img class="img-responsive" style="max-width: 300px" src="<?=base_url?>/assets/img/userIcon.png" alt="Logo">
                                    </div>

                                    <br>

                                    <!--
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class='filestyle' data-buttonText="Logo" type="file" name="imagefile" id="imagefile" onchange="upload_image();">
                                            </div>
                                        </div>
                                    </div> -->

                                </div> <!-- END FORM-IMG -->

                                <!-- FORM-TABLE -->
                                <div class=" col-md-9 col-lg-9 ">
                                    <table class="table table-condensed">
                                        <tbody>
                                        <!-- ID INPUT -->
                                        <div class="form-group">
                                            <td class='col-md-3'>ID:</td>
                                            <td><input type="text" class="form-control input-sm" name="id"
                                                       value="<?php echo $_SESSION['student']->id;?>" readonly>
                                            </td>
                                        </div> <!-- END ID INPUT -->
                                        <!-- USERNAME INPUT -->
                                        <tr>
                                            <td>Username:</td>
                                            <td><input type="text" class="form-control input-sm" name="username"
                                                       value="<?php echo $currentStudent->getUsername();?>" required>
                                            </td>
                                        </tr> <!-- END USERNAME -->
                                        <!-- PASSWORD -->
                                        <tr>
                                            <td>Password:</td>
                                            <td><input type="password" class="form-control input-sm" name="password"
                                                       value="<?php echo $currentStudent->getTelephone();?>" required>
                                            </td>
                                        </tr> <!-- END PASSWORD -->
                                        <!-- EMAIL -->
                                        <tr>
                                            <td>Correo electrónico:</td>
                                            <td><input type="email" class="form-control input-sm" name="email"
                                                       value="<?php echo $currentStudent->getEmail();?>" required>
                                            </td>
                                        </tr> <!-- END EMAIL -->
                                        <!-- NAME -->
                                        <tr>
                                            <td>Nombres:</td>
                                            <td><input type="text" class="form-control input-sm" name="name"
                                                       value="<?php echo $currentStudent->getName();?>" required>
                                            </td>
                                        </tr> <!-- END NAME -->
                                        <!-- LASTNAME -->
                                        <tr>
                                            <td>Apellidos:</td>
                                            <td><input type="text" class="form-control input-sm" name="surname"
                                                       value="<?php echo $currentStudent->getSurname();?>" required>
                                            </td>
                                        </tr> <!-- END LASTNAME -->
                                        <!-- TELEPHONE -->
                                        <tr>
                                            <td>Telefono:</td>
                                            <td><input type="text" class="form-control input-sm" name="telephone"
                                                       value="<?php echo $currentStudent->getTelephone();?>" required>
                                            </td>
                                        </tr> <!-- END TELEPHONE -->
                                        <!-- NIF -->
                                        <tr>
                                            <td>NIF:</td>
                                            <td><input type="text" class="form-control input-sm" name="nif"
                                                       value="<?php echo $currentStudent->getNif();?>" required>
                                            </td>
                                        </tr> <!-- END NIF -->
                                        <!-- DATE_REGISTERED -->
                                        <tr>
                                            <td>Fecha de registro:</td>
                                            <td><input type="date" class="form-control input-sm" name="date_registered"
                                                       value="<?php echo $currentStudent->getDateRegistered();?>" readonly>
                                            </td>
                                        </tr> <!-- END DATE_REGISTERED -->

                                        </tbody>
                                    </table>
                                </div> <!-- END FORM-TABLE -->

                            </div> <!-- END ROW -->
                        </div> <!-- END PANEL-BODY -->

                        <!-- FORM SUBMIT-BUTTON -->
                        <div class="panel-footer text-center">
                            <button type="submit" class="btn btn-success btn-block"><i class="glyphicon glyphicon-refresh"></i> Actualizar perfil</button>
                        </div> <!-- END FORM SUBMIT-BUTTON -->

                    </div>
                </div> <!-- END PANEL -->
            </form> <!-- FORM CONTAINER -->

        </div>
    </div>

    <!-- END USER MANAGER -->
    <!-- -------------------------- END MAIN VIEW -------------------------- -->



</div>

