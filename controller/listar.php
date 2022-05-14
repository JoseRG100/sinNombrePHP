<?php

function listarProfesores($lista){

    echo("<div class='table-responsive-sm'>");
    echo("<table class='table tabla'>");
    echo("<tbody>");
    foreach($lista as $teacher){
        ?>
        <tr>  
        
        <td style='float:left; margin-left:10%;'>
            <?php echo($teacher->id_teacher) ?></td>
        <td style='float:left; margin-left:10px;'>
            <?php echo($teacher->name) ?></td>            
        <td style='float:left; margin-left:10px;'>
            <?php echo($teacher->surname) ?></td>
        <?php
        echo("<td>");
        ?>
        <form action="../view/admin.php" method='post'>
            <input type="hidden" name="id2Profesor" value=<?php echo($teacher->id_teacher); ?>>
            <input type="hidden" name="name2" value=<?php echo($teacher->name); ?>>
            <input type="hidden" name="surname2" value=<?php echo($teacher->surname); ?>>
            <input type="hidden" name="telephone2" value=<?php echo($teacher->telephone); ?>>
            <input type="hidden" name="nif2" value=<?php echo($teacher->nif); ?>>
            <input type="hidden" name="email2" value=<?php echo($teacher->email); ?>>
            <!-- <button data-toggle="modal" data-target="#teachersMod" class='btn btn-warning btn-listado' type='button' name='modificarProfesor' value=<?php echo($teacher->id_teacher); ?>>Modificar</button> -->
            <input class='btn btn-warning btn-listado' type='submit' name='modificarProfesor' value="Alterar Registro">
        </form>
        
        <?php
        
        echo("</td>");
        
        echo("</tr>");
        
    }
    
    echo("</tbody>");
    echo("</table");
    echo("</div");
}

function listarAgenda($lista){
    echo("<div class='table-responsive-sm'>");
    echo("<table class='table tabla'>");
    echo("<tbody>");
    foreach($lista as $agenda){
        ?>
        <tr>  
        
        <td style='float:left; margin-left:10%;'>
            <?php echo($agenda->id_schedule) ?></td>
        <td style='float:left; margin-left:10px;'>
            <?php echo($agenda->id_class) ?></td>            
        <td style='float:left; margin-left:10px;'>
            <?php echo($agenda->time_start) ?></td>
        <td style='float:left; margin-left:10px;'>
            <?php echo($agenda->time_end) ?></td>
        <td style='float:left; margin-left:10px;'>
            <?php echo($agenda->day) ?></td>
        <?php
        echo("<td>");
        ?>
        <form action="../view/admin.php" method='post'>
            <input type="hidden" name="id2Agenda" value=<?php echo($agenda->id_schedule); ?>>
            <input type="hidden" name="idclassAgenda2" value=<?php echo($agenda->id_class); ?>>
            <input type="hidden" name="inicioAgenda2" value=<?php echo($agenda->time_start); ?>>
            <input type="hidden" name="finAgenda2" value=<?php echo($agenda->time_end); ?>>
            <input type="hidden" name="day2" value=<?php echo($agenda->day); ?>>
            <!-- <button data-toggle="modal" data-target="#teachersMod" class='btn btn-warning btn-listado' type='button' name='modificarProfesor' value=<?php echo($teacher->id_teacher); ?>>Modificar</button> -->
            <input class='btn btn-warning btn-listado' type='submit' name='modificarAgenda' value="Alterar Registro">
        </form>
        
        <?php
        echo("</td></tr>");
    }
    echo("</tbody>");
    echo("</table");
    echo("</div");;
}

function listarCursos($lista){
    
    echo("<div class='table-responsive-sm'>");
    echo("<table class='table tabla'>");
    echo("<tbody>");
    foreach($lista as $cursos){
        ?>
        <tr>  
        
        
        <td style='float:left; margin-left:10px;'>
            <?php echo($cursos->name) ?></td>            
        <td style='float:left; margin-left:10px;'>
            <?php echo($cursos->description) ?></td>
        <td style='float:left; margin-left:10px;'>
            <?php echo($cursos->date_start) ?></td>
        <td style='float:left; margin-left:10px;'>
            <?php echo($cursos->date_end) ?></td>
        
        <?php
        echo("<td>");
        ?>
        <form action="../view/admin.php" method='post'>
            <input type="hidden" name="id2Curso" value=<?php echo($cursos->id_course); ?>>
            <input type="hidden" name="nameCurso2" value=<?php echo($cursos->name); ?>>
            <input type="hidden" name="descripcionCurso2" value=<?php echo($cursos->description); ?>>
            <input type="hidden" name="inicioCurso2" value=<?php echo($cursos->date_start); ?>>
            <input type="hidden" name="finCurso2" value=<?php echo($cursos->date_end); ?>>
            <input type="hidden" name="activo2" value=<?php echo($cursos->active); ?>>
            <!-- <button data-toggle="modal" data-target="#teachersMod" class='btn btn-warning btn-listado' type='button' name='modificarProfesor' value=<?php echo($teacher->id_teacher); ?>>Modificar</button> -->
            <input class='btn btn-warning btn-listado' type='submit' name='modificarCurso' value="Alterar Registro">
        </form>
        
        <?php
        echo("</td></tr>");
    }
    echo("</tbody>");
    echo("</table");
    echo("</div");;
   
}

