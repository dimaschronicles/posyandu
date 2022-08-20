<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/imunisasibalita">Imunisasi Balita</a></li>
            <li class="breadcrumb-item active">Detail Data Imunisasi Balita</li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <strong>Detail Imunisasi Balita</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label for="nama" class="col-sm-3 col-form-label">Petugas</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $imunisasiBalita['nama']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggal_imunisasi" class="col-sm-3 col-form-label">Tanggal Imunisasi</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= date_indo($imunisasiBalita['tanggal_imunisasi']); ?></li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mb-3">
                            <label for="jenis_imunisasi" class="col-sm-3 col-form-label">Jenis Imunisasi</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $imunisasiBalita['nama_imunisasi']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama_balita" class="col-sm-3 col-form-label">Nama Balita</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $imunisasiBalita['nama_balita']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggal_lahir_balita" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= date_indo($imunisasiBalita['tanggal_lahir_balita']); ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $imunisasiBalita['jk_balita']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $imunisasiBalita['nama_ibu']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $imunisasiBalita['suami_ibu']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $imunisasiBalita['alamat_ibu']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-9 offset-sm-3">
                                <a href="/imunisasibalita" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>