<!-- BARRA LATERAL -->
<aside id="lateral">

    <div id="login" class="block_aside">

        <ul>
                <li><a href="#">Añadir asignatura</a></li>
                <li><a href="#">Añadir profesor</a></li>
                <li><a href="#">Gestionar cursos</a></li>

                <li><a href="#">Mis asignaturas</a></li>
                <li><a href="#">Cerrar sesión</a></li>
        </ul>

<!--
        <?php echo $_SESSION['identity'] ?>

        <?php if(isset($_SESSION['identity'])): ?>
        <h3><?=$_SESSION['identity']->username?> <?=$_SESSION['identity']->name?></h3>
        <?php endif; ?>

        <ul>
            <?php if(isset($_SESSION['admin'])): ?>
            <li><a href="#">Añadir asignatura</a></li>
            <li><a href="#">Añadir profesor</a></li>
            <li><a href="#">Gestionar cursos</a></li>
            <?php endif; ?>
            
            <?php if(isset($_SESSION['identity'])): ?>
            <li><a href="#">Mis asignaturas</a></li>
            <li><a href="<?=base_url?>/usuario/logout">Cerrar sesión</a></li>
            <?php endif; ?>
        </ul>
-->

    </div>

</aside>
