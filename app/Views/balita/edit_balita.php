<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/balita">Balita</a></li>
            <li class="breadcrumb-item active">Ubah Data Balita</li>
        </ol>
        <hr>
        <form action="/balita/<?= $balita['id_balita']; ?>" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id_balita" value="<?= $balita['id_balita']; ?>">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nama_balita" class="form-label">Nama Balita</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nama_balita')) ? 'is-invalid' : ''; ?>" id="nama_balita" name="nama_balita" placeholder="Nama balita..." value="<?= ($balita['nama_balita']) ? $balita['nama_balita'] : old('nama_balita'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_balita'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" id="tanggal_lahir" name="tanggal_lahir" value="<?= ($balita['tanggal_lahir']) ? $balita['tanggal_lahir'] : old('tanggal_lahir'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal_lahir'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="">=== Pilih Jenis Kelamin ===</option>
                                    <option value="Laki-laki" <?= ($balita['jenis_kelamin'] == 'Laki-laki') ? 'selected' : old('jenis_kelamin'); ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= ($balita['jenis_kelamin'] == 'Perempuan') ? 'selected' : old('jenis_kelamin'); ?>>Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jenis_kelamin'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>" id="nama_ibu" name="nama_ibu" placeholder="Nama ibu..." value="<?= ($balita['nama_ibu']) ? $balita['nama_ibu'] : old('nama_ibu'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_ibu'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" rows="3"><?= ($balita['alamat']) ? $balita['alamat'] : old('alamat'); ?></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
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
                                    <input type="number" class="form-control <?= ($validation->hasError('panjang_badan')) ? 'is-invalid' : ''; ?>" id="panjang_badan" name="panjang_badan" placeholder="Masukan panjang badan..." value="<?= ($balita['panjang_badan']) ? $balita['panjang_badan'] : old('panjang_badan'); ?>">
                                    <span class="input-group-text">cm</span>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('panjang_badan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="berat_lahir" class="form-label">Berat Lahir</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control <?= ($validation->hasError('berat_lahir')) ? 'is-invalid' : ''; ?>" id="berat_lahir" name="berat_lahir" placeholder="Masukan berat badan..." value="<?= ($balita['berat_lahir']) ? $balita['berat_lahir'] : old('berat_lahir'); ?>">
                                    <span class="input-group-text">kg</span>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('berat_lahir'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="lingkar_kepala" class="form-label">Lingkar Kepala</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control <?= ($validation->hasError('lingkar_kepala')) ? 'is-invalid' : ''; ?>" id="lingkar_kepala" name="lingkar_kepala" placeholder="Masukan berat badan..." value="<?= ($balita['lingkar_kepala']) ? $balita['lingkar_kepala'] : old('lingkar_kepala'); ?>">
                                    <span class="input-group-text">cm</span>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lingkar_kepala'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 mt-3 d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Ubah Data</button>
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