<div class="contentContainer" style="border: solid red">

<!-- -------------------------- ALERTS -------------------------- -->
    <!-- SUCCESS: TEACHER REGISTER -->
    <?php if(isset($_SESSION['teacherRegister']) && $_SESSION['teacherRegister'] == 'complete') {
        $_SESSION['message'] = 'Profesor, registrado correctamente.';
        $_SESSION['message_type'] = 'success';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END SUCCESS: TEACHER REGISTER -->

    <!-- ERROR: TEACHER REGISTER -->
    <?php if(isset($_SESSION['teacherRegister']) && $_SESSION['teacherRegister'] == 'failed') {
        $_SESSION['message'] = 'Error. El profesor no se registró en la basa de datos';
        $_SESSION['message_type'] = 'danger';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END ERROR: TEACHER REGISTER -->

    <!-- SUCCESS: TEACHER UPDATE -->
    <?php if(isset($_SESSION['teacherUpdate']) && $_SESSION['teacherUpdate'] == 'complete') {
        $_SESSION['message_type'] = 'success';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END SUCCESS: TEACHER UPDATE -->

    <!-- ERROR: TEACHER UPDATE -->
    <?php if(isset($_SESSION['teacherUpdate']) && $_SESSION['teacherUpdate'] == 'failed') {
        $_SESSION['message_type'] = 'danger';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END ERROR: TEACHER UPDATE -->

    <!-- SUCCESS: TEACHER DELETE -->
    <?php if(isset($_SESSION['teacherDelete']) && $_SESSION['teacherDelete'] == 'complete') {
        $_SESSION['message_type'] = 'success';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END SUCCESS: TEACHER DELETE -->

    <!-- ERROR: TEACHER DELETE -->
    <?php if(isset($_SESSION['teacherDelete']) && $_SESSION['teacherDelete'] == 'failed') {
        $_SESSION['message_type'] = 'danger';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END ERROR: TEACHER DELETE -->

<!-- -------------------------- END ALERTS -------------------------- -->

<!-- -------------------------- MAIN VIEW -------------------------- -->
    <!-- TITTLE -->
    <h2>Gestión de maestros</h2>
    <!-- END TITTLE -->

    <!-- BUTTON ADD NEW TEACHER (MODAL) -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertTeacher">
        AÑADIR PROFESOR
    </button> <!-- END BUTTON ADD NEW TEACHER (MODAL) -->

    <!-- TEACHERS TABLE -->
    <?php $teachers = DAOTeacherImpl::getAll() ?>
    <table style="border: solid 1px" class="mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDOS</th>
                <th>TELÉFONO</th>
                <th>NIF</th>
                <th>EMAIL</th>
            </tr>
        </thead>
        <?php while( $teacher = mysqli_fetch_array($teachers) ) { ?>
        <tbody>
            <tr>
                <td> <?php echo $teacher['id_teacher'] ;?> </td>
                <td> <?php echo $teacher['name'] ;?> </td>
                <td> <?php echo $teacher['surname'] ;?> </td>
                <td> <?php echo $teacher['telephone'] ;?> </td>
                <td> <?php echo $teacher['nif'] ;?> </td>
                <td> <?php echo $teacher['email'] ;?> </td>

                <!-- CRUD BUTTONS -->
                <td>
                    <!-- BUTTON ADD NEW TEACHER (MODAL) -->
                    <button type="button" class="btn btn-primary" id="updateTeacher" data-toggle="modal" data-target="#btnUpdateTeacher"
                            data-id_teacher = "<?php echo $teacher['id_teacher'] ;?>"
                            data-name       = "<?php echo $teacher['name'] ;?>"
                            data-surname    = "<?php echo $teacher['surname'] ;?>"
                            data-telephone  = "<?php echo $teacher['telephone'] ;?>"
                            data-nif        = "<?php echo $teacher['nif'] ;?>"
                            data-email      = "<?php echo $teacher['email'] ;?>"
                            data-password   = "<?php echo $teacher['password'] ;?>">
                        Editar
                    </button> <!-- END BUTTON ADD NEW TEACHER (MODAL) -->

                    <!-- BUTTON DELETE TEACHER -->
                    <a href="<?=base_url?>/controllers/delete?id=<?php echo $teacher['id_teacher'];?>">
                        Eliminar
                    </a> <!-- END BUTTON DELETE TEACHER -->
                </td>

            </tr>
        </tbody>
        <?php } ?>
    </table> <!-- END TEACHERS TABLE -->
<!-- -------------------------- END MAIN VIEW -------------------------- -->

    <script>
        $(document).on("click", "#updateTeacher", function() {
            let id_teacher   = $(this).data('id_teacher');
            let name        = $(this).data('name');
            let surname     = $(this).data('surname');
            let telephone   = $(this).data('telephone');
            let nif         = $(this).data('nif');
            let email       = $(this).data('email');
            let password    = $(this).data('password');

            $("#id_teacher").val(id_teacher);
            $("#teacherName").val(name);
            $("#teacherSurname").val(surname);
            $("#teacherTelephone").val(telephone);
            $("#teacherNif").val(nif);
            $("#teacherEmail").val(email);
            $("#teacherPassword").val(password);
        })
    </script>

</div>

