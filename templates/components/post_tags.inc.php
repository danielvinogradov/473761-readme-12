<ul class="post__tags">
    <?php foreach ($hashtags as $value): ?>
        <li><a href="#">#<?= $value['name'] ?></a></li>
    <?php endforeach; ?>
</ul>
