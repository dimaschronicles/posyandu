<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/kehadiran">Kehadiran</a></li>
            <li class="breadcrumb-item active">Detail Data Kehadiran</li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Detail Kehadiran</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $kehadiran['tanggal']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama_balita" class="col-sm-3 col-form-label">Nama Balita</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $kehadiran['nama_balita']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-9 offset-sm-3">
                                <a href="/kehadiran" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>