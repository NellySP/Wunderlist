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

<!-- form to change username-->
<form action="/app/users/change-username.php">
    <label for="password">Username</label>
    <input class="form-control" type="password" name="password" id="password" required>
    <small class="form-text">Enter your new username.</small>
    <button type="submit">Save changes</button>
</form>

<!-- form to change email -->
<form action="/app/users/change-email.php">
    <label for="email">Email</label>
    <p>Your current email: <br><?= ($_SESSION['user']['email']); ?></p>
    <input class="form-control" type="email" name="email" id="email" placeholder="youremail@email.com" required>
    <small class="form-text">Enter your new email adress.</small>
    <button type="submit">Save changes</button>
</form>
<?php if (isset($_SESSION['confirms'])) : ?>
    <?php foreach ($_SESSION['confirms'] as $error) : ?>
        <div class="messages">
            <?php echo $confirm; ?>
        </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['confirms']) ?>
<?php endif; ?>

<!-- form to change password -->
<form action="/app/users/change-password.php">
    <label for="password">Password</label>
    <input class="form-control" type="password" name="password" id="password" required>
    <small class="form-text">Enter your new password.</small>
    <button type="submit">Save changes</button>
</form>

<!-- delete user -->
<p>Click here to delete your user profile</p>
<small class="form-text">This can not be reversed!</small>

<form action="/app/users/delete.php">
    <input type="hidden" name="userid-to-delete" value="<?php echo $_SESSION['user'] ?>">
    <button type="submit" name="delete" value="delete">Delete account</button>
</form>


<?php require __DIR__ . '/views/footer.php'; ?>