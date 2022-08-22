<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php
    $session = session();
    $login = $session->getFlashdata('login');
    $username = $session->getFlashdata('username');
    $password = $session->getFlashdata('password');
    ?>



<div class="container w-50 justify-content-center d-flex">
    <div class="position-absolute top-0 w-100 bg-warning half-circle">

    </div>
    <div class="card px-5 py-4 mt-5">
        <h3 class="text-center">Login</h3>
        <hr>
        <?php if ($password) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $password; ?>
        </div>
        <?php } ?>
        <?php if ($username) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $username; ?>
        </div>
        <?php } ?>
        <?php if ($login) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $login; ?>
        </div>
        <?php } ?>
        <form method="post" action="/auth/valid_login">
            <input type="text" name="username" class="form-control mb-3" id="userInput" placeholder="Username" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn btn-success w-100 mt-5" name="login">Login</button>
        </form>
        <p class="text-secondary mt-2">Belum punya akun? Ayo <a href="/auth/register" class="link-primary">Daftar</a>
        </p>
    </div>
</div>
<?= $this->endSection(); ?>