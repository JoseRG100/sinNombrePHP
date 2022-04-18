<!-- BARRA LATERAL -->
<aside id="asideContainer">

    <div class="container-fluid">

        <!-- SHOWS USER NAME -->
        <?php if( isset($_SESSION['identity']) ): ?>
            <h3><?=$_SESSION['identity']->name?></h3>
        <?php endif; ?>

        <!-- ADMIN SESSION -->
        <?php if( isset($_SESSION['admin']) ): ?>
            <!-- ADD NEW SUBJECT -->
            <form class="row" method="GET">
                <input class="itemContainer" type="submit" name="btn-showCourseManager" value="Gestionar cursos">
            </form>
            <!-- ADD NEW TEACHER -->
            <form class="row" method="GET">
                <input class="itemContainer" type="submit" name="btn-showTeacherManager" value="Gestionar profesores">
            </form>

            <!-- ADD NEW CLASS -->
            <form class="row" method="GET">
                <input class="itemContainer" type="submit" name="btn-showClassManager" value="Gestionar clases">
            </form>
        <?php endif; ?>

        <!-- TEACHER SESSION -->
        <?php if( isset($_SESSION['teacher']) ): ?>
            <!-- SEE CLASS LIST_TEACHERS -->
                <form class="row" method="GET">
                    <input class="itemContainer" type="submit" name="btn-showClassList" value="Ver clases">
                </form>
            <!-- SEE SCHEDULE -->
                <form class="row" method="GET">
                    <input class="itemContainer" type="submit" name="btn-showTeacherSchedule" value="Horario">
                </form>
        <?php endif; ?>

        <!-- STUDENT SESSION -->
        <?php if( isset($_SESSION['student']) ): ?>
            <!-- SEE CLASS LIST_SUSCRIPTIONS -->
            <form class="row" method="GET">
                <input class="itemContainer" type="submit" name="btn-showClassListAvailable" value="Asignaturas">
            </form>
            <!-- SEE SCHEDULE -->
            <form class="row" method="GET">
                <input class="itemContainer" type="submit" name="btn-showStudentSchedule" value="Horario">
            </form>
            <!-- SEE PROFILE -->
            <form class="row" method="GET">
                <input class="itemContainer" type="submit" name="btn-showStudentProfile" value="Perfil">
            </form>
        <?php endif; ?>

        <!-- SIGN OFF -->
        <form class="row" method="GET">
            <input class="itemContainer" type="submit" name="btn-singOff" value="Cerrar sesión">
        </form>
    </div>

</aside>
