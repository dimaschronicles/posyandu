<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Pemeriksaan Balita</li>
        </ol>
        <hr>

        <?= session()->getFlashdata('message'); ?>

        <div class="card">
            <div class="card-body">
                <a href="/periksabalita/new" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Data Pemeriksaan Balita
                </a>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Periksa</th>
                                <th>Nama Balita</th>
                                <th>Umur</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Periksa</th>
                                <th>Nama Balita</th>
                                <th>Umur</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $j = 1;
                            foreach ($periksaBalita as $value) : ?>
                                <tr>
                                    <td><?= $j++; ?></td>
                                    <td><?= date_indo($value['tanggal_periksa']); ?></td>
                                    <td><?= $value['nama_balita']; ?></td>
                                    <td><?= get_umur($value['tanggal_lahir_balita']); ?></td>
                                    <td><?= $value['alamat_ibu']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $value['id_periksa_balita']; ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <a href="/periksabalita/edit/<?= $value['id_periksa_balita']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <a href="/periksabalita/<?= $value['id_periksa_balita']; ?>" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal Hapus Data -->
                                <div class="modal fade" id="delete<?= $value['id_periksa_balita']; ?>" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteLabel">Peringatan!</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah data ini akan dihapus?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="/periksabalita/<?= $value['id_periksa_balita']; ?>" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                    <button type="submit" class="btn btn-danger">Ya</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>