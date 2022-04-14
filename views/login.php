<!-- ALERTS (MISTAKE AND SUCCESFULL) -->

    <!-- SUCCESS ALERT (STUDENT REGISTER) -->
    <?php if(isset($_SESSION['studentRegister']) && $_SESSION['studentRegister'] == 'complete'): ?>
        <div class="d-flex justify-content-around alert alert-success alert-dismissible fade show" role="alert">
            <p>Estudiante registrado correctamente</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div><?php endif; ?>
    <?php Utils::deleteSession('studentRegister'); ?>
    <!-- END SUCCESS ALERT (STUDENT REGISTER) -->

    <!-- SUCCESS ALERT (STUDENT REGISTER) -->
    <?php if(isset($_SESSION['error_login'])): ?>
        <!-- ERROR LOGIN -->
        <div class="d-flex justify-content-around alert alert-danger alert-dismissible fade show" role="alert">
            <p>Error. Identificación fallida.</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div><?php endif; ?>
    <?php Utils::deleteSession('error_login'); ?>
    <!-- END SUCCESS ALERT (STUDENT REGISTER) -->

<!-- END ALERTS (MISTAKE AND SUCCESFULL) -->

<!-- LOGIN CONTAINER -->
<div id="login" style="height: 400px;" class="container">
    <div style="height: 400px;" class="row d-flex justify-content-center row align-items-center">

        <div class="col-md-4 d-grid gap-3">

            <!-- LOGIN FORM -->
            <form class="d-grid gap-3" action="<?=base_url?>/login/login" method="POST">

                <!-- LOGIN EMAIL -->
                <div class="form-group">
                    <input type="email" name="email" class="form-control"
                    placeholder="Email" autofocus>
                </div><!-- END LOGIN EMAIL -->

                <!-- LOGIN PASSWORD -->
                <div class="form-group">
                    <input type="password" name="password" class="form-control"
                   placeholder="Password">
                </div><!-- END LOGIN PASSWORD -->


                <!-- REGISTER REDIRECTION -->
                <div style="text-align: end">
                    <a href="<?=base_url?>/routes/showStudentRegister">
                        You have not yet registered?
                    </a>
                </div> <!-- /REGISTER REDIRECTION -->

                <!-- SUBMIT BUTTON -->
                <input type="submit" class="btn btn-success btn-block"
                    name="login" value="LOGIN">
                <!-- END SUBMIT BUTTON -->

            </form><!-- END LOGIN FORM -->

        </div>

    </div>
</div> <!-- LOGIN CONTAINER -->