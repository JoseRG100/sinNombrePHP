<div class="contentContainer" style="border: solid red">
    <h2>This space is to add a new TEACHER</h2>

    <form class="container-fluid" action="<?=base_url?>/teacher/register" method="POST">
        <!-- NAME INPUT -->
        <div class="form-group">
            <label>Nombres</label>
            <input type="text" name="name" class="form-control" placeholder="Ingrese nombre" autofocus>
        </div>
        <!-- SURNAME INPUT -->
        <div class="form-group">
            <label>Apellidos</label>
            <input type="text" name="surname" class="form-control" placeholder="Ingrese apellidos">
        </div>
        <!-- TELEPHONE INPUT -->
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="telephone" class="form-control" placeholder="Ingrese teléfono">
        </div>
        <!-- NIF INPUT -->
        <div class="form-group">
            <label>NIF</label>
            <input type="text" name="nif" class="form-control" placeholder="Ingrese NIF">
        </div>
        <!-- EMAIL INPUT -->
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Ingrese email">
        </div>
        <!-- PASSWORD INPUT -->
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary mt-2">CREAR PROFESOR</button>
    </form>
</div>