<?php if( isset($_SESSION['message']) && isset($_SESSION['message_type']) ) { ?>
    <div class="d-flex justify-content-around alert alert-<?=$_SESSION['message_type'];?>
    alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php }?>


