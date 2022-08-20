<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/ibu">Ibu</a></li>
            <li class="breadcrumb-item active">Tambah Data Ibu</li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <strong>Form Ibu</strong>
                    </div>
                    <div class="card-body">
                        <form action="/ibu" method="POST">
                            <?= csrf_field(); ?>
                            <div class="row mb-3">
                                <label for="nama_petugas" class="col-sm-2 col-form-label"><strong>Petugas</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-plaintext" id="nama_petugas" name="nama_petugas" value="<?= session('nama') ?>">
                                </div>
                            </div>
                            <hr>
                            <input type="hidden" name="id_user" value="<?= session('id_user'); ?>">
                            <div class="row mb-3">
                                <label for="nik_ibu" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control <?= ($validation->hasError('nik_ibu')) ? 'is-invalid' : ''; ?>" name="nik_ibu" id="nik_ibu" value="<?= old('nik_ibu'); ?>" placeholder="Masukan nik ibu...">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nik_ibu'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_ibu" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>" name="nama_ibu" id="nama_ibu" value="<?= old('nama_ibu'); ?>" placeholder="Masukan nama ibu...">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_ibu'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggal_lahir_ibu" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control <?= ($validation->hasError('tanggal_lahir_ibu')) ? 'is-invalid' : ''; ?>" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" value="<?= old('tanggal_lahir_ibu'); ?>" placeholder="Masukan nama ibu...">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal_lahir_ibu'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="suami_ibu" class="col-sm-2 col-form-label">Suami</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('suami_ibu')) ? 'is-invalid' : ''; ?>" name="suami_ibu" id="suami_ibu" value="<?= old('suami_ibu'); ?>" placeholder="Masukan nama suami...">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('suami_ibu'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat_ibu" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control <?= ($validation->hasError('alamat_ibu')) ? 'is-invalid' : ''; ?>" name="alamat_ibu" id="alamat_ibu" rows="3"><?= old('alamat_ibu'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_ibu'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                    <a href="/ibu" class="btn btn-outline-secondary">Kembali</a>
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