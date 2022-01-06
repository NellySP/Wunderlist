<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Fatal error: Uncaught PDOException: SQLSTATE[HY000]: General error: 25 column index out of range in /Users/nellypetren/Documents/GitHub/Wunderlist/app/users/change-password.php:16 Stack trace: #0 /Users/nellypetren/Documents/GitHub/Wunderlist/app/users/change-password.php(16): PDOStatement->execute() #1 {main} thrown in /Users/nellypetren/Documents/GitHub/Wunderlist/app/users/change-password.php on line 16

if (isset($_POST['password'])) {
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_id = $_SESSION['user']['user_id'];

    $statement = $database->prepare('UPDATE Users SET password = :password WHERE user_id = :user_id');

    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

    $statement->execute();
    redirect('/profile.php');
}
