<!-- MODAL CONTAINER -->
<div class="modal fade" id="classSignUp" tabindex="-1" role="dialog" aria-labelledby="classSignUp" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- MODAL HEADER -->
            <div class="modal-header">
                <h5 class="modal-title" id="classSignUp">Matricularse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> <!-- END MODAL HEADER -->

            <!-- MODAL BODY -->
            <div class="modal-body">

                <!-- AVAILABLE CLASSES TABLE -->
                <?php $classes = DAOClassImpl::getAll() ?>
                <table style="border: solid 1px" class="mt-2">
                    <thead>
                    <tr>
                        <th>PROFESOR</th>
                        <th>ASIGNATURA</th>
                        <th>NOMBRE</th>
                        <th>FECHA INICIO</th>
                        <th>FECHA FIN</th>
                        <th>COLOR</th>

                    </tr>
                    </thead>
                    <?php while( $class = mysqli_fetch_array($classes) ) { ?>
                    <tbody>
                        <tr>
                            <td> <?php echo DAOTeacherImpl::getOneToObject($class['id_teacher'])->getName() ;?> <?php echo DAOTeacherImpl::getOneToObject($class['id_teacher'])->getSurname() ;?> </td>
                            <td> <?php echo DAOCourseImpl::getOneToObject($class['id_course'])->getName() ;?> </td>
                            <td> <?php echo $class['name'] ;?> </td>
                            <!-- CURSO -> FECHA INICIO -->
                            <td> <?php echo DAOCourseImpl::getOneToObject($class['id_course'])->getDateStart() ;?> </td>
                            <!-- CURSO -> FECHA FIN -->
                            <td> <?php echo DAOCourseImpl::getOneToObject($class['id_course'])->getDateEnd() ;?> </td>
                            <!-- COLOR -->
                            <td> <?php echo $class['color'] ;?> </td>
                            <!-- SIGN UP BUTTON -->
                            <td>
                                <form action="<?=base_url?>/enrollment/save" method="POST">
                                    <input type="hidden" name="id_student" value="<?php echo $_SESSION['student']->id ?>">
                                    <input type="hidden" name="id_class" value="<?php echo $class['id_class'] ?>">
                                    <input type="submit" name="btn-sendEnrollment" class="btn btn-primary" value="INSCRIBIR">
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table> <!-- END AVAILABLE CLASSES TABLE -->

            </div> <!-- END MODAL BODY -->

            <!-- MODAL FOOTER -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
            </div> <!-- END MODAL FOOTER -->


        </div>
    </div>
</div>
<!-- END MODAL CONTAINER -->