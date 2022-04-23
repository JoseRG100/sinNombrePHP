<!-- MODAL CONTAINER -->
<div class="modal fade" id="insertClass" tabindex="-1" role="dialog" aria-labelledby="insertClass" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- MODAL HEADER -->
            <div class="modal-header">
                <h5 class="modal-title" id="insertClass">Añadir nueva clase</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> <!-- END MODAL HEADER -->

            <!-- MODAL BODY -->
            <div class="modal-body">
                <!-- FORM CONTAINER -->
                <form class="container-fluid" action="<?=base_url?>/class/register" method="POST">

                    <!-- ID_TEACHER INPUT -->
                    <div class="form-group">
                        <label>Profesor: </label>
                        <?php $teachers = DAOTeacherImpl::getAll(); ?>
                        <select name="id_teacher" class="form-control" >
                            <?php while( $teacher = mysqli_fetch_array($teachers) ) { ?>
                                <option value="<?php echo $teacher['id_teacher'] ;?>"> (id: <?php echo $teacher['id_teacher'] ;?>) <?php echo $teacher['name'] ;?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- ID_COURSE INPUT -->
                    <div class="form-group">
                        <label>Curso: </label>
                        <?php $courses = DAOCourseImpl::getAll(); ?>
                        <select name="id_course" class="form-control" >
                            <?php while( $course = mysqli_fetch_array($courses) ) { ?>
                                <option value="<?php echo $course['id_course'] ;?>"> (id: <?php echo $course['id_course'] ;?>) <?php echo $course['name'] ;?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- NAME INPUT -->
                    <div class="form-group">
                        <label>name</label>
                        <input type="text" name="name" class="form-control" >
                    </div>
                    <!-- COLOR INPUT -->
                    <div class="form-group">
                        <?php $colors = array('light-green', 'orange', 'red', 'magenta','cyan', 'light-blue', 'blue', 'gray'); ?>
                        <label>color</label>
                        <select name="color" class="form-control" >
                            <?php foreach( $colors as $color ) { ?>
                                <option value="<?php echo $color ;?>"><?php echo $color ;?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- TIME START -->
                    <div class="form-group">
                        <label>Inicio</label>
                        <input type="time" name="time_start" class="form-control" >
                    </div>

                    <!-- TIME END -->
                    <div class="form-group">
                        <label>Final</label>
                        <input type="time" name="time_end" class="form-control" >
                    </div>

                    <!-- DAY -->
                    <div class="form-group">
                        <label>Día</label>
                        <input type="date" name="day" class="form-control" >
                    </div>

                    <br>

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <input type="submit" class="btn btn-success btn-block" value="CREAR CLASE">
                    </div> <!-- END MODAL FOOTER -->

                </form> <!-- END FORM CONTAINER -->
            </div> <!-- END MODAL BODY -->



        </div>
    </div>
</div>
<!-- END MODAL CONTAINER -->