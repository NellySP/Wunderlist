<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>

<h2><?php if (isset($_SESSION['user'])) {
        $name = $_SESSION['user']['name'];
        echo 'Welcome, ' . $name . '!';
    } ?></h2>

<img src="" alt="profile picture">
<!-- form to change profile picture -->
<form action=""></form>

<!-- form to change email -->
<p>Current email: <?= ($_SESSION['user']['email']); ?></p>
<form action="/app/users/change-email.php">
    <label for="email">Email</label>
    <input class="form-control" type="email" name="email" id="email" placeholder="youremail@email.com" required>
    <small class="form-text">Enter your new email adress.</small>
</form>

<!-- form to change password -->
<form action="/app/users/change-password.php">
    <label for="password">Password</label>
    <input class="form-control" type="password" name="password" id="password" required>
    <small class="form-text">Enter your new password.</small>
</form>

<!-- delete user -->
<form action="/app/users/delete.php">
    <input type="hidden" name="userid-to-delete" value="<?php echo $_SESSION['user'] ?>">
    <button type="submit" name="delete" value="delete">
</form>
<p>Click here to delete your user profile</p>


<?php require __DIR__ . '/views/footer.php'; ?>