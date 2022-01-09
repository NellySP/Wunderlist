<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>


<!-- display user avatar -->
<img src="/uploads/<?= get_profile_picture() ?>" alt="profile picture">

<h2><?php if (isset($_SESSION['user'])) {
        $name = $_SESSION['user']['name'];
        echo 'Welcome, ' . $name . '!';
    } ?></h2>

<p>Prepare to get organized! Below you'll find all of your lists! Create a list and click on it to add tasks!</p>

<!-- display error messages -->

<?= display_error() ?>

<!-- create new list -->

<form method="post" action="app/posts/create-list.php" class="input_form">
    <input type="text" name="list" id="list" class="list_input">
    <button type="submit" name="submit" class="add_btn">Create new list</button>
</form>

<!-- Error message -->

<?php if (isset($errors)) { ?>
    <p><?php echo $errors; ?></p>
<?php } ?>

<!-- Overview of all existing lists -->

<?php foreach (get_lists($_SESSION['user']['user_id'], $database) as $list) : ?>
    <div class="list-view">
        <ul>
            <li>
                <form action="single-list.php" method="GET">
                    <div class="list">
                        <input type="hidden" name="list-id" id="list-id" value="<?= $list['id'] ?>">
                        <button type="submit" class=""><?= $list['id'] ?></button>
                        <input type="hidden" name="list-name" id="list-name" value="<?= $list['title'] ?>">
                        <button type="submit" class=""><?= $list['title'] ?></button>
                    </div>
                </form>
                <form action="/app/posts/update-list.php" method="post">
                    <div>
                        <label for="title">Rename list</label>
                        <input type="hidden" name="list-id" id="list-id" value="<?= $list['id'] ?>">
                        <button type="submit" class=""><?= $list['id'] ?></button>
                        <input class="form-control" type="text" name="title" id="title" placeholder="enter new title" required>
                    </div>
                    <button type="submit" class="button-main">Update</button>
                </form>
                <form action="/app/posts/delete-list.php" method="post">
                    <input type="hidden" name="list" id="list" value="<?= $list['id'] ?>">
                    <button type="submit" class="delete">X</button>
                </form>
            </li>
        </ul>
    </div>
<?php endforeach; ?>

<?php require __DIR__ . '/views/footer.php'; ?>