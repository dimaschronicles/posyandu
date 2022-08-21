<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Profil Pengguna</li>
        </ol>
        <hr>

        <?= session()->getFlashdata('message'); ?>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="img mt-3">
                        <img src="/img/user.png" class="img-thumbnail rounded-circle" width="200px">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['nama'] ?></h5>
                        <p class="card-text"><?= $user['email'] ?> | <?= $user['no_hp'] ?></p>
                        <a href="/profil/editprofil" class="btn btn-primary">Edit Profil</a>
                        <a href="#" class="btn btn-danger">Ganti Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>