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
</style>

    <div class="row">
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
    </div>


<?php footer(); ?>
