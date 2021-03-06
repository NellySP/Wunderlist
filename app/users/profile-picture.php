<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// in this file we upload and replace user profile picture

// check if image exists in form, if yes set a variable and specify filename

if (isset($_FILES['avatar'])) {
    $avatarFile = $_FILES['avatar'];
    $avatarName = date('ymd') . '-' . $avatarFile['name'];

    // Set path to where the file should upload

    $path = __DIR__ . '/../../uploads/';
    $destination = $path . $avatarName;

    move_uploaded_file($avatarFile['tmp_name'], $destination);

    // insert the avatarname in to the db

    $statement  = $database->prepare('UPDATE users SET profile_picture = :avatar WHERE user_id = :user_id');
    $statement->bindParam(':user_id', $_SESSION['user']['user_id'], PDO::PARAM_INT);
    $statement->bindParam(':avatar', $avatarName, PDO::PARAM_STR);
    $statement->execute();
    $_SESSION['user']['profile_picture'] = $avatarName;
}

back();
