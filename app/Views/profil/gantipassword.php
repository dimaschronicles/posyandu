<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/profil">Profil</a></li>
            <li class="breadcrumb-item active">Ganti Password</li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-lg-8 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="/profil/updatepassword" method="POST">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id_user" value="<?= session('id_user'); ?>">
                            <div class="row mb-3">
                                <label for="current_password" class="col-sm-3 col-form-label">Password Saat Ini</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control <?= ($validation->hasError('current_password')) ? 'is-invalid' : ''; ?>" name="current_password" id="current_password" placeholder=" Masukan password saat ini...">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('current_password'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="new_password" class="col-sm-3 col-form-label">Password Baru</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control <?= ($validation->hasError('new_password')) ? 'is-invalid' : ''; ?>" name="new_password" id="new_password" placeholder=" Masukan password baru...">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('new_password'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="new_password_conf" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control <?= ($validation->hasError('new_password_conf')) ? 'is-invalid' : ''; ?>" name="new_password_conf" id="new_password_conf" placeholder=" Masukan konfirmasi password baru...">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('new_password_conf'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-9 offset-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="show_pass" name="show_pass" onclick="showPassChangePass()">
                                        <label class="form-check-label" for="show_pass">
                                            Tampilkan Password
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary">Simpan Password</button>
                                    <a href="/profil" class="btn btn-outline-secondary">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>