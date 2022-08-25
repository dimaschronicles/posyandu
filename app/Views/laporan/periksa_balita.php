<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Laporan Data Pemeriksaan Balita</li>
        </ol>
        <hr>
        <div class="card mt-3">
            <div class="card-header">
                Filter Laporan
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tanggal_dari" class="form-label">Dari Tanggal</label>
                            <input type="date" class="form-control" id="tanggal_dari" name="tanggal_dari" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_sampai" class="form-label">Sampai Tanggal</label>
                            <input type="date" class="form-control" id="tanggal_sampai" name="tanggal_sampai" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-eye"></i> Tampilkan Laporan</button>
                            <a href="/laporan/periksabalita" class="btn btn-outline-secondary"><i class="fas fa-sync"></i> Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php if ($periksaBalita == '') : ?>
            <div class="card mt-3">
                <div class="card-body">
                    Silahkan isikan tanggalnya terlebih dahulu.
                </div>
            </div>
        <?php else : ?>
            <div class="card mt-3 mb-3">
                <div class="card-header">
                    Hasil Filter Data
                </div>
                <div class="card-body">
                    <a href="/laporan/periksabalitaprint?tanggal_dari=<?= @$_GET['tanggal_dari']; ?>&tanggal_sampai=<?= @$_GET['tanggal_sampai']; ?>" target="blank" class="btn btn-success"><i class="fas fa-print"></i> Cetak Data</a>
                    <a href="/laporan/periksabalitapdf?tanggal_dari=<?= @$_GET['tanggal_dari']; ?>&tanggal_sampai=<?= @$_GET['tanggal_sampai']; ?>" target="blank" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Download PDF</a>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped text-center" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Balita</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tinggi Badan</th>
                                    <th>Berat Badan</th>
                                    <th>Lingkar Kepala</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Balita</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tinggi Badan</th>
                                    <th>Berat Badan</th>
                                    <th>Lingkar Kepala</th>
                                    <th>Keterangan</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($periksaBalita as $value) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $value['nama_balita']; ?></td>
                                        <td><?= $value['jk_balita']; ?></td>
                                        <td><?= $value['tb_periksa']; ?></td>
                                        <td><?= $value['bb_periksa']; ?></td>
                                        <td><?= $value['lk_periksa']; ?></td>
                                        <td><?= $value['keterangan_periksa']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>
<?= $this->endSection(); ?>