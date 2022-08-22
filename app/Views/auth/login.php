<html>

<head>
    <title>Tutorial Login Dan Register</title>
</head>

<body>
    <?php
    $session = session();
    $login = $session->getFlashdata('login');
    $username = $session->getFlashdata('username');
    $password = $session->getFlashdata('password');
    ?>

    <h5>Login</h5>

    <?php if ($username) { ?>
        <p style="color:red"><?php echo $username ?></p>
    <?php } ?>

    <?php if ($password) { ?>
        <p style="color:red"><?php echo $password ?></p>
    <?php } ?>

    <?php if ($login) { ?>
        <p style="color:green"><?php echo $login ?></p>
    <?php } ?>

    <form method="post" action="/auth/valid_login">
        Username: <br>
        <input type="text" name="username" required><br>
        Password: <br>
        <input type="password" name="password" required><br>
        <button type="submit" name="login">Login</button>
    </form>
    <p>
        <a href="/auth/register">Belum punya akun?</a>
    </p>
</body>

</html>