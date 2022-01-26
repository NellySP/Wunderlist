<?php

// This page will show up when you click a single list

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>

<!-- Edit list -->
<form action="/edit-list.php" method="GET" class="input-form">
    <div>
        <input class="form-control" type="hidden" name="list-id" id="list-id" value="<?= $list['id'] ?>">
        <input class="form-control" type="hidden" name="list-name" id="list-name" value="<?= $list['title'] ?>">
        <button type="submit">Edit List</button>
    </div>
</form>

<form action="app/posts/complete-list.php" method="GET" class="input-form">
    <div>
        <input class="form-control" type="hidden" name="list-id" id="list-id" value="<?= $_GET['list-id'] ?>">
        <input class="form-control" type="hidden" name="list-name" id="list-name" value="<?= $list['title'] ?>">
        <button type="submit">Complete All</button>
    </div>
</form>


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

<!-- display error messages -->

<?= display_error() ?>

<h4>Add task below</h4>

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
            <p>Due: <?= ($task['deadline']); ?></p>
            <p>Status:<?php task_status($database, $task['id']); ?></p>
            <!-- Edit tasks -->
            <form action="/edit-task.php" method="GET" class="input-form">
                <div>
                    <input class="form-control" type="hidden" name="list-id" id="list-id" value="<?= $id ?>">
                    <input class="form-control" type="hidden" name="task-id" id="task-id" value="<?= $task['id'] ?>">
                    <input class="form-control" type="hidden" name="task-name" id="task-name" value="<?= $task['title'] ?>">
                    <button> Edit task </button>
                </div>
            </form>
        </li>
    </ul>
<?php endforeach; ?>

<?php require __DIR__ . '/views/footer.php'; ?>
