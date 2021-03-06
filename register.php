<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?= display_error() ?>

<article class="registration-form">
    <h1>Registration</h1>

    <form action="/app/users/register.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username" required>
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email Adress" required>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" required>
        <input id="register-button" type="submit" name="submit" value="Register" class="login-button">
        <p>Already have an account?</p>
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>

</article>

<?php require __DIR__ . '/views/footer.php'; ?>