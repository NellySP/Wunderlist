<?php

// This page will show up when you click a single list

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>



<h3>Edit List</h3>

<!-- Load functions -->

<?php
$lists = get_single_list($database, $_GET['list-id']);
$id = $_GET['list-id'];

// List name

foreach ($lists as $list) : ?>
    <h2>Title: <?= $list['title'] ?></h2>
<?php endforeach ?>

<!-- display error messages -->

<?= display_error() ?>

<div class="hidden-update-field">
    <form action="/app/posts/update-list.php" method="post">
        <label for="title">Rename list</label>
        <input type="hidden" name="list-id" id="list-id" value="<?= $list['id'] ?>">
        <input class="form-control" type="text" name="title" id="title" placeholder="enter new title" required>
        <button type="submit" class="button-main">Update</button>
</div>
</form>
<form action="/app/posts/delete-list.php" method="post">
    <input type="hidden" name="list" id="list" value="<?= $list['id'] ?>">
    <button type="submit" class="delete">Delete list</button>
</form>

<?php require __DIR__ . '/views/footer.php'; ?>