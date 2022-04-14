<!-- ALERTS (MISTAKE AND SUCCESFULL) -->
<?php if(isset($_SESSION['studentRegister']) && $_SESSION['studentRegister'] == 'failed'): ?>

    <!-- SUCCESS ALERT (STUDENT REGISTER) -->
    <div class="d-flex justify-content-around alert alert-danger alert-dismissible fade show" role="alert">
        <p>Registro fallido, revisa que estén bien todos los datos</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> <!-- END SUCCESS ALERT (STUDENT REGISTER) -->

<?php endif; ?>
<?php Utils::deleteSession('studentRegister'); ?>
<!-- END ALERTS (MISTAKE AND SUCCESFULL) -->

<!-- SCRIPT: Hide the LOGIN view -->
<script type="text/javascript">document.getElementById('login').style.display = 'none';</script>

<!-- REGISTER-VIEW TITLE -->
<div class="card card-body my-2 mx-5">
    <h4 class="subtitle">REGISTER</h4>
</div>

<!-- REGISTER-VIEW BODY -->
<div style="height: auto;" class="container my-5">
    <div style="height: auto" class="row d-flex justify-content-center row align-items-center">

        <div class="col-md-4 d-grid gap-3">

            <form class="d-grid gap-3" action="<?=base_url?>/student/register" method="POST">
                <!-- USERNAME INPUT -->
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" autofocus>
                </div>
                <!-- PASSWORD INPUT -->
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <!-- EMAIL INPUT -->
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <!-- NAME -->
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <!-- SURNAME -->
                <div class="form-group">
                    <label>Surname</label>
                    <input type="text" name="surname" class="form-control">
                </div>
                <!-- TELEPHONE -->
                <div class="form-group">
                    <label>Telephone</label>
                    <input type="text" name="telephone" class="form-control">
                </div>
                <!-- NIF -->
                <div class="form-group">
                    <label>NIF</label>
                    <input type="text" name="nif" class="form-control">
                </div>
                <!-- LAST ROW -->
                <div class="d-flex justify-content-end gap-3 d-row align-items-center ">
                        <!-- COME BACK TO LOGIN -->
                        <a href="<?=base_url?>/routes/index">Already registered?</a>
                        <!-- REGISTER BUTTON -->
                        <input type="submit" class="btn btn-success btn-block"
                               value="REGISTER">
                </div><!-- /LAST ROW -->
            </form>

        </div>

    </div>
</div>