<h1>Gestión de asignaturas</h1>

<!-- ADD NEW COURSE -->
<form class="row" method="POST">
    <input class="button-small" type="submit" name="btn-addNewCourse">
</form>

<div class="contentContainer">
    <table style="border: solid 1px">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>description</th>
            <th>date_start</th>
            <th>date_end</th>
            <th>active</th>
        <?php if (isset($asignaturas)): ?>
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
        <?php endif ?>
    </table>
</div>