<div class="contentContainer">


<h1>This is the list with the CLASSES from a student</h1>


    <!-- TITTLE -->
    <h2>Gestión asignaturas alumno</h2>
    <!-- END TITTLE -->

    <!-- BUTTON ADD NEW TEACHER (MODAL) -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertInCourse">
        Matricularse en asignaturas
    </button> <!-- END BUTTON ADD NEW TEACHER (MODAL) -->

    <!-- STUDENT TABLE -->
    <?php $student = DAOStudentImpl::getAll() ?>
    <table style="border: solid 1px" class="mt-2">
        <thead>
        <tr>
            <th>ASIGNATURA</th>
            <th>PROFESOR</th>
            <th>CLASE</th>

        </tr>
        </thead>
        <?php while( $student = mysqli_fetch_array($student) ) { ?>
            <tbody>
            <tr>
                <td> <?php echo $student['id_teacher'] ;?> </td>
                <td> <?php echo $student['name'] ;?> </td>
                <td> <?php echo $student['surname'] ;?> </td>
                <td> <?php echo $student['telephone'] ;?> </td>
                <td> <?php echo $student['nif'] ;?> </td>
                <td> <?php echo $student['email'] ;?> </td>

                <!-- CRUD BUTTONS -->
                <!-- END CRUD BUTTONS -->

            </tr>
            </tbody>
        <?php } ?>
    </table> <!-- END TEACHERS TABLE -->
    <!-- -------------------------- END MAIN VIEW -------------------------- -->



</div>
