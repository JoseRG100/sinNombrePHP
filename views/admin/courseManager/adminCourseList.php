<div class="contentContainer" style="...">
<!-- VALIDACIONES -->

    <!-- SUCCESS: COURSE REGISTER -->
    <?php if(isset($_SESSION['addCourse']) && $_SESSION['addCourse'] == 'complete') {
        $_SESSION['message_type'] = 'success';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END SUCCESS: COURSE REGISTER -->

    <!-- ERROR: COURSE REGISTER -->
    <?php if(isset($_SESSION['addCourse']) && $_SESSION['addCourse'] == 'failed') {
        $_SESSION['message_type'] = 'danger';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END ERROR: COURSE REGISTER -->

    <!-- SUCCESS: COURSE UPDATE -->
    <?php if(isset($_SESSION['courseUpdate']) && $_SESSION['courseUpdate'] == 'complete') {
        $_SESSION['message_type'] = 'success';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END SUCCESS: COURSE REGISTER -->

    <!-- ERROR: COURSE UPDATE -->
    <?php if(isset($_SESSION['courseUpdate']) && $_SESSION['courseUpdate'] == 'failed') {
        $_SESSION['message_type'] = 'danger';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END ERROR: COURSE REGISTER -->

    <!-- SUCCESS: COURSE DELETE -->
    <?php if(isset($_SESSION['courseDelete']) && $_SESSION['courseDelete'] == 'complete') {
        $_SESSION['message_type'] = 'success';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END SUCCESS: COURSE REGISTER -->

    <!-- ERROR: COURSE DELETE -->
    <?php if(isset($_SESSION['courseDelete']) && $_SESSION['courseDelete'] == 'failed') {
        $_SESSION['message_type'] = 'danger';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END ERROR: COURSE REGISTER -->

<!-- END VALIDACIONES -->

    <h1>Gestión de asignaturas</h1>

    <!-- ADD NEW COURSE -->
    <form class="row" method="POST">
        <input class="button-small" type="submit" name="btn-addNewCourse">
    </form>

    <?php $courses = DAOCourseImpl::getAll() ?>
    <table style="border: solid 1px">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>description</th>
                <th>date_start</th>
                <th>date_end</th>
                <th>active</th>
            </tr>
        </thead>
            <?php while( $course = mysqli_fetch_array($courses) ){ ?>
        <tbody>
                <tr>

                    <td><?php echo $course['id_course'] ;?></td>
                    <td><?php echo $course['name'] ;?></td>
                    <td><?php echo $course['description'] ;?></td>
                    <td><?php echo $course['date_start'] ;?></td>
                    <td><?php echo $course['date_end'] ;?></td>
                    <td><?php echo $course['active'] ;?></td>

                    <!-- CRUD BUTTONS -->
                    <td>
                        <!-- BUTTON ADD NEW COURSE (MODAL) -->
                        <button type="button" class="btn btn-primary" id="updateCourse" data-toggle="modal" data-target="#btnUpdateCourse"
                                data-id_course   = "<?php echo $course['id_course'] ;?>"
                                data-name        = "<?php echo $course['name'] ;?>"
                                data-description = "<?php echo $course['description'] ;?>"
                                data-date_start  = "<?php echo $course['date_start'] ;?>"
                                data-date_end    = "<?php echo $course['date_end'] ;?>"
                                data-active      = "<?php echo $course['active'] ;?>">

                            Editar
                        </button> <!-- END BUTTON ADD NEW COURSER (MODAL) -->
                        <!-- BUTTON DELETE COURSE -->
                        <a href="<?=base_url?>/course/delete&id=<?php echo $course['id_course'] ;?>">
                            Eliminar
                        </a> <!-- END BUTTON DELETE COURSE -->
                    </td> <!-- END CRUD BUTTONS -->
                </tr>

        </tbody>
        <?php } ?>
    </table> <!-- END COURSE TABLE -->
    <!-- -------------------------- END MAIN VIEW -------------------------- -->

    <script>
        $(document).on("click", "#updateCourse", function() {
            let id_course   = $(this).data('id_course');
            let name        = $(this).data('name');
            let description = $(this).data('description');
            let date_start  = $(this).data('date_start');
            let date_end    = $(this).data('date_end');
            let active      = $(this).data('active');


            $("#id_course").val(id_course);
            $("#courseName").val(name);
            $("#courseDescription").val(description);
            $("#courseDate_start").val(date_start);
            $("#courseDate_end").val(date_end);
            $("#courseActive").val(active);

        })
    </script>

</div>

