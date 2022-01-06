<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];

    $avatar['name'] = date('Y-m-d') . $avatar['name'];
    $direction = __DIR__ . '/uploads/' . $avatar['name'];

    if ($avatar['type'] !== 'image/jpeg') {
        echo 'please choose an image in .jpg or .jpeg';
    } elseif ($avatar['size'] >= 2097152) {
        echo 'The image is too big! Please upload an image smaller than 2MB';
    } else {
        move_uploaded_file($avatar['tmp_name'], $direction);
    };
};
$avatarPath = '/app/users/uploads/' . $avatar['name'];

$statement = $database->prepare('INSERT INTO users (profile_picture) VALUES (:profile_picture)');

$statement->bindParam(':profile_picture', $avatarPath, PDO::PARAM_STR);

$statement->execute();

redirect('/profile.php');
