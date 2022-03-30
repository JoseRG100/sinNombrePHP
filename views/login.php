<!-- ALERTS (MISTAKE AND SUCCESFULL) -->
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <strong class="alert_green">Registro completado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<!--BODY -->
<div id="login" style="height: 400px;" class="container">
    <div style="height: 400px;" class="row d-flex justify-content-center row align-items-center">

        <div class="col-md-4 d-grid gap-3">

                <form class="d-grid gap-3" action="<?=base_url?>/usuario/login" method="POST">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control"
                        placeholder="Email" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control"
                       placeholder="Password">
                    </div>
                    <div style="text-align: end">
                        <a href="<?=base_url?>/usuario/registro">You have not yet registered?</a>
                    </div>
                    <input type="submit" class="btn btn-success btn-block"
                    name="login" value="LOGIN">
                </form>
        </div>

    </div>
</div>