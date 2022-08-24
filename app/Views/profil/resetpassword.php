<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/profil">Profil</a></li>
            <li class="breadcrumb-item active">Reset Password</li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-lg-8 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="/profil/updateresetpassword" method="POST">
                            <?= csrf_field(); ?>
                            <div class="row mb-3">
                                <label for="email_reset" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <select class="form-select <?= ($validation->hasError('email_reset')) ? 'is-invalid' : ''; ?>" id="email_reset" name="email_reset">
                                        <option value="">=== Email ===</option>
                                        <?php foreach ($email as $value) : ?>
                                            <option value="<?= $value['email']; ?>" <?= (old('email_reset') == $value['email']) ? 'selected' : ''; ?>><?= $value['email']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email_reset'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-sm-3 col-form-label">Password Baru</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder=" Masukan password...">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password_conf" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control <?= ($validation->hasError('password_conf')) ? 'is-invalid' : ''; ?>" name="password_conf" id="password_conf" placeholder=" Masukan konfirmasi password...">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password_conf'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-9 offset-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="show_pass" name="show_pass" onclick="showPassReset()">
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