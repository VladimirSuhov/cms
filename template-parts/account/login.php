<?php head('Вход'); ?>

<form class="form-horizontal" role="form" name="login_form" method="post" action="/account/login/">
    <input type="hidden" name="login_form" value="Y">
    <div class="form-group">
        <label for="login" class="col-sm-2 control-label">Логин</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="" id="login" name="login" placeholder="Логин" required>
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Пароль</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" value="" id="password" placeholder="Пароль" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" value="Y"> Запомнить меня
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="text" name="captcha" value="" class="captchafield">
        </div>
        <div class="col-sm-offset-2 col-sm-10">
            <img src="/resource/captcha.php" alt="Captcha">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="enter" value="Y" class="btn btn-default">Вход</button>
            <button type="reset" class="btn btn-default">Очистить</button>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <a href="account/restore/">Забыли пароль?</a>
        </div>
    </div>

</form>

<?php footer(); ?>
