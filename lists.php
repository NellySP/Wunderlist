<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>


<h2>Prepare to get organized! </h2>
<p>Below you'll find all of your lists! Create a list and click on it to add tasks!</p>

<!-- display error messages -->

<?= display_error() ?>

<!-- create new list -->

<form method="post" action="app/posts/create-list.php" class="input_form">
    <input class="form-control" type="text" name="list" id="list" class="list_input">
    <button class="form-control" type="submit" name="submit" class="add_btn">Create new list</button>
</form>

<!-- Overview of all existing lists -->

<h3>Your lists</h3>

<?php foreach (get_lists($_SESSION['user']['user_id'], $database) as $list) : ?>
    <div class="list-view">
        <ul>
            <li>
                <form action="single-list.php" method="GET" class="input-form">
                    <div>
                        <input class="form-control" type="hidden" name="list-id" id="list-id" value="<?= $list['id'] ?>">
                        <input class="form-control" type="hidden" name="list-name" id="list-name" value="<?= $list['title'] ?>">
                        <button class="form-control" type="submit" class=""><?= $list['title'] ?></button>
                    </div>
                </form>
            </li>
        </ul>
    </div>
<?php endforeach; ?>

<?php require __DIR__ . '/views/footer.php'; ?>