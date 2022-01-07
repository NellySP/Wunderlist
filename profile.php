<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>

<h2><?php if (isset($_SESSION['user'])) {
        $name = $_SESSION['user']['name'];
        echo 'Welcome, ' . $name . '!';
    } ?></h2>

<!-- display error messages -->

<?= display_error() ?>

<!-- display user avatar -->
<img src="/uploads/<?= get_profile_picture() ?>" alt="profile picture">
<!-- form to change profile picture -->
<h2>Upload a profile picture!</h2>
<div>
    <form action="/app/users/profile-picture.php" method="post" enctype="multipart/form-data">
        <label for="avatar">Choose a picture to upload</label>
        <input type="file" name="avatar" id="avatar" accept=".jpg, .jpeg" required>
        <button type="submit">Upload image</button>
    </form>
</div>

<!-- form to change username-->
<form action="/app/users/change-username.php" method="post">
    <label for="username">Username</label>
    <input class="form-control" type="username" name="username" id="username" required>
    <small class="form-text">Enter your new username.</small>
    <button type="submit">Save changes</button>

</form>

<!-- form to change email -->
<form action="/app/users/change-email.php" method="post">
    <label for="email">Email</label>
    <p>Your current email: <br><?= ($_SESSION['user']['email']); ?></p>
    <input class="form-control" type="email" name="email" id="email" placeholder="youremail@email.com" required>
    <small class="form-text">Enter your new email adress.</small>
    <button type="submit">Save changes</button>
</form>

<!-- form to change password -->
<form action="/app/users/change-password.php" method="post">
    <label for="password">Password</label>
    <input class="form-control" type="password" name="password" id="password" required>
    <small class="form-text">Enter your new password.</small>
    <button type="submit">Save changes</button>
</form>

<!-- delete user -->
<p>Fill out the form below to delete your account</p>
<small class="form-text">This can not be reversed!</small>

<form action="/app/users/delete.php" method="post">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['user_id'] ?>">
    <div class="mb-3">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="email" required>
    </div>

    <div class="mb-3">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" required>
    </div>

    <button type="submit" name="delete" value="delete">Delete account</button>
</form>




<?php require __DIR__ . '/views/footer.php'; ?>