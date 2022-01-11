<?php

// This page will show up when you click a single list

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>

<!-- Load functions -->

<?php
$lists = get_single_list($database, $_GET['list-id']);
$id = $_GET['list-id'];

//  List name

foreach ($lists as $list) : ?>
    <h2><?= $list['title'] ?></h2>
<?php endforeach ?>

<!-- Error message -->

<?php if (isset($errors)) { ?>
    <p><?php echo $errors; ?></p>
<?php } ?>

<!-- within the list, create tasks -->

<form method="post" action="app/posts/create-task.php" class="input_form">
    <input type="hidden" name="list-id" value="<?= htmlspecialchars($_GET['list-id']) ?>">
    <div>
        <label for="task">Title</label>
        <input class="form-control" type="text" name="task" id="task" placeholder="task">
    </div>
    <div>
        <label for="description">Description</label>
        <input class="form-control" type="text" name="description" id="description" placeholder="description of task">
    </div>
    <div>
        <label for="deadline">Deadline</label>
        <input class="form-control" type="date" name="deadline" id="deadline">
    </div>
    <button type="submit" name="submit" class="add_btn">Add Task</button>
</form>

<!-- Display all tasks -->

<h3>Your tasks</h3>

<?php foreach (get_tasks($database, $_GET['list-id']) as $task) : ?>
    <ul>
        <li>
            <h3><?= ($task['title']); ?></h3>
            <p><?= ($task['description']); ?></p>

        </li>
    </ul>
    <form action="/app/posts/task-status.php" method="POST">
        <label for="completed"></label>
        <input type="checkbox" name="checkbox" id="checkbox">
    </form>
<?php endforeach; ?>

<!-- Edit tasks -->

<h3>Edit tasks</h3>

<?php foreach (get_tasks($database, $_GET['list-id']) as $task) : ?>
    <div>

        <ul>
            <li>
                <h3><?= ($task['title']); ?></h3>
                <p><?= ($task['description']); ?></p>
            </li>
        </ul>
    </div>
    <form method="post" action="app/posts/update-task.php" class="input_form">
        <input type="hidden" name="list-id" value="<?= htmlspecialchars($_GET['list-id']) ?>">
        <input class="form-control" type="hidden" name="task-id" id="task-id" value="<?= $task['id'] ?>">
        <input class="form-control" type="hidden" name="task-name" id="task-name" value="<?= $task['title'] ?>">
        <div>
            <label for="task">Title</label>
            <input class="form-control" type="text" name="task" id="task" placeholder="Enter new title">
        </div>
        <div>
            <label for="description">Description</label>
            <input class="form-control" type="text" name="description" id="description" placeholder="enter new description">
        </div>
        <div>
            <label for="deadline">Update deadline</label>
            <input class="form-control" type="date" name="deadline" id="deadline">
        </div>
        <button type="submit" name="submit" class="add_btn">Update Task</button>
    </form>
    <form action="/app/posts/delete-task.php" method="post">
        <input type="hidden" name="task" id="task" value="<?= $task['id'] ?>">
        <button type="submit" class="delete">Delete task</button>
    </form>
<?php endforeach; ?>

<h3>Edit List</h3>

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