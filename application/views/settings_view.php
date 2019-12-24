<div class="container h-100">
    <div class="row h-100">
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/application/views/left-bar.php'; ?>
        <div class="col-10" id="content">
            <?php
            $nhref = '/user';
            $ntext = $_SESSION['user']['login'];
            require_once $_SERVER['DOCUMENT_ROOT'].'/application/views/navbar.php';
            ?>
            <div class="row mt-5">
                <div class="col-4">
                    <form action="" method="POST" id="newLoginForm" class="settingsForm">
                        <label class="text-dark">Изменить логин</label>
                        <input type="text" name="new_login" placeholder="Новый логин" class="form-control mb-1">
                        <input type="submit" name="do_new_login" value="Изменить логин" class="btn btn-warning" id="do_new_login">

                        <br>
                        <span id="ajaxResultLogin"></span>
                    </form>
                </div>
                <div class="col-4"></div>
                <div class="col-4"></div>
                <div class="col-4 mt-5">
                    <form action="" method="POST" id="newPasswordForm" class="settingsForm">
                        <label class="text-dark">Изменить пароль</label>
                        <input type="password" name="new_password" placeholder="Новый пароль" class="form-control mb-1">
                        <input type="password" name="r_new_password" placeholder="Повторите новый пароль" class="form-control mb-1">
                        <input type="submit" name="do_new_password" value="Изменить пароль" class="btn btn-warning" id="do_new_password">

                        <br>
                        <span id="ajaxResultPassword"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/settings_ajax.js"></script>