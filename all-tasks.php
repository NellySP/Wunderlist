<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<!-- display error messages -->

<?= display_error() ?>

<h2>Look at all of your tasks!</h2>

<?php foreach (get_all_tasks($database) as $task) : ?>
    <ul>
        <li>
            <h3><?= ($task['title']); ?></h3>
        </li>
    </ul>
    <form action="completedtaskellernåt" method="POST">
        <label for="completed"></label>
        <input type="checkbox" name="checkbox" id="checkbox">
    </form>
<?php endforeach; ?>

<?php require __DIR__ . '/views/footer.php';
