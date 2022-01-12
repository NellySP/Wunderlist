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
                <p><?= ($task['description']); ?></p>
                <p>Due: <?= ($task['deadline']); ?></p>
                <p>Status:<?php task_status($database, $task['id']); ?></p>

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
            </li>
        </ul>
    <?php endforeach; ?>
<?php endif; ?>

<?php require __DIR__ . '/views/footer.php';
