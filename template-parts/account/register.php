<?php head('Регистрация'); ?>

<form class="form-horizontal" enctype="multipart/form-data" role="form" method="post" id="register_form" action="/account/register/">
    <?php messageShow();?>
    <input type="hidden" name="registration_form" value="Y">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Имя</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Имя" required>
        </div>
    </div>
    <div class="form-group">
        <label for="login" class="col-sm-2 control-label">Логин</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="login" name="login" placeholder="Логин" required>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
    </div>
    <div class="form-group">
        <label for="country" class="col-sm-2 control-label">Страна</label>
        <div class="col-sm-10">
            <select name="country" id="country"  class="form-control">
                <option value="1">Украина</option>
                <option value="2">Беларусь</option>
                <option value="3">Казахстан</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Пароль</label>
        <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="password" placeholder="Пароль" required>
        </div>
    </div>
    <div class="form-group">
        <label for="avatar" class="col-sm-2 control-label">Аватар</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Аватар">
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
            <button type="submit" name="register" value="Y" class="btn btn-default">Регистриция</button>
            <button type="reset" class="btn btn-default">Очистить</button>
        </div>
    </div>
</form>
<? footer(); ?>