function listarClases($lista){
    echo("<div class='table-responsive-sm'>");
    echo("<table class='table tabla'>");
    echo("<tbody>");
    foreach($lista as $clases){
        ?>
        <tr>  
        
        <td style='float:left; margin-left:10%;'>
            <?php echo($clases->id_class) ?></td>
        <td style='float:left; margin-left:10px;'>
            <?php echo($clases->id_teacher) ?></td>            
        <td style='float:left; margin-left:10px;'>
            <?php echo($clases->id_course) ?></td>
        <td style='float:left; margin-left:10px;'>
            <?php echo($clases->id_schedule) ?></td>
        <td style='float:left; margin-left:10px;'>
            <?php echo($clases->name) ?></td>
        <?php
        echo("<td>");
        ?>
        <form action="../view/admin.php" method='post'>
            <input type="hidden" name="id2class" value=<?php echo($clases->id_class); ?>>
            <input type="hidden" name="id2classTeacher" value=<?php echo($clases->id_teacher); ?>>
            <input type="hidden" name="id2classCourse" value=<?php echo($clases->id_course); ?>>
            <input type="hidden" name="id2classAgenda" value=<?php echo($clases->id_schedule); ?>>
            <input type="hidden" name="nameclass2" value=<?php echo($clases->name); ?>>
            <input type="hidden" name="colorclass2" value=<?php echo($clases->color); ?>>
            <!-- <button data-toggle="modal" data-target="#teachersMod" class='btn btn-warning btn-listado' type='button' name='modificarProfesor' value=<?php echo($teacher->id_teacher); ?>>Modificar</button> -->
            <input class='btn btn-warning btn-listado' type='submit' name='modificarCurso' value="Alterar Registro">
        </form>
        
        <?php
        echo("</td></tr>");
    }
    echo("</table");
}

function listarStudent($lista){

    echo("<div class='table-responsive-sm'>");
    echo("<table class='table tabla'>");
    echo("<tbody>");
    foreach($lista as $clases){
        ?>
        <tr>  
        
        <td style='float:left; margin-left:10%;'>
            <?php echo($clases->id) ?></td>
        <td style='float:left; margin-left:10px;'>
            <?php echo($clases->username) ?></td>            
        <td style='float:left; margin-left:10px;'>
            <?php echo($clases->email) ?></td>
        <td style='float:left; margin-left:10px;'>
            <?php echo($clases->name) ?></td>
        <td style='float:left; margin-left:10px;'>
            <?php echo($clases->surname) ?></td>
        <?php
        echo("<td>");
        ?>
        <form action="../view/admin.php" method='post'>
            <input type="hidden" name="id2student" value=<?php echo($clases->id); ?>>
            <input type="hidden" name="username2student" value=<?php echo($clases->username); ?>>
            <input type="hidden" name="email2student" value=<?php echo($clases->email); ?>>
            <input type="hidden" name="name2student" value=<?php echo($clases->name); ?>>
            <input type="hidden" name="surname2student" value=<?php echo($clases->surname); ?>>
            <input type="hidden" name="telephone2student" value=<?php echo($clases->telephone); ?>>
            <input type="hidden" name="nif2student" value=<?php echo($clases->nif); ?>>
            <input type="hidden" name="date2student" value=<?php echo($clases->date_registered); ?>>
            <input class='btn btn-warning btn-listado' type='submit' name="" value="Alterar Registro">
        </form>
        
        <?php
        echo("</td></tr>");
    }
    echo("</table");

}

function listarEnrollment($lista){

    echo("<div class='table-responsive-sm'>");
    echo("<table class='table tabla'>");
    echo("<tbody>");
    foreach($lista as $clases){
        ?>
        <tr>  
        
        <td style='float:left; margin-left:10%;'>
            <?php echo($clases->id_student) ?></td>
        <td style='float:left; margin-left:10px;'>
            <?php echo($clases->id_course) ?></td>            
        <td style='float:left; margin-left:10px;'>
            <?php echo($clases->status) ?></td>
        <?php
        echo("<td>");
        ?>
        <form action="../view/admin.php" method='post'>
            <input type="hidden" name="id2Enroll" value=<?php echo($clases->id_enrollment); ?>>
            <input type="hidden" name="id2studentEnroll" value=<?php echo($clases->id_student); ?>>
            <input type="hidden" name="id2courseEnroll" value=<?php echo($clases->id_course); ?>>
            <input type="hidden" name="status2Enroll" value=<?php echo($clases->status); ?>>
            <input class='btn btn-warning btn-listado' type='submit' name="" value="Alterar Registro">
        </form>
        
        <?php
        echo("</td></tr>");
    }
    echo("</table");

}
?>

