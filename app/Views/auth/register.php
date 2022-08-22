<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php
    $session = session();
    $error = $session->getFlashdata('error');
    ?>



<div class="container w-50 justify-content-center d-flex">
    <div class="position-absolute top-0 w-100 bg-warning half-circle">

    </div>
    <div class="card px-5 py-4 mt-5">
        <h3 class="text-center">Register</h3>
        <hr>
        <?php if ($error) { ?>
        <p style="color:red">Terjadi Kesalahan:
        <ul>
            <?php foreach ($error as $e) { ?>
            <li><?php echo $e ?></li>
            <?php } ?>
        </ul>
        </p>
        <?php } ?>
        <form method="post" action="/auth/valid_register">
            <input type="text" name="username" class="form-control" id="userInput" placeholder="Username" required>
            <input type="password" name="password" class="form-control my-3" placeholder="Password" required>
            <input type="password" name="confirm" class="form-control" placeholder="Confirm Password" required>
            <button type="submit" class="btn btn-success w-100 mt-4" name="login">Register</button>
        </form>
        <p class="text-secondary mt-2">Sudah punya akun? Silahkan <a href="/auth/login" class="link-primary">Login</a>
        </p>
    </div>
</div>
<?= $this->endSection(); ?>