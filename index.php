<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<!-- display error messages -->

<?= display_error() ?>

<p>Welcome to Wunderlist!</p>
<p>The place where you can create task lists and get yourself organized!</p>

om inloggad

visa profilbild, välkommen namn, dölj ovan,
visa alla tasks due today.

alternativ för att visa alla tasks?

<h2>Tasks due today:</h2>

<?php foreach (tasks_due_today($database) as $task) : ?>
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

<?php require __DIR__ . '/views/footer.php';
