<?php

// This page will show up when you click a single list

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>

<!-- Error message -->

<?php if (isset($errors)) { ?>
    <p><?php echo $errors; ?></p>
<?php } ?>

<!-- Display the name of the single chosen list, how tho, do i get it -->
<h2>Listnamn (när jag får tag på det)</h2>

<!-- within the list, create tasks -->

<form method="post" action="app/posts/create-task.php" class="input_form">
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

<h3>Här visas alla tasks när jag får tag på dem</h3>

<?php foreach (get_tasks($_SESSION['user']['user_id'], $database) as $task) : ?>
    <h3><?= ($task['title']); ?></h3>
    <form action="completedtaskellernåt" method="POST">
        <label for="completed"></label>
        <input type="checkbox" name="checkbox" id="checkbox" class="form-control">
    </form>
    <form action="/app/posts/delete-task.php" method="post">
        <input type="hidden" name="task" id="task" value="<?= $task['id'] ?>">
        <button type="submit" class="delete">X</button>
    </form>
<?php endforeach; ?>


<?php require __DIR__ . '/views/footer.php'; ?>