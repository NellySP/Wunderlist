<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>

<!-- display error messages -->

<?= display_error() ?>

<!-- display user avatar -->
<img src="/uploads/<?= get_profile_picture() ?>" alt="profile picture">

<h2><?php if (isset($_SESSION['user'])) {
        $name = $_SESSION['user']['name'];
        echo 'Welcome, ' . $name . '!';
    } ?></h2>

<!-- create new list -->

<form method="post" action="posts/lists.php" class="input_form">
    <input type="text" name="list" class="list_input">
    <button type="submit" name="submit" class="add_btn">Create list</button>
</form>

<!-- within the list, create new task -->

<form method="post" action="posts/tasks.php" class="input_form">
    <input type="text" name="task" class="task_input">
    <button type="submit" name="submit" class="add_btn">Add Task</button>
</form>

<!-- Error message -->

<?php if (isset($errors)) { ?>
    <p><?php echo $errors; ?></p>
<?php } ?>

<!-- Overview of all current lists -->

<?php $statement = $database->prepare("SELECT * FROM lists");

$statement->execute();

$lists = $statement->fetchAll(PDO::FETCH_ASSOC); ?>

<?php require __DIR__ . '/views/footer.php'; ?>