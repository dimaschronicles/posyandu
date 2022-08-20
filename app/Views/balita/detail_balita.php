<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/balita">Balita</a></li>
            <li class="breadcrumb-item active">Detail Data Balita</li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        <strong>Detail Balita</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label for="nama" class="col-sm-3 col-form-label">Petugas</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $balita['nama']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nik_balita" class="col-sm-3 col-form-label">NIK Balita</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $balita['nik_balita']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama_balita" class="col-sm-3 col-form-label">Nama Balita</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $balita['nama_balita']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= date_indo($balita['tanggal_lahir_balita']); ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $balita['jk_balita']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $balita['nama_ibu']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $balita['suami_ibu']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="alamat_ibu" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $balita['alamat_ibu']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="panjang_badan" class="col-sm-3 col-form-label">Panjang Badan</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $balita['panjang_badan']; ?> cm</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="berat_lahir" class="col-sm-3 col-form-label">Berat Lahir</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $balita['berat_lahir']; ?> kg</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="lingkar_kepala" class="col-sm-3 col-form-label">Lingkar Kepala</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $balita['lingkar_kepala']; ?> cm</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item">Ditambahkan : <?= $balita['date_created_balita']; ?></li>
                                    <li class="list-group-item">Terakhir diubah : <?= ($balita['date_updated_balita'] != null) ? $balita['date_updated_balita'] : '-'; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-9 offset-sm-3">
                                <a href="/balita" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>