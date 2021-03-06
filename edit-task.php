<?php

// This page will show up when you click a single list

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>

<!-- Edit tasks -->

<h2>Edit task</h2>

<?php
$tasks = get_single_task($database, $_GET['task-id']);
$id = $_GET['task-id'];

//  List name

foreach ($tasks as $task) : ?>
    <h3><?= $task['title'] ?></h3>
<?php endforeach ?>

<ul>
    <li>
        <p><?= ($task['description']); ?></p>
        <p>Due:<?= ($task['deadline']); ?></p>
        <p>Status:<?php task_status($database, $task['id']); ?></p>
    </li>
</ul>


<!-- Form to mark task as done -->
<form action="/app/posts/task-status.php" method="POST">
    <input type="hidden" name="id" value="<?= $task['id'] ?>">
    <input type="hidden" name="list" id="list" value="<?= $task['list_id'] ?>">
    <label for="checkbox">done</label>
    <input type="checkbox" name="checkbox" id="checkbox">
    <button type="submit">Submit</button>
</form>
<!-- Form to mark task as undone -->
<form action="/app/posts/task-status.php" method="POST">
    <input type="hidden" name="id-undone" value="<?= $task['id'] ?>">
    <input type="hidden" name="list" id="list" value="<?= $task['list_id'] ?>">
    <label for="checkbox-undone">Not done</label>
    <input type="checkbox" name="checkbox-undone" id="checkbox-undone">
    <button type="submit">Submit</button>
</form>

<!-- display error messages -->

<?= display_error() ?>

<form method="post" action="app/posts/update-task.php" class="input_form">
    <input class="form-control" type="hidden" name="list-id" id="list-id" value="<?= $list_id ?>">
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

<?php require __DIR__ . '/views/footer.php'; ?>