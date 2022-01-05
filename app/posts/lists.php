<?php

// In this file we add lists to the database

//  här måste jag hämta använadid. så nåt i stil med
// fetch user_id from users where email like the one that is inloggad

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['submit'])) {
    if (empty($_POST['title'])) {
        $_SESSION['errors'][] = "Give your list a name!";
    } else {
        $statement = $database->prepare('INSERT INTO Lists
            (user_id, title)
            VALUES
            (:user_id, :title');

        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);

        $statement->execute();
        redirect('/lists.php');
    }
}
