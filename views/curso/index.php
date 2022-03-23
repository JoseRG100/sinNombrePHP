<h1>Gestionar cursos</h1>

<a href="<?=base_url?>curso/crear" class=" button-small">
    Crear curso</a>
<table border="1">
    
    <tr>
        <th>ID</th>
        <th>NAME</th>    
    </tr>    
<?php while($cur = $cursos->fetch_object()): ?> 
    <tr>
        <td><?=$cur->id_course;?></td>
        <td><?=$cur->name;?></td>    
    </tr>    
<?php endwhile; ?>
</table>