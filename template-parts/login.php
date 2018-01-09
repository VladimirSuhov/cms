<?php head('Вход'); ?>

<form class="form-horizontal" role="form" method="post" action="/login">
    <div class="form-group">
        <label for="login" class="col-sm-2 control-label">Логин</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="login" name="login" placeholder="Логин" required>
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Пароль</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password" placeholder="Пароль" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Запомнить меня
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="enter" value="Y" class="btn btn-default">Вход</button>
            <button type="reset" class="btn btn-default">Очистить</button>
        </div>
    </div>
</form>

<?php footer(); ?>
