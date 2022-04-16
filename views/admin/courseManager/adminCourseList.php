<div class="contentContainer">
<!-- VALIDACIONES -->
    <!-- SUCCESS: TEACHER REGISTER -->
    <?php if(isset($_SESSION['addCourse']) && $_SESSION['addCourse'] == 'complete') {
        $_SESSION['message_type'] = 'success';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END SUCCESS: TEACHER REGISTER -->

    <!-- ERROR: TEACHER REGISTER -->
    <?php if(isset($_SESSION['addCourse']) && $_SESSION['addCourse'] == 'failed') {
        $_SESSION['message_type'] = 'danger';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END ERROR: TEACHER REGISTER -->
<!-- END VALIDACIONES -->

    <h1>Gestión de asignaturas</h1>

    <!-- ADD NEW COURSE -->
    <form class="row" method="POST">
        <input class="button-small" type="submit" name="btn-addNewCourse">
    </form>

    <?php $courses = courseEntity::getAll() ?>
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
            <?php while( $course = mysqli_fetch_array($courses) ): ?>
        <tbody>
                <tr>

                    <td><?php echo $course['id_course'] ;?></td>
                    <td><?php echo $course['name'] ;?></td>
                    <td><?php echo $course['description'] ;?></td>
                    <td><?php echo $course['date_start'] ;?></td>
                    <td><?php echo $course['date_end'] ;?></td>
                    <td><?php echo $course['active'] ;?></td>



                </tr>


            <?php endwhile; ?>
        </tbody>
    </table>
</div>