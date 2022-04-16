<div class="contentContainer" style="border: solid red">

    <!-- -------------------------- ALERTS -------------------------- -->
    <!-- SUCCESS: CLASS  REGISTER -->
    <?php if(isset($_SESSION['classRegister']) && $_SESSION['classRegister'] == 'complete') {
        $_SESSION['message_type'] = 'success';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END SUCCESS: CLASS REGISTER -->

    <!-- ERROR: CLASS REGISTER -->
    <?php if(isset($_SESSION['classRegister']) && $_SESSION['classRegister'] == 'failed') {
        $_SESSION['message_type'] = 'danger';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END ERROR: TEACHER REGISTER -->

    <!-- SUCCESS: CLASS UPDATE -->
    <?php if(isset($_SESSION['classUpdate']) && $_SESSION['classUpdate'] == 'complete') {
        $_SESSION['message_type'] = 'success';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END SUCCESS: CLASS UPDATE -->

    <!-- ERROR: CLASS UPDATE -->
    <?php if(isset($_SESSION['classUpdate']) && $_SESSION['classUpdate'] == 'failed') {
        $_SESSION['message_type'] = 'danger';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END ERROR: CLASS UPDATE -->

    <!-- SUCCESS: CLASS DELETE -->
    <?php if(isset($_SESSION['classDelete']) && $_SESSION['classDelete'] == 'complete') {
        $_SESSION['message_type'] = 'success';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END SUCCESS: CLASS DELETE -->

    <!-- ERROR: CLASS DELETE -->
    <?php if(isset($_SESSION['classDelete']) && $_SESSION['classDelete'] == 'failed') {
        $_SESSION['message_type'] = 'danger';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END ERROR: CLASS DELETE -->

    <!-- -------------------------- END ALERTS -------------------------- -->

    <!-- -------------------------- MAIN VIEW -------------------------- -->
    <!-- TITTLE -->
<h1>Gestionar clases</h1>

<!-- BUTTON ADD NEW CLASS (MODAL) -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertClass">
    AÑADIR CLASE
</button> <!-- END BUTTON ADD NEW CLASS (MODAL) -->

    <!-- CLASS TABLE -->
    <?php $classes = DAOClassImpl::getAll() ?>
    <table style="border: solid 1px" class="mt-2">
        <thead>
        <tr>
            <th>ID_CLASS</th>
            <th>ID_TEACHER</th>
            <th>ID_COURSE</th>
            <th>NAME</th>
            <th>COLOR</th>
        </tr>
        </thead>
        <?php while( $class = mysqli_fetch_array($classes) ) { ?>
            <tbody>
            <tr>
                <td> <?php echo $class['id_class'] ;?> </td>
                <td> <?php echo $class['id_teacher'] ;?> </td>
                <td> <?php echo $class['id_course'] ;?> </td>
                <td> <?php echo $class['name'] ;?> </td>
                <td> <?php echo $class['color'] ;?> </td>

                <!-- CRUD BUTTONS -->
                <td>
                    <!-- BUTTON ADD NEW CLASS (MODAL) -->
                    <button type="button" class="btn btn-primary" id="updateClass" data-toggle="modal" data-target="#btnUpdateClass"
                            data-id_class    = "<?php echo $class['id_class'] ;?>"
                            data-id_teacher  = "<?php echo $class['id_teacher'] ;?>"
                            data-id_course   = "<?php echo $class['id_course'] ;?>"
                            data-name        = "<?php echo $class['name'] ;?>"
                            data-color       = "<?php echo $class['color'] ;?>">
                        Editar
                    </button> <!-- END BUTTON ADD NEW CLASS (MODAL) -->

                    <!-- BUTTON DELETE CLASS -->
                    <a href="<?=base_url?>/class/delete&id=<?php echo $class['id_class'];?>">
                        Eliminar
                    </a> <!-- END BUTTON DELETE CLASS -->
                </td>

            </tr>
            </tbody>
        <?php } ?>
    </table> <!-- END CLASS TABLE -->
    <!-- -------------------------- END MAIN VIEW -------------------------- -->

    <script>
        $(document).on("click", "#updateClass", function() {
            let id_class    = $(this).data('id_class');
            let id_teacher  = $(this).data('id_teacher');
            let id_course   = $(this).data('id_course');
            let name        = $(this).data('name');
            let color       = $(this).data('color');


            $("#id_class").val(id_class);
            $("#classId_teacher").val(id_teacher);
            $("#classId_course").val(id_course);
            $("#className").val(name);
            $("#classColor").val(color);

        })
    </script>

</div>
