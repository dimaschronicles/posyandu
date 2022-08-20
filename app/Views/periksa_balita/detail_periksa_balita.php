<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/periksabalita">Pemeriksaan Balita</a></li>
            <li class="breadcrumb-item active">Detail Data Pemeriksaan Balita</li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Detail Pemeriksaan Balita</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row mb-3">
                                    <label for="nama" class="col-sm-3 col-form-label">Petugas</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= $periksaBalita['nama']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="tanggal_periksa" class="col-sm-3 col-form-label">Tanggal Periksa</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= date_indo($periksaBalita['tanggal_periksa']); ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row mb-3">
                                    <label for="nama_balita" class="col-sm-3 col-form-label">Nama Balita</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= $periksaBalita['nama_balita']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= $periksaBalita['jk_balita']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="tanggal_lahir_balita" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= date_indo($periksaBalita['tanggal_lahir_balita']); ?> | Umur : <?= get_umur($periksaBalita['tanggal_lahir_balita']); ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= $periksaBalita['nama_ibu']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="alamat_ibu" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= $periksaBalita['alamat_ibu']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="keterangan_periksa" class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= $periksaBalita['keterangan_periksa']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="date_created_updated" class="col-sm-3 col-form-label">Tanggal</label>
                                    <div class="col-sm-9">
                                        <ul class="list-group">
                                            <li class="list-group-item">Ditambahkan : <?= $periksaBalita['date_created_periksa']; ?></li>
                                            <li class="list-group-item">Terakhir diubah : <?= ($periksaBalita['date_updated_periksa'] == null) ? '-' : $periksaBalita['date_updated_periksa']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="vitamin" class="form-label">Vitamin</label>
                                    <input type="text" class="form-control" value="<?= $periksaBalita['nama_vitamin']; ?>" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="tb_periksa" class="form-label">Tinggi Badan</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="<?= $periksaBalita['tb_periksa']; ?>" readonly>
                                        <span class="input-group-text" id="basic-addon1">cm</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="bb_periksa" class="form-label">Berat Badan</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="<?= $periksaBalita['bb_periksa']; ?>" readonly>
                                        <span class="input-group-text" id="basic-addon1">kg</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="lk_periksa" class="form-label">Lingka Kepala</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="<?= $periksaBalita['lk_periksa']; ?>" readonly>
                                        <span class="input-group-text" id="basic-addon1">cm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <a href="/periksabalita" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>