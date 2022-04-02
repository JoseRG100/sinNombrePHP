<!-- ALERTS (MISTAKE AND SUCCESFULL) -->
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong>Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<!-- SCRIPT: Hide the LOGIN view -->
<script type="text/javascript">document.getElementById('login').style.display = 'none';</script>

<!-- REGISTER-VIEW TITLE -->
<div class="card card-body my-2 mx-5">
    <h4 class="subtitle">REGISTER</h4>
</div>

<!-- REGISTER-VIEW BODY -->
<div style="height: 400px;" class="container my-5">
    <div style="height: 400px;" class="row d-flex justify-content-center row align-items-center">

        <div class="col-md-4 d-grid gap-3">

            <form class="d-grid gap-3" action="<?=base_url?>/usuario/register" method="POST">
                <!-- USERNAME INPUT -->
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" autofocus>
                </div>
                <!-- NAME AND LASTNAME INPUT -->
                <div class="form-group">
                    <label>Name and Lastname</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <!-- EMAIL INPUT -->
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <!-- PASSWORD INPUT -->
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <!-- LAST ROW -->
                <div class="d-flex justify-content-end gap-3 d-row align-items-center ">
                        <!-- COME BACK TO LOGIN -->
                        <a href="<?=base_url?>">Already registered?</a>
                        <!-- REGISTER BUTTON -->
                        <input type="submit" class="btn btn-success btn-block"
                               value="REGISTER">
                </div><!-- /LAST ROW -->
            </form>

        </div>

    </div>
</div>