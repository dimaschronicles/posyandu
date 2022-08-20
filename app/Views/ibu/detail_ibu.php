<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/ibu">Ibu</a></li>
            <li class="breadcrumb-item active">Detail Data Ibu</li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Detail Ibu</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label for="nama" class="col-sm-3 col-form-label">Petugas</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $ibu['nama']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nik_ibu" class="col-sm-3 col-form-label">NIK Ibu</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $ibu['nik_ibu']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $ibu['nama_ibu']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggal_lahir_ibu" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= date_indo($ibu['tanggal_lahir_ibu']); ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="suami_ibu" class="col-sm-3 col-form-label">Suami Ibu</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $ibu['suami_ibu']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="alamat_ibu" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $ibu['alamat_ibu']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="date_created_updated" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item">Ditambahkan : <?= $ibu['date_created_ibu']; ?></li>
                                    <li class="list-group-item">Terakhir diubah : <?= ($ibu['date_updated_ibu'] == null) ? '-' : $ibu['date_updated_ibu']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-9 offset-sm-3">
                                <a href="/ibu" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>