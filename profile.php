<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>

<h2>Welcome ($fetchusernamefunctionmaybe)</h2>

<img src="" alt="profile picture">
<!-- form to change profile picture -->
<form action=""></form>

<!-- form to change email -->
<form action=""></form>

<!-- form to change password -->
<form action=""></form>

<!-- delete user -->
<form action="/app/users/delete.php">
    <input type="hidden" name="userid-to-delete" value="<?php echo $userId ?>">
    <input type="submit" name="delete" value="delete">
</form>
<p>Click here to delete your user profile</p>

<?php require __DIR__ . '/views/footer.php'; ?>