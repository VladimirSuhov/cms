<?php head('Новости'); ?>

<div class="cat-menu">
    <a href="/news/category/id/1">Категория 1</a>
    <a href="/news/category/id/2">Категория 2</a>
    <a href="/news/category/id/3">Категория 3</a>
    <a href="/news/category/id/4">Категория 4</a>
</div>

<div class="news-list">
    <div class="row">
        <?php
            if(!$Module || $Module == 'main') {
                $param1 = "SELECT id, name, cat, text, date FROM news ORDER BY id DESC LIMIT 0, 5";
            } elseif ($Module == 'category') {
                $param1 = "SELECT id, name, cat, text, date FROM news WHERE cat = '.$Param[id].' ORDER BY id DESC LIMIT 0, 5";
            }

            $query = mysqli_query($CONNECT, $param1);

            while ($row = mysqli_fetch_assoc($query)):
        ?>
        <div class="news-item">
            <a href="news/category/<?php echo $row['id'] ?>"><h2><?php echo $row['name'] ?></h2></a>
            <p><?php echo $row['date'] ?></p>
            <p><?php echo $row['text'] ?></p>
        </div>
        <?php endwhile;?>
    </div>
</div>

<?php footer(); ?>
