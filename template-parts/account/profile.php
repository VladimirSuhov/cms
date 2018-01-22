<?php head('Профиль пользователя'); ?>

<style>
    .user_avatar {
        max-width: 200px;
        margin-bottom: 20px;
    }
    .user_avatar img {
        width: 100%;
    }
    .user_info ul {
        list-style-type: none;
        padding-left: 0;
    }
    .form-horizontal label {
        display: block;
        text-align: left;
        float: none;
        color: #333;
        margin-left: 10px;
    }
</style>

<div class="row">
        <div class="profile">
        <div class="user col-md-3">
            <figure class="user_avatar">
                <img src="/resource/img/noavatar.png" alt="avatar">
            </figure>
            <div class="user_info">
                <ul>
                    <li>ID: <?php echo $_SESSION['USER_ID']; ?> </li>
                    <li>Имя: <?php echo $_SESSION['USER_NAME']; ?> </li>
                    <li>Дата регистрации: <?php echo $_SESSION['USER_REGDATE']; ?> </li>
                    <li>Email: <?php echo $_SESSION['USER_EMAIL']; ?> </li>
                    <li>Страна: <?php echo $_SESSION['USER_COUNTRY']; ?> </li>
                </ul>
            </div>
        </div>

        <div class="clearfix"></div>

            <div class="user_info col-sm-6">
                <form class="form-horizontal" role="form" name="edit_profile" method="post" action="/profile/edit/">
                    <div class="form-group">
                        <label for="email" class="label">Имя</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="" id="name" name="name" placeholder="Имя" required>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="old_pass" class="label">Старый пароль</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="old_pass" value="" id="old_pass" placeholder="Старый пароль">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="new_pass" class="label">Новый пароль</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="new_pass" value="" id="new_pass" placeholder="Новый пароль">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="conform_new_pass" class="label">Повторите овый пароль</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="confirm_new_pass" value="" id="confirm_new_pass" placeholder="Новый пароль">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="submit" name="enter" value="Y" class="btn btn-default">Изменить</button>
                            <button type="reset" class="btn btn-default">Очистить</button>
                        </div>
                    </div>

                </form>
            </div>
    </div>
</div>


<?php footer(); ?>
