<?php head('Восстановление пароля'); ?>

<form class="form-horizontal" role="form" name="login_form" method="post" action="/account/reset/">
    <input type="hidden" name="login_form" value="Y">
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" value="" id="email" name="email" placeholder="Email" required>
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
            <button type="submit" name="enter" value="Y" class="btn btn-default">Отправить</button>
            <button type="reset" class="btn btn-default">Очистить</button>
        </div>
    </div>
</form>

<?php footer(); ?>
