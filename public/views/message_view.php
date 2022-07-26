<div class="container" style="min-height: 50vh;">
        <?php
        if (isset($_SESSION['msg']))
            echo '<div class="alert alert-success" role="alert">'.$_SESSION['msg'].'</div>';
            unset($_SESSION['msg']);
        ?>
</div>
