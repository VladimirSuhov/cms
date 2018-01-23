<?php head('Чат'); ?>

<?php

?>

<style>
    .chat-messages {
        border: 1px solid slategray;
        width: 100%;
        height: 350px;
        overflow-y: scroll;
    }
</style>

<div class="chatbox">
    <div class="chat-messages col-sm-10">

    </div>
<form class="form-horizontal" role="form" name="login_form" method="post" action="/account/login/">
    <div class="form-group">
        <div class="col-sm-10">
            <textarea name="text" placeholder="Текст сообщения" cols="10" rows="10" class="form-control" required></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="enter" value="Y" class="btn btn-default">Отправить</button>
            <button type="reset" class="btn btn-default">Очистить</button>
        </div>
    </div>

</div>
</form>

<?php footer(); ?>
