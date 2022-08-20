<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/petugas">Petugas</a></li>
            <li class="breadcrumb-item active">Tambah Data Petugas</li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-lg-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        <strong>Form Petugas</strong>
                    </div>
                    <div class="card-body">
                        <form action="/petugas" method="POST">
                            <?= csrf_field(); ?>
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" id="nama" value="<?= old('nama'); ?>" placeholder="Masukan nama lengkap...">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input  <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" <?= (old('jenis_kelamin') == 'Laki-laki') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="jenis_kelamin1">Laki-laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input  <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" <?= (old('jenis_kelamin') == 'Perempuan') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="jenis_kelamin">Perempuan</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jenis_kelamin'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" id="email" value="<?= old('email'); ?>" placeholder="Masukan email...">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="no_hp" class="col-sm-3 col-form-label">No. HP/WA</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" name="no_hp" id="no_hp" value="<?= old('no_hp'); ?>" placeholder="Masukan nomor hp...">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_hp'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" name="alamat" id="alamat" rows="3"><?= old('alamat'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="role" class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input  <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>" type="radio" name="role" id="role" value="kader" <?= (old('role') == 'Kader') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="role1">Kader</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input  <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>" type="radio" name="role" id="role" value="bidan" <?= (old('role') == 'Bidan') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="role">Bidan</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('role'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" id="password">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password_conf" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control <?= ($validation->hasError('password_conf')) ? 'is-invalid' : ''; ?>" name="password_conf" id="password_conf">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password_conf'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-9 offset-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1" onclick="showPassKader()">
                                        <label class="form-check-label" for="gridCheck1">
                                            Tampilkan Password
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                    <a href="/petugas" class="btn btn-outline-secondary">Kembali</a>
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