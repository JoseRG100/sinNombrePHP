<!-- BARRA LATERAL -->
<aside id="asideContainer">

    <div class="container-fluid">

        <!-- SHOWS USER NAME -->
        <?php if(isset($_SESSION['identity'])): ?>
            <h3><?=$_SESSION['identity']->name?></h3>
        <?php endif; ?>

        <!-- ADMIN SESSION -->
        <?php if($_SESSION['admin'] == true): ?>
            <!-- ADD NEW SUBJECT -->
            <form class="row" method="POST">
                <input class="itemContainer" type="submit" name="btn-addNewSubject" value="Gestionar cursos">
            </form>
            <!-- ADD NEW TEACHER -->
            <form class="row" method="POST">
                <input class="itemContainer" type="submit" name="btn-addNewTeacher" value="Gestionar profesores">
            </form>
            <!-- ADD NEW CLASS -->
            <form class="row" method="POST">
                <input class="itemContainer" type="submit" name="btn-addNewClass" value="Gestionar clases">
            </form>
        <?php endif; ?>

        <!-- TEACHER SESSION -->
        <?php if($_SESSION['teacher'] == true): ?>
            <!-- SEE CLASS LIST_TEACHERS -->
                <form class="row" method="POST">
                    <input class="itemContainer" type="submit" name="btn-teacherClassList" value="Ver clases">
                </form>
            <!-- SEE SCHEDULE -->
                <form class="row" method="POST">
                    <input class="itemContainer" type="submit" name="btn-schedule" value="Horario">
                </form>
        <?php endif; ?>

        <!-- STUDENT SESSION -->
        <?php if($_SESSION['student'] == true): ?>
            <!-- SEE CLASS LIST_SUSCRIPTIONS -->
            <form class="row" method="POST">
                <input class="itemContainer" type="submit" name="btn-studentClassList" value="Asignaturas">
            </form>
            <!-- SEE SCHEDULE -->
            <form class="row" method="POST">
                <input class="itemContainer" type="submit" name="btn-schedule" value="Horario">
            </form>
        <?php endif; ?>

        <!-- SIGN OFF -->
        <form class="row" method="POST">
            <input class="itemContainer" type="submit" name="btn-singOff" value="Cerrar sesión">
        </form>
    </div>

</aside>
