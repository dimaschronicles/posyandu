<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/imunisasibalita">Imunisasi Balita</a></li>
            <li class="breadcrumb-item active">Ubah Data Imunisasi Balita</li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <strong>Form Imunisasi Balita</strong>
                    </div>
                    <div class="card-body">
                        <form action="/imunisasibalita/<?= $imunisasiBalita['id_imunisasi_balita']; ?>" method="POST">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id_imunisasi_balita" value="<?= $imunisasiBalita['id_imunisasi_balita']; ?>">
                            <input type="hidden" name="id_user" value="<?= session('id_user'); ?>">
                            <div class="row mb-3">
                                <label for="nama_petugas" class="col-sm-2 col-form-label"><strong>Petugas</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-plaintext" id="nama_petugas" name="nama_petugas" value="<?= session('nama') ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <label for="tanggal_imunisasi" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="tanggal_imunisasi" name="tanggal_imunisasi" value="<?= ($imunisasiBalita['tanggal_imunisasi']) ? $imunisasiBalita['tanggal_imunisasi'] : old('tanggal_imunisasi') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal_imunisasi'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="id_balita" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <select class="form-select <?= ($validation->hasError('id_balita')) ? 'is-invalid' : ''; ?>" id="id_balita" name="id_balita">
                                        <option value="">=== Nama Balita & Ibu ===</option>
                                        <?php foreach ($balita as $b) : ?>
                                            <option value="<?= $b['id_balita']; ?>" <?= ($imunisasiBalita['id_balita'] == $b['id_balita']) ? 'selected' : old('id_balita'); ?>><?= $b['nama_balita']; ?> | <?= $b['nama_ibu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_balita'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row mb-3">
                                <label for="nama_ibu" class="col-sm-2 col-form-label">Nama Ibu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama ibu..." readonly>
                                </div>
                            </div> -->
                            <div class="row mb-3">
                                <label for="id_imunisasi" class="col-sm-2 col-form-label">Jenis Imunisasi</label>
                                <div class="col-sm-10">
                                    <select class="form-select <?= ($validation->hasError('id_imunisasi')) ? 'is-invalid' : ''; ?>" id="id_imunisasi" name="id_imunisasi">
                                        <option value="">=== Pilih Imunisasi ===</option>
                                        <?php foreach ($imunisasi as $i) : ?>
                                            <option value="<?= $i['id_imunisasi']; ?>" <?= ($imunisasiBalita['id_imunisasi'] == $i['id_imunisasi']) ? 'selected' : old('id_imunisasi'); ?>><?= $i['nama_imunisasi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_imunisasi'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="keterangan_imunisasi" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control <?= ($validation->hasError('keterangan_imunisasi')) ? 'is-invalid' : ''; ?>" id="keterangan_imunisasi" name="keterangan_imunisasi" rows="3"><?= ($imunisasiBalita['keterangan_imunisasi']) ? $imunisasiBalita['keterangan_imunisasi'] : old('keterangan_imunisasi') ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan_imunisasi'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                                    <a href="/imunisasibalita" class="btn btn-outline-secondary">Kembali</a>
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