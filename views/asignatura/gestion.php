<h1>Gestión de asignaturas</h1>


<a href="<?=base_url?>asignatura/crear" class=" button-small">
    Crear asignatura</a>
<table border="1">
    
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>description</th>
        <th>date_start</th>
        <th>date_end</th>
        <th>active</th>
        
<?php while($asi = $asignaturas->fetch_object()): ?> 
    <tr>
        <td><?= $asi->id_course;?></td>
            <td><?= $asi->name;?></td>
            <td><?= $asi->description;?></td>
            <td><?= $asi->date_start;?></td>
            <td><?= $asi->date_end;?></td>
            <td><?= $asi->active;?></td>    
    </tr>    
<?php endwhile; ?>
</table>