<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/periksaibu">Pemeriksaan Ibu Hamil</a></li>
            <li class="breadcrumb-item active">Detail Data Pemeriksaan Ibu Hamil</li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Detail Pemeriksaan Ibu Hamil</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row mb-3">
                                    <label for="nama" class="col-sm-3 col-form-label">Petugas</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= $periksaIbu['nama']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="tanggal_periksa_ibu" class="col-sm-3 col-form-label">Tanggal Periksa</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= date_indo($periksaIbu['tanggal_periksa_ibu']); ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row mb-3">
                                    <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= $periksaIbu['nama_ibu']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="tanggal_lahir_ibu" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= date_indo($periksaIbu['tanggal_lahir_ibu']); ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="alamat_ibu" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= $periksaIbu['alamat_ibu']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="konseling_periksa_ibu" class="col-sm-3 col-form-label">Konseling</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= $periksaIbu['konseling_periksa_ibu']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="keluhan_periksa_ibu" class="col-sm-3 col-form-label">Keluhan</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= $periksaIbu['keluhan_periksa_ibu']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="keterangan_periksa_ibu" class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= $periksaIbu['keterangan_periksa_ibu']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="date_created_updated" class="col-sm-3 col-form-label">Tanggal</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item">Ditambahkan : <?= $periksaIbu['date_created_periksa_ibu']; ?></li>
                                            <li class="list-group-item">Terakhir diubah : <?= ($periksaIbu['date_updated_periksa_ibu'] == null) ? '-' : $periksaIbu['date_updated_periksa_ibu']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="vitamin" class="form-label">Vitamin</label>
                                    <input type="text" class="form-control" value="<?= $periksaIbu['nama_vitamin']; ?>" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="uk_periksa_ibu" class="form-label">Usia Kandungan</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="<?= $periksaIbu['uk_periksa_ibu']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="bb_periksa_ibu" class="form-label">Berat Badan</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="<?= $periksaIbu['bb_periksa_ibu']; ?>" readonly>
                                        <span class="input-group-text" id="basic-addon1">kg</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="lila_periksa_ibu" class="form-label">Lingka Lengan</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="<?= $periksaIbu['lila_periksa_ibu']; ?>" readonly>
                                        <span class="input-group-text" id="basic-addon1">cm</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tfundus_periksa_ibu" class="form-label">Tinggi Fundus</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="<?= $periksaIbu['tfundus_periksa_ibu']; ?>" readonly>
                                        <span class="input-group-text" id="basic-addon1">cm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <a href="/periksaibu" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>