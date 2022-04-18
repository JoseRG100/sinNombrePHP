<div class="contentContainer">

    <!-- -------------------------- ALERTS -------------------------- -->
    <!-- SUCCESS: CLASS  REGISTER -->
    <?php if(isset($_SESSION['courseEnrollment']) && $_SESSION['courseEnrollment'] == 'complete') {
        $_SESSION['message_type'] = 'success';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END SUCCESS: CLASS REGISTER -->

    <!-- ERROR: CLASS REGISTER -->
    <?php if(isset($_SESSION['courseEnrollment']) && $_SESSION['courseEnrollment'] == 'failed') {
        $_SESSION['message_type'] = 'danger';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END ERROR: TEACHER REGISTER -->

    <!-- SUCCESS: CLASS UPDATE -->
    <?php if(isset($_SESSION['unEnrollment']) && $_SESSION['unEnrollment'] == 'complete') {
        $_SESSION['message_type'] = 'success';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END SUCCESS: CLASS UPDATE -->

    <!-- ERROR: CLASS UPDATE -->
    <?php if(isset($_SESSION['unEnrollment']) && $_SESSION['unEnrollment'] == 'failed') {
        $_SESSION['message_type'] = 'danger';
        require_once 'views/flashAlert.php';
        Utils::deleteSession('message');
        Utils::deleteSession('message_type');
    }?> <!-- END ERROR: CLASS UPDATE -->

    <!-- -------------------------- END ALERTS -------------------------- -->

<h1>This is the list with the CLASSES from a student</h1>


    <!-- TITTLE -->
    <h2>Gestión asignaturas alumno</h2>
    <!-- END TITTLE -->

    <!-- BUTTON ADD NEW TEACHER (MODAL) -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#classSignUp">
        MATRICULARSE EN ASIGNATURAS
    </button> <!-- END BUTTON ADD NEW TEACHER (MODAL) -->

    <!-- CLASS TABLE -->
    <?php $enrollments = DAOEnrollmentImpl::getAll() ?>
    <table style="border: solid 1px" class="mt-2">
        <thead>
        <tr>
            <th>ID_MATRICULA</th>
            <th>ASIGNATURA</th>
            <th>PROFESOR</th>
            <th>F. INICIO</th>
            <th>F. FIN</th>
        </tr>
        </thead>
        <?php while( $enrollment = mysqli_fetch_array($enrollments) ) { ?>
        <tbody>
            <tr>
                <td> <?php echo $enrollment['id_enrollment'] ;?> </td>
                <td> <?php echo DAOCourseImpl::getOneToObject(DAOClassImpl::getOneToObject($enrollment['id_class'])->getIdCourse())->getName() ;?> </td>
                <td> <?php echo DAOTeacherImpl::getOneToObject(DAOClassImpl::getOneToObject($enrollment['id_class'])->getIdTeacher())->getName() ;?>
                     <?php echo DAOTeacherImpl::getOneToObject(DAOClassImpl::getOneToObject($enrollment['id_class'])->getIdTeacher())->getSurname() ;?>
                </td>
                <td> <?php echo DAOCourseImpl::getOneToObject(DAOClassImpl::getOneToObject($enrollment['id_class'])->getIdCourse())->getDateStart() ;?> </td>
                <td> <?php echo DAOCourseImpl::getOneToObject(DAOClassImpl::getOneToObject($enrollment['id_class'])->getIdCourse())->getDateEnd() ;?> </td>

            </tr>
        </tbody>
        <?php } ?>
    </table> <!-- END CLASS TABLE -->
    <!-- -------------------------- END MAIN VIEW -------------------------- -->














    <!-- -------------------------- END MAIN VIEW -------------------------- -->

    <!-- CRUD BUTTONS -->
    <!-- END CRUD BUTTONS -->
    <!-- END CRUD BUTTONS -->

</div>
