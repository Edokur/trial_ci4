<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce | <?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
    <script src="<?= base_url('assets/js/app.js'); ?>"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg w-75 mx-auto">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">E-Commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>

                </ul>
                <ul class="navbar-nav gap-3">
                    <li class="nav-item">
                        <a href="register" class="btn btn-outline-primary">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="login" class="btn btn-primary">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?= $this->renderSection('content') ?>

</body>
</html>