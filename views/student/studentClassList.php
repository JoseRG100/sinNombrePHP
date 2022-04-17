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
    <h1>CURSOS DISPONIBLES</h1>
    <?php $classes = DAOClassImpl::getAll() ?>
    <table style="border: solid 1px" class="mt-2">
        <thead>
        <tr>
            <th>PROFESOR</th>
            <th>ASIGNATURA</th>
            <th>NOMBRE</th>
            <th>COLOR</th>

        </tr>
        </thead>
        <?php while( $class = mysqli_fetch_array($classes) ) { ?>
            <tbody>
            <tr>
                <td> <?php echo $class['id_teacher'] ;?>, <?php echo DAOTeacherImpl::getOneToObject($class['id_teacher'])->getName() ;?> </td>
                <td> <?php echo $class['id_course'] ;?>, <?php echo ;?> </td>
                <td> <?php echo $class['name'] ;?> </td>
                <!-- FECHA INICIO -> CURSO -->
                <!-- FECHA FIN -> CURSO -->
                <td> <?php echo $class['color'] ;?> </td>

                <!-- CRUD BUTTONS -->
                <!-- END CRUD BUTTONS -->
                <!-- END CRUD BUTTONS -->

            </tr>
            </tbody>
        <?php } ?>
    </table> <!-- END TEACHERS TABLE -->
    <!-- -------------------------- END MAIN VIEW -------------------------- -->



</div>
