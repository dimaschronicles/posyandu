<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/petugas">Petugas</a></li>
            <li class="breadcrumb-item active">Edit Data Petugas</li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-lg-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        <strong>Form Petugas</strong>
                    </div>
                    <div class="card-body">
                        <form action="/petugas/<?= $petugas['id_user']; ?>" method="POST">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id_user" value="<?= $petugas['id_user']; ?>">
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" id="nama" value="<?= ($petugas['nama']) ? $petugas['nama'] : old('nama'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" <?= ($petugas['jenis_kelamin'] == 'Laki-laki') ? 'checked' : old('jenis_kelamin'); ?>>
                                        <label class="form-check-label" for="jenis_kelamin1">Laki-laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input  <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" <?= ($petugas['jenis_kelamin'] == 'Perempuan') ? 'checked' : old('jenis_kelamin'); ?>>
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
                                    <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" id="email" value="<?= ($petugas['email']) ? $petugas['email'] : old('email'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="no_hp" class="col-sm-3 col-form-label">No. HP/WA</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" name="no_hp" id="no_hp" value="<?= ($petugas['no_hp']) ? $petugas['no_hp'] : old('no_hp'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_hp'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" name="alamat" id="alamat" rows="3"><?= ($petugas['alamat']) ? $petugas['alamat'] : old('alamat'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="role" class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input  <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>" type="radio" name="role" id="role" value="kader" <?= ($petugas['role'] == 'kader') ? 'checked' : old('role'); ?>>
                                        <label class="form-check-label" for="role1">Kader</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input  <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>" type="radio" name="role" id="role" value="bidan" <?= ($petugas['role'] == 'bidan') ? 'checked' : old('role'); ?>>
                                        <label class="form-check-label" for="role">Bidan</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('role'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary">Ubah Data</button>
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