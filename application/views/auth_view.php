<div class="container h-100">
    <div class="row h-100 justify-content-center align-content-center">
        <div id="authForm">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="#" id="openReg">Регистрация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="openLog">Вход</a>
                </li>
            </ul>
            <hr>
            <div id="ajaxResult"></div>
            <div id="formReg">
                <form action="" method="POST" id="formRegForm">
                    <input class="form-control form-control-lg mb-1" type="text" placeholder="Придумайте логин" name="login">
                    <input class="form-control form-control-lg mb-1" type="password" placeholder="Придумайте пароль" name="password">
                    <input class="form-control form-control-lg mb-2" type="password" placeholder="Повторите пароль" name="r_password">
                    <input class="btn btn-success btn-lg mb-1" type="submit" value="Зарегистрироваться" name="do_reg" id="do_reg">
                </form>
            </div>
            <div id="formLog">
                <form action="" method="POST" id="formLogForm">
                    <input class="form-control form-control-lg mb-1" type="text" placeholder="Введите логин" name="login">
                    <input class="form-control form-control-lg mb-2" type="password" placeholder="Введите пароль" name="password">
                    <input class="btn btn-primary btn-lg mb-1" type="submit" value="Войти" name="do_login" id="do_login">
                </form>
            </div>
        </div>
    </div>
</div>

<script src="/js/auth.js"></script>
<script src="/js/auth_ajax.js"></script>