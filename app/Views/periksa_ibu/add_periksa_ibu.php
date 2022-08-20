<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/periksabalita">Pemeriksaan Balita</a></li>
            <li class="breadcrumb-item active">Tambah Data Pemeriksaan Balita</li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <strong>Form Pemeriksaan Balita</strong>
                    </div>
                    <div class="card-body">
                        <form action="/periksabalita" method="POST">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id_user" value="<?= session('id_user'); ?>">
                            <div class="row mb-3">
                                <label for="nama_petugas" class="col-sm-2 col-form-label"><strong>Petugas</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-plaintext" id="nama_petugas" name="nama_petugas" value="<?= session('nama') ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <label for="tanggal_periksa" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control <?= ($validation->hasError('tanggal_periksa')) ? 'is-invalid' : ''; ?>" id="tanggal_periksa" name="tanggal_periksa" value="<?= old('tanggal_periksa'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal_periksa'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="id_balita" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <select class="form-select <?= ($validation->hasError('id_balita')) ? 'is-invalid' : ''; ?>" id="id_balita" name="id_balita">
                                        <option value="">=== Nama Balita & Ibu ===</option>
                                        <?php foreach ($balita as $b) : ?>
                                            <option value="<?= $b['id_balita']; ?>" <?= (old('id_balita') == $b['id_balita']) ? 'selected' : ''; ?>><?= $b['nama_balita']; ?> | <?= $b['nama_ibu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_balita'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tb_periksa" class="col-sm-2 col-form-label">Tinggi Badan</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control <?= ($validation->hasError('tb_periksa')) ? 'is-invalid' : ''; ?>" name="tb_periksa" id="tb_periksa" placeholder="Masukan tinggi badan..." value="<?= old('tb_periksa'); ?>">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tb_periksa'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="bb_periksa" class="col-sm-2 col-form-label">Berat Badan</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control <?= ($validation->hasError('bb_periksa')) ? 'is-invalid' : ''; ?>" name="bb_periksa" id="bb_periksa" placeholder="Masukan berat badan..." value="<?= old('bb_periksa'); ?>">
                                        <span class="input-group-text" id="basic-addon2">kg</span>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('bb_periksa'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lk_periksa" class="col-sm-2 col-form-label">Lingkar Kepala</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control <?= ($validation->hasError('lk_periksa')) ? 'is-invalid' : ''; ?>" name="lk_periksa" id="lk_periksa" placeholder="Masukan lingkar kepala..." value="<?= old('lk_periksa'); ?>">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('lk_periksa'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="id_vitamin" class="col-sm-2 col-form-label">Vitamin</label>
                                <div class="col-sm-10">
                                    <select class="form-select <?= ($validation->hasError('id_vitamin')) ? 'is-invalid' : ''; ?>" id="id_vitamin" name="id_vitamin">
                                        <option value="">=== Pilih Vitamin ===</option>
                                        <option value="-" <?= (old('id_vitamin') == '-') ? 'selected' : ''; ?>>-</option>
                                        <?php foreach ($vitamin as $value) : ?>
                                            <option value="<?= $value['id_vitamin']; ?>" <?= (old('id_vitamin') == $value['id_vitamin']) ? 'selected' : ''; ?>><?= $value['nama_vitamin']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_vitamin'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="keterangan_periksa" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control <?= ($validation->hasError('keterangan_periksa')) ? 'is-invalid' : ''; ?>" id="keterangan_periksa" name="keterangan_periksa" rows="3"><?= old('keterangan_periksa'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan_periksa'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                    <a href="/periksabalita" class="btn btn-outline-secondary">Kembali</a>
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