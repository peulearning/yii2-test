<?php foreach ($posts as $post): ?>
    <h2><?= $post->title ?></h2>
    <p>By: <?= $post->user->username ?></p>
    <p><?= $post->content ?></p>
<?php endforeach; ?>
