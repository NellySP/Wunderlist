<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// vad som ska göras: 
// kolla om en bild satts i formuläret.
// ge den rätt namn
// kolla om bild uppfyller alla krav
// kolla om bild finns i databas, om ja - update
// om nej - insert. varför ska det vara så svårt????
// bilden ska hamna i uploads-mappen. sökvägen i db?

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

    // $_SESSION['user']['avatar'] = $userAvatar;
}

redirect('/profile.php');
