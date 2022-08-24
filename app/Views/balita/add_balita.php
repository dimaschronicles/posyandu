<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/balita">Balita</a></li>
            <li class="breadcrumb-item active">Tambah Data Balita</li>
        </ol>
        <hr>
        <form action="/balita" method="POST">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="nama_petugas" class="col-sm-3 col-form-label"><strong>Petugas</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="nama_petugas" value="<?= session('nama'); ?>">
                                </div>
                            </div>
                            <hr>
                            <input type="hidden" name="id_user" value="<?= session('id_user'); ?>">
                            <div class="mb-3">
                                <label for="nik_balita" class="form-label">NIK Balita</label>
                                <input type="number" class="form-control <?= ($validation->hasError('nik_balita')) ? 'is-invalid' : ''; ?>" id="nik_balita" name="nik_balita" placeholder="NIK balita..." value="<?= old('nik_balita'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nik_balita'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nama_balita" class="form-label">Nama Balita</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nama_balita')) ? 'is-invalid' : ''; ?>" id="nama_balita" name="nama_balita" placeholder="Nama balita..." value="<?= old('nama_balita'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_balita'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir_balita" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control <?= ($validation->hasError('tanggal_lahir_balita')) ? 'is-invalid' : ''; ?>" id="tanggal_lahir_balita" name="tanggal_lahir_balita" value="<?= old('tanggal_lahir_balita'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal_lahir_balita'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jk_balita" class="form-label">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input  <?= ($validation->hasError('jk_balita')) ? 'is-invalid' : ''; ?>" type="radio" name="jk_balita" id="jk_balita" value="Laki-laki" <?= (old('jk_balita') == 'Laki-laki') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="jk_balita1">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input  <?= ($validation->hasError('jk_balita')) ? 'is-invalid' : ''; ?>" type="radio" name="jk_balita" id="jk_balita" value="Perempuan" <?= (old('jk_balita') == 'Perempuan') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="jk_balita">Perempuan</label>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jk_balita'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="id_ibu" class="form-label">Nama Ibu</label>
                                <select class="form-select <?= ($validation->hasError('id_ibu')) ? 'is-invalid' : ''; ?>" id="id_ibu" name="id_ibu">
                                    <option value="">=== Nama Ibu ===</option>
                                    <?php foreach ($ibu as $i) : ?>
                                        <option value="<?= $i['id_ibu']; ?>" <?= (old('id_ibu') == $i['id_ibu']) ? 'selected' : ''; ?>><?= $i['nama_ibu']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('id_ibu'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="panjang_badan" class="form-label">Panjang Badan</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control <?= ($validation->hasError('panjang_badan')) ? 'is-invalid' : ''; ?>" id="panjang_badan" name="panjang_badan" placeholder="Masukan panjang badan..." value="<?= old('panjang_badan'); ?>">
                                    <span class="input-group-text">cm</span>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('panjang_badan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="berat_lahir" class="form-label">Berat Lahir</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control <?= ($validation->hasError('berat_lahir')) ? 'is-invalid' : ''; ?>" id="berat_lahir" name="berat_lahir" placeholder="Masukan berat lahir..." value="<?= old('berat_lahir'); ?>">
                                    <span class="input-group-text">kg</span>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('berat_lahir'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="lingkar_kepala" class="form-label">Lingkar Kepala</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control <?= ($validation->hasError('lingkar_kepala')) ? 'is-invalid' : ''; ?>" id="lingkar_kepala" name="lingkar_kepala" placeholder="Masukan berat badan..." value="<?= old('lingkar_kepala'); ?>">
                                    <span class="input-group-text">cm</span>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lingkar_kepala'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 mt-3 d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                                <a href="/balita" class="btn btn-outline-secondary">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?= $this->endSection(); ?>