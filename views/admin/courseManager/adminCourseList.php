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

    <table style="border: solid 1px">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>description</th>
            <th>date_start</th>
            <th>date_end</th>
            <th>active</th>
        <?php if (isset($asignaturas)): ?>
            <?php while($asi = $asignaturas->fetch_object()): ?>
                <tr>
                    <td><?= $asi->id_course;?></td>
                    <td><?= $asi->name;?></td>
                    <td><?= $asi->description;?></td>
                    <td><?= $asi->date_start;?></td>
                    <td><?= $asi->date_end;?></td>
                    <td><?= $asi->active;?></td>
                    <td>
                        <a href="" class="button button-small">Editar</a>
                        <a href="" class="button button-small">Eliminar</a>
                    </td>

                </tr>


            <?php endwhile; ?>
        <?php endif ?>
    </table>
</div>