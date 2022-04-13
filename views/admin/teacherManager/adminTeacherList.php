<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

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