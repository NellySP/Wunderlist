<?php

// In this file we add lists to the database

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Create list

if (isset($_POST['list'])) {
    $title = trim(filter_var($_POST['list'], FILTER_SANITIZE_SPECIAL_CHARS));
    $user_id = $_SESSION['user']['user_id'];

    if (empty($_POST['title'])) {
        $_SESSION['errors'][] = "Give your list a name!";
    }
    $statement = $database->prepare('INSERT INTO Lists
    (user_id, title)
    VALUES
    (:user_id, :title)');
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);

    $statement->execute();
}

back();

// Vill ha det såhär. funkar i tasks men inte häå¨r?
// om input är empty ska den inte skapa en list. det funkar.
// men sen skapar den ändå inte en lista fastän jag sätter namn? DET ÄR SKUMT
// funkar tydligen inte i tasks heller

// if ($_POST['list'] === '') {
//     $_SESSION['errors'][] = "Give your list a name!";


//     if (isset($_POST['list'])) {
//         $title = trim($_POST['list']);
//         $user_id = $_SESSION['user']['user_id'];

//         $statement = $database->prepare('INSERT INTO Lists
//     (user_id, title)
//     VALUES
//     (:user_id, :title)');
//         $statement->bindParam(':title', $title, PDO::PARAM_STR);
//         $statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);

//         $statement->execute();
//     }
// }

// redirect('/lists.php');
