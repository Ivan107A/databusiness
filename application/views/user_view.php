<div class="container h-100">
    <div class="row h-100">
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/application/views/left-bar.php'; ?>
        <div class="col-10" id="content">
            <?php
            $nhref = '/user';
            $ntext = $_SESSION['user']['login'];
            require_once $_SERVER['DOCUMENT_ROOT'].'/application/views/navbar.php';
            ?>
            <div class="ml-4 mt-5">
                <h5>ID: <span class="text-dark"><?=$id;?></span></h5>
                <h5>Логин: <span class="text-dark"><?=$login;?></span></h5>
                <h5>Пароль: <span class="text-dark"><?=$password;?></span></h5>
            </div>
        </div>
    </div>
</div>