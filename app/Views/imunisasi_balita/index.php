<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Imunisasi Balita</li>
        </ol>
        <hr>

        <?= session()->getFlashdata('message'); ?>

        <div class="card">
            <div class="card-body">
                <a href="/imunisasibalita/new" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Data Imunisasi Balita
                </a>
            </div>
        </div>
        <div class="card mt-3 mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Imunisasi</th>
                                <th>Nama Balita</th>
                                <th>Umur</th>
                                <th>Jenis Kelamin</th>
                                <th>Nama Ibu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Imunisasi</th>
                                <th>Nama Balita</th>
                                <th>Umur</th>
                                <th>Jenis Kelamin</th>
                                <th>Nama Ibu</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $j = 1;
                            foreach ($imunisasiBalita as $i) : ?>
                                <tr>
                                    <td><?= $j++; ?></td>
                                    <td><?= date_indo($i['tanggal_imunisasi']); ?></td>
                                    <td><?= $i['nama_balita']; ?></td>
                                    <td><?= get_umur($i['tanggal_lahir_balita']); ?></td>
                                    <td><?= $i['jk_balita']; ?></td>
                                    <td><?= $i['nama_ibu']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $i['id_imunisasi_balita']; ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <a href="/imunisasibalita/edit/<?= $i['id_imunisasi_balita']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <a href="/imunisasibalita/<?= $i['id_imunisasi_balita']; ?>" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal Hapus Data -->
                                <div class="modal fade" id="delete<?= $i['id_imunisasi_balita']; ?>" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
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
                                                <form action="/imunisasibalita/<?= $i['id_imunisasi_balita']; ?>" method="POST">
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