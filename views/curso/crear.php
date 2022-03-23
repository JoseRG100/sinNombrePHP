<h1>Crear nuevo curso</h1>

<form action="<?=base_url?>curso/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required/>
    
      <label for="nombre">Descripción</label>
    <input type="text" name="descripcion" required/>
    
      <label for="nombre">Fecha inicio</label>
    <input type="text" name="fechaIn" required/>
    
      <label for="nombre">Fecha fin</label>
    <input type="text" name="fechaFin" required/>
    
      <label for="nombre">Activo</label>
    <input type="text" name="activo" required/>
    
    <input type="submit" value="Guardar" />
    
</form>