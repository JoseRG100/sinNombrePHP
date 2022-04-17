<div class="contentContainer">


<h1>This is the list with the CLASSES from a student</h1>


    <!-- TITTLE -->
    <h2>Gestión asignaturas alumno</h2>
    <!-- END TITTLE -->

    <!-- BUTTON ADD NEW TEACHER (MODAL) -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#courseSingUp">
        Matricularse en asignaturas
    </button> <!-- END BUTTON ADD NEW TEACHER (MODAL) -->





    <!-- AVAILABLE CLASSES TABLE -->
    <?php $classes = DAOClassImpl::getAll() ?>
    <table style="border: solid 1px" class="mt-2">
        <thead>
        <tr>
            <th>PROFESOR</th>
            <th>ASIGNATURA</th>
            <th>NOMBRE</th>
            <th>FECHA INICIO</th>
            <th>FECHA FIN</th>
            <th>COLOR</th>

        </tr>
        </thead>
        <?php while( $class = mysqli_fetch_array($classes) ) { ?>
            <tbody>
            <tr>
                <td> <?php echo DAOTeacherImpl::getOneToObject($class['id_teacher'])->getName() ;?> <?php echo DAOTeacherImpl::getOneToObject($class['id_teacher'])->getSurname() ;?> </td>
                <td> <?php echo DAOCourseImpl::getOneToObject($class['id_course'])->getName() ;?> </td>
                <td> <?php echo $class['name'] ;?> </td>
                <!-- CURSO -> FECHA INICIO -->
                <td> <?php echo DAOCourseImpl::getOneToObject($class['id_course'])->getDateStart() ;?> </td>
                <!-- CURSO -> FECHA FIN -->
                <td> <?php echo DAOCourseImpl::getOneToObject($class['id_course'])->getDateEnd() ;?> </td>
                <!-- COLOR -->
                <td> <?php echo $class['color'] ;?> </td>
            </tr>
            </tbody>
        <?php } ?>
    </table> <!-- END AVAILABLE CLASSES TABLE -->











    <!-- -------------------------- END MAIN VIEW -------------------------- -->

    <!-- CRUD BUTTONS -->
    <!-- END CRUD BUTTONS -->
    <!-- END CRUD BUTTONS -->

</div>
