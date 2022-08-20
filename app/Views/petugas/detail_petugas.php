<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/petugas">Petugas</a></li>
            <li class="breadcrumb-item active">Detail Data Petugas</li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Detail Petugas</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label for="role" class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= ucfirst($petugas['role']); ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Petugas</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $petugas['nama']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $petugas['jenis_kelamin']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $petugas['email']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="no_hp" class="col-sm-3 col-form-label">No HP</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $petugas['no_hp']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item"><?= $petugas['alamat']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="date_created_updated" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <ul class="list-group">
                                    <li class="list-group-item">Ditambahkan : <?= $petugas['date_created']; ?></li>
                                    <li class="list-group-item">Terakhir diubah : <?= ($petugas['date_updated'] == null) ? '-' : $petugas['date_updated']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-9 offset-sm-3">
                                <a href="/petugas" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>