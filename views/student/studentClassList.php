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
















    <!-- -------------------------- END MAIN VIEW -------------------------- -->

    <!-- CRUD BUTTONS -->
    <!-- END CRUD BUTTONS -->
    <!-- END CRUD BUTTONS -->

</div>
