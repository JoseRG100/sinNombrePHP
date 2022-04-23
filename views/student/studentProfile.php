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
    <!-- TITTLE -->
    <h2>Gestión de usuario</h2>
    <!-- END TITTLE -->

    <!-- USER MANAGER -->

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

