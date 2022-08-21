<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/periksaibu">Pemeriksaan Ibu Hamil</a></li>
            <li class="breadcrumb-item active">Tambah Data Pemeriksaan Ibu Hamil</li>
        </ol>
        <hr>
        <div class="row mb-3">
            <div class="col-lg-9">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <strong>Form Pemeriksaan Ibu Hamil</strong>
                    </div>
                    <div class="card-body">
                        <form action="/periksaibu" method="POST">
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
                                <label for="tanggal_periksa_ibu" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control <?= ($validation->hasError('tanggal_periksa_ibu')) ? 'is-invalid' : ''; ?>" id="tanggal_periksa_ibu" name="tanggal_periksa_ibu" value="<?= old('tanggal_periksa_ibu'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal_periksa_ibu'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="id_ibu" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <select class="form-select <?= ($validation->hasError('id_ibu')) ? 'is-invalid' : ''; ?>" id="id_ibu" name="id_ibu">
                                        <option value="">=== Nama Ibu ===</option>
                                        <?php foreach ($ibu as $value) : ?>
                                            <option value="<?= $value['id_ibu']; ?>" <?= (old('id_ibu') == $value['id_ibu']) ? 'selected' : ''; ?>><?= $value['nama_ibu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_ibu'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="uk_periksa_ibu" class="col-sm-2 col-form-label">Usia Kandungan</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control <?= ($validation->hasError('uk_periksa_ibu')) ? 'is-invalid' : ''; ?>" name="uk_periksa_ibu" id="uk_periksa_ibu" placeholder="Masukan usia kandungan..." value="<?= old('uk_periksa_ibu'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('uk_periksa_ibu'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="bb_periksa_ibu" class="col-sm-2 col-form-label">Berat Badan</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control <?= ($validation->hasError('bb_periksa_ibu')) ? 'is-invalid' : ''; ?>" name="bb_periksa_ibu" id="bb_periksa_ibu" placeholder="Masukan berat badan..." value="<?= old('bb_periksa_ibu'); ?>">
                                        <span class="input-group-text" id="basic-addon2">kg</span>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('bb_periksa_ibu'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lila_periksa_ibu" class="col-sm-2 col-form-label">Lingkar Lengan</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control <?= ($validation->hasError('lila_periksa_ibu')) ? 'is-invalid' : ''; ?>" name="lila_periksa_ibu" id="lila_periksa_ibu" placeholder="Masukan lingkar lengan..." value="<?= old('lila_periksa_ibu'); ?>">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('lila_periksa_ibu'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tfundus_periksa_ibu" class="col-sm-2 col-form-label">Tinggi Fundus</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control <?= ($validation->hasError('tfundus_periksa_ibu')) ? 'is-invalid' : ''; ?>" name="tfundus_periksa_ibu" id="tfundus_periksa_ibu" placeholder="Masukan tinggi fundus..." value="<?= old('tfundus_periksa_ibu'); ?>">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tfundus_periksa_ibu'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="id_imunisasi" class="col-sm-2 col-form-label">Imunisasi</label>
                                <div class="col-sm-10">
                                    <select class="form-select <?= ($validation->hasError('id_imunisasi')) ? 'is-invalid' : ''; ?>" id="id_imunisasi" name="id_imunisasi">
                                        <option value="">=== Pilih Imunisasi ===</option>
                                        <?php foreach ($imunisasi as $value) : ?>
                                            <option value="<?= $value['id_imunisasi']; ?>" <?= (old('id_imunisasi') == $value['id_imunisasi']) ? 'selected' : ''; ?>><?= $value['nama_imunisasi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_imunisasi'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="id_vitamin" class="col-sm-2 col-form-label">Vitamin</label>
                                <div class="col-sm-10">
                                    <select class="form-select <?= ($validation->hasError('id_vitamin')) ? 'is-invalid' : ''; ?>" id="id_vitamin" name="id_vitamin">
                                        <option value="">=== Pilih Vitamin ===</option>
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
                                <label for="konseling_periksa_ibu" class="col-sm-2 col-form-label">Konseling</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control <?= ($validation->hasError('konseling_periksa_ibu')) ? 'is-invalid' : ''; ?>" id="konseling_periksa_ibu" name="konseling_periksa_ibu" rows="3"><?= old('konseling_periksa_ibu'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('konseling_periksa_ibu'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="keluhan_periksa_ibu" class="col-sm-2 col-form-label">Keluhan</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control <?= ($validation->hasError('keluhan_periksa_ibu')) ? 'is-invalid' : ''; ?>" id="keluhan_periksa_ibu" name="keluhan_periksa_ibu" rows="3"><?= old('keluhan_periksa_ibu'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keluhan_periksa_ibu'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="keterangan_periksa_ibu" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control <?= ($validation->hasError('keterangan_periksa_ibu')) ? 'is-invalid' : ''; ?>" id="keterangan_periksa_ibu" name="keterangan_periksa_ibu" rows="3"><?= old('keterangan_periksa_ibu'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan_periksa_ibu'); ?>
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