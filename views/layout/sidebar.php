<!-- BARRA LATERAL -->
<aside id="lateral">

    <div id="login" class="block_aside">
        
        <?php if(!isset($_SESSION['identity'])): ?>
        <h3>Entrar a la web</h3>
        <form action="<?=base_url?>usuario/login" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" />
            <label for="password">Contraseña</label>
            <input type="password" name="password" />
            <input type="submit" value="Enviar" />
        </form>
        
        <?php else: ?>
        <h3><?=$_SESSION['identity']->username?> <?=$_SESSION['identity']->name?></h3>
        <?php endif; ?>
        <ul>
           
            <?php if(isset($_SESSION['admin'])): ?>
            <li><a href="#">Añadir asignatura</a></li>
            <li><a href="#">Gestionar cursos</a></li>
            <?php endif; ?>
            
            <?php if(isset($_SESSION['identity'])): ?>
             <li><a href="#">Mis asignaturas</a></li>
            <li><a href="#">Profesores</a></li>
            <li><a href="<?=base_url?>usuario/logout">Cerrar sesión</a></li>
            <?php endif; ?>
        </ul>
    </div>

</aside>
