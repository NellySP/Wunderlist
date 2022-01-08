<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>


<!-- display user avatar -->
<img src="/uploads/<?= get_profile_picture() ?>" alt="profile picture">

<h2><?php if (isset($_SESSION['user'])) {
        $name = $_SESSION['user']['name'];
        echo 'Welcome, ' . $name . '!';
    } ?></h2>

<p>Prepare to get organized! Below you'll find all of your lists and tasks!</p>

<!-- display error messages -->

<?= display_error() ?>

<!-- create new list -->

<form method="post" action="app/posts/lists.php" class="input_form">
    <input type="text" name="list" id="list" class="list_input">
    <button type="submit" name="submit" class="add_btn">Create new list</button>
</form>

<!-- within the list, create new task -->

<form method="post" action="app/posts/tasks.php" class="input_form">
    <input type="text" name="task" id="task" class="task_input">
    <button type="submit" name="submit" class="add_btn">Add Task</button>
</form>

<!-- Error message -->

<?php if (isset($errors)) { ?>
    <p><?php echo $errors; ?></p>
<?php } ?>

<!-- Overview of all current lists, spara i variabel och eka ut? blir det en array kanske? ja det borde det bli. -->


<?php
foreach (fetch_lists($_SESSION['user']['user_id'], $database) as $list) : ?>
    <div class="list-container">
        <form action="list.php" method="GET">
            <div class="list">
                <input type="hidden" name="list-page" id="list-page" value="<?= $list['id'] ?>">
                <input type="hidden" name="list-name" id="list-name" value="<?= $list['title'] ?>">
                <button type="submit" class="button-list"><?= $list['title'] ?></button>
            </div>
    </div>
<?php endforeach; ?>

<?php require __DIR__ . '/views/footer.php'; ?>