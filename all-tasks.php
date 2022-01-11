<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<!-- display error messages -->

<?= display_error() ?>

<h2>Look at all those tasks!</h2>

<?php foreach (get_all_tasks($database) as $task) : ?>
    <ul>
        <li>
            <h3><?= ($task['title']); ?></h3>
            <p><?= ($task['description']); ?></p>
            <p>Due:<?= ($task['deadline']); ?></p>
        </li>
    </ul>
    <form action="/app/posts/task-status.php" method="POST">
        <label for="completed"></label>
        <input type="checkbox" name="checkbox" id="checkbox">
    </form>
    <form action="/app/posts/delete-task.php" method="post">
        <input type="hidden" name="task" id="task" value="<?= $task['id'] ?>">
        <button type="submit" class="delete">X</button>
    </form>
<?php endforeach; ?>

<?php require __DIR__ . '/views/footer.php';
