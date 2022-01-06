<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// to upload an image for the first time

if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $user_id = $_SESSION['user']['user_id'];

    $avatar['name'] = date('Y-m-d') . $avatar['name'];
    $direction = __DIR__ . '/uploads/' . $avatar['name'];

    if ($avatar['type'] !== 'image/jpeg') {
        $_SESSION['errors'][] = 'please choose an image in .jpg or .jpeg';
        redirect('/profile.php');
    } elseif ($avatar['size'] >= 2097152) {
        $_SESSION['errors'][] = 'The image is too big! Please upload an image smaller than 2MB';
        redirect('/profile.php');
    } else {
        move_uploaded_file($avatar['tmp_name'], $direction);
    };

    $avatarPath = '/app/users/uploads/' . $avatar['name'];

    $statement = $database->prepare('INSERT INTO Users (profile_picture) VALUES (:profile_picture) WHERE user_id = :user_id');

    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':profile_picture', $avatarPath, PDO::PARAM_STR);

    $statement->execute();

    redirect('/profile.php');
};

//  to replace image (borde kunna gå att klämma in i tidigare logik? säkert en if-sats) 


if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $user_id = $_SESSION['user']['user_id'];

    $avatar['name'] = date('Y-m-d') . $avatar['name'];
    $direction = __DIR__ . 'uploads/' . $avatar['name'];

    if ($avatar['type'] !== 'image/jpeg') {
        $_SESSION['errors'][] = 'please choose an image in .jpg or .jpeg';
        redirect('/profile.php');
    } elseif ($avatar['size'] >= 2097152) {
        $_SESSION['errors'][] = 'The image is too big! Please upload an image smaller than 2MB';
        redirect('/profile.php');
    } else {
        move_uploaded_file($avatar['tmp_name'], $direction);
    };

    $avatarPath = '/app/users/uploads/' . $avatar['name'];

    $statement  = $database->prepare('UPDATE users SET profile_picture = :profile_picture WHERE user_id = :user_id');
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':profile_picture', $avatar, PDO::PARAM_STR);

    $statement->execute();

    redirect('/profile.php');
};
