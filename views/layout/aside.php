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
                <input class="itemContainer" type="submit" name="btn-addNewSubject" value="Añadir curso">
            </form>
            <!-- ADD NEW TEACHER -->
            <form class="row" method="POST">
                <input class="itemContainer" type="submit" name="btn-addNewTeacher" value="Añadir profesor">
            </form>
            <!-- ADD NEW CLASS -->
            <form class="row" method="POST">
                <input class="itemContainer" type="submit" name="btn-addNewClass" value="Añadir clase">
            </form>
        <?php endif; ?>

        <!-- TEACHER SESSION -->
            <!-- SEE CLASS LIST_TEACHERS -->
                <form class="row" method="POST">
                    <input class="itemContainer" type="submit" name="btn-teacherClassList" value="Clases">
                </form>

        <!-- STUDENT SESSION -->
            <!-- SEE CLASS LIST_SUSCRIPTIONS -->
            <form class="row" method="POST">
                <input class="itemContainer" type="submit" name="btn-studentClassList" value="Asignaturas">
            </form>
            <!-- SEE SCHEDULE -->
            <form class="row" method="POST">
                <input class="itemContainer" type="submit" name="btn-schedule" value="Horario">
            </form>

        <!-- SIGN OFF -->
        <form class="row" method="POST">
            <input class="itemContainer" type="submit" name="btn-singOff" value="Cerrar sesión">
        </form>
    </div>

</aside>
