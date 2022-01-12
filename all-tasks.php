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
            <p>Due: <?= ($task['deadline']); ?></p>
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
    <form action="/app/posts/delete-task.php" method="post">
        <input type="hidden" name="task" id="task" value="<?= $task['id'] ?>">
        <button type="submit" class="delete">Delete task</button>
    </form>
<?php endforeach; ?>

<?php require __DIR__ . '/views/footer.php';
