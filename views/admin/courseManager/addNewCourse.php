<div class="contentContainer">

    <h1>Crear nuevas asignaturas</h1>

    <div class="form_container">
    <form action="<?=base_url?>/course/save" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" />

        <label for="descripcion">Descripción</label>
        <textarea type="text" name="descripcion"></textarea>

        <label for="empieza">Empieza</label>
        <input type="date" name="empieza" />

        <label for="acaba">Acaba</label>
        <input type="date" name="acaba" />

        <label for="activo">Activo</label>
        <input type="number" name="activo" />

        <input type="submit" name="save_course" value="Guardar" />
    </form>
    </div>

</div>