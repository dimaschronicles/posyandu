<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/kehadiran">Kehadiran</a></li>
            <li class="breadcrumb-item active">Ubah Data Kehadiran</li>
        </ol>
        <hr>
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-lg-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        <strong>Form Kehadiran</strong>
                    </div>
                    <div class="card-body">
                        <form action="/kehadiran/<?= $kehadiran['id_kehadiran']; ?>" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id_kehadiran" value="<?= $kehadiran['id_kehadiran']; ?>">
                            <div class="row mb-3">
                                <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" name="tanggal" id="tanggal" value="<?= ($kehadiran['tanggal']) ? $kehadiran['tanggal'] : old('tanggal'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="id_balita" class="col-sm-3 col-form-label">Nama Anak</label>
                                <div class="col-sm-9">
                                    <select class="form-select <?= ($validation->hasError('id_balita')) ? 'is-invalid' : ''; ?>" name="id_balita" id="id_balita">
                                        <option value="">Nama Anak/Balita</option>
                                        <?php foreach ($balita as $b) : ?>
                                            <option value="<?= $b['id_balita']; ?>" <?= ($kehadiran['id_balita'] == $b['id_balita']) ? 'selected' : old('id_balita'); ?>><?= $b['nama_balita']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_balita'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_pengantar" class="col-sm-3 col-form-label">Pengantar</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_pengantar')) ? 'is-invalid' : ''; ?>" name="nama_pengantar" id="nama_pengantar" value="<?= ($kehadiran['nama_pengantar']) ? $kehadiran['nama_pengantar'] : old('nama_pengantar'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_pengantar'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="hub_keluarga" class="col-sm-3 col-form-label">Hubungan Keluarga</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= ($validation->hasError('hub_keluarga')) ? 'is-invalid' : ''; ?>" name="hub_keluarga" id="hub_keluarga" value="<?= ($kehadiran['hub_keluarga']) ? $kehadiran['hub_keluarga'] : old('hub_keluarga'); ?>" placeholder="Contoh : Nenek">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('hub_keluarga'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" name="alamat" id="alamat" rows="3"><?= ($kehadiran['alamat_kehadiran']) ? $kehadiran['alamat_kehadiran'] : old('alamat_kehadiran'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input  <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" type="radio" name="keterangan" id="keterangan" value="Hadir" <?= ($kehadiran['keterangan'] == 'Hadir') ? 'checked' : old('keterangan'); ?>>
                                        <label class="form-check-label" for="keterangan1">Hadir</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input  <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" type="radio" name="keterangan" id="keterangan" value="Tidak Hadir" <?= ($kehadiran['keterangan'] == 'Tidak Hadir') ? 'checked' : old('keterangan'); ?>>
                                        <label class="form-check-label" for="keterangan2">Tidak Hadir</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                                    <a href="/kehadiran" class="btn btn-outline-secondary">Kembali</a>
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