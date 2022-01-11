<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we update tasks completed status

$list_id = $_POST['list-id'];
$user_id = $_SESSION['user']['user_id'];
$id = ($_POST['task-id']);

// if lådan är icheckad (true)
// if else (false)