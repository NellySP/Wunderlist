<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Registration</h1>

    <form class="form" action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username" required />
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email Adress">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>

</article>

<?php require __DIR__ . '/views/footer.php'; ?>