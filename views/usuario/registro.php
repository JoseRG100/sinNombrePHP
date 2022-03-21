<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
<strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
<strong>Registro fallido, introduce bien los datos</strong>
<?php endif; ?>

<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>usuario/save" method="POST">
    <label for="nombre">UserName</label>
    <input type="text" name="username" required/>
    
     <label for="apellidos">Name</label>
    <input type="text" name="name" required/>
    
     <label for="email">Email</label>
    <input type="email" name="email" required/>
    
     <label for="password">Contraseña</label>
    <input type="password" name="password" required/>
    
    <input type="submit" value="Registrarse" />
</form>