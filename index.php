<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<!-- display error messages -->

<?= display_error() ?>

<?php if (!isset($_SESSION['user'])) : ?>
    <p>Welcome to Wunderlist!</p>
    <p>The place where you can create task lists and get yourself organized!</p>
<?php endif; ?>

<?php if (isset($_SESSION['user'])) : ?>

    <!-- display user avatar -->

    <h2><?php if (isset($_SESSION['user'])) {
            $name = $_SESSION['user']['name'];
            echo 'Welcome, ' . $name . '!';
        } ?></h2>

    <img src="/uploads/<?= get_profile_picture() ?>" alt="profile picture">

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
<?php endif; ?>

<?php require __DIR__ . '/views/footer.php';
