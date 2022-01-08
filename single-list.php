<?php

// This page will show up when you click a single list

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>

<!-- Error message -->

<?php if (isset($errors)) { ?>
    <p><?php echo $errors; ?></p>
<?php } ?>

<!-- within the list, create tasks -->

<form method="post" action="app/posts/tasks.php" class="input_form">
    <input type="text" name="task" id="task" class="task_input">
    <button type="submit" name="submit" class="add_btn">Add Task</button>
</form>

<!-- Display all tasks -->

<?php foreach (get_tasks($_SESSION['user']['user_id'], $database) as $task) : ?>

    <h3><?= ($task['title']); ?></h3>
<?php endforeach; ?>


<?php require __DIR__ . '/views/footer.php'; ?>