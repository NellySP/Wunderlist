<?php

// This page will show up when you click a single list

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>

<!-- Error message -->

<?php if (isset($errors)) { ?>
    <p><?php echo $errors; ?></p>
<?php } ?>

<!-- Display the name of the current list -->
<h1><?= get_list_name($database); ?></h1>

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
        </li>
    </ul>
    <form action="completedtaskellernåt" method="POST">
        <label for="completed"></label>
        <input type="checkbox" name="checkbox" id="checkbox">
    </form>
    <form action="/app/posts/delete-task.php" method="post">
        <input type="hidden" name="task" id="task" value="<?= $task['id'] ?>">
        <button type="submit" class="delete">X</button>
    </form>
<?php endforeach; ?>


<?php require __DIR__ . '/views/footer.php'; ?>