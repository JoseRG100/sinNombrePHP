<div class="contentContainer" style="border: solid red">

    <!-- ALERTS (MISTAKE AND SUCCESFULL) -->
    <?php if(isset($_SESSION['teacherRegister']) && $_SESSION['teacherRegister'] == 'complete'): ?>
        <div class="d-flex justify-content-around alert alert-success alert-dismissible fade show" role="alert">
            <p>Nuevo profesor, registrado correctamente.</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div><?php endif; ?>
    <?php Utils::deleteSession('teacherRegister'); ?>
    <!-- END ALERTS (MISTAKE AND SUCCESFULL) -->

    <!-- TITTLE -->
    <h2>Gestión de maestros</h2>
    <!-- END TITTLE -->

    <!-- BUTTON ADD NEW TEACHER (MODAL) -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
                <td><?php echo $teacher['id_teacher'] ;?></td>
                <td><?php echo $teacher['name'] ;?></td>
                <td><?php echo $teacher['surname'] ;?></td>
                <td><?php echo $teacher['telephone'] ;?></td>
                <td><?php echo $teacher['nif'] ;?></td>
                <td><?php echo $teacher['email'] ;?></td>
            </tr>
        </tbody>
        <?php } ?>

    </table> <!-- END TEACHERS TABLE -->


</div>