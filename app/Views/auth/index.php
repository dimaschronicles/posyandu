<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title; ?> | Posyandu Kamboja</title>
    <link href="<?= base_url(); ?>/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/css/mystyle.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-secondary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">


                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-body p-5">

                                    <img src="/img/logo.png" class="mx-auto d-block" alt="logo" width="180px">

                                    <h3 class="text-center mt-1 login-title">Posyandu Kamboja</h3>
                                    <p class="fs-6 text-center mb-3">Silahkan login dengan akun anda.</p>

                                    <?= session()->getFlashdata('message'); ?>

                                    <form action="/login" method="POST">
                                        <?= csrf_field(); ?>
                                        <div class="form-floating mb-3">
                                            <input class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" type="email" placeholder="name@example.com" />
                                            <label for="email">Email</label>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" type="password" placeholder="Password" />
                                            <label for="password">Password</label>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="password_login" onclick="showPass()">
                                            <label class="form-check-label" for="password_login">
                                                Tampilkan Password
                                            </label>
                                        </div>
                                        <div class="d-grid gap-2 mb-3">
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                    <div class="small text-center mt-5">&copy;<?= date('Y'); ?> Posyandu Kamboja</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>/js/scripts.js"></script>
</body>

</html>