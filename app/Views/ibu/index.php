<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Ibu</li>
        </ol>
        <hr>

        <?= session()->getFlashdata('message'); ?>

        <div class="card">
            <div class="card-body">
                <a href="/ibu/new" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Data Ibu
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
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Suami</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Suami</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $j = 1;
                            foreach ($ibu as $i) : ?>
                                <tr>
                                    <td><?= $j++; ?></td>
                                    <td><?= $i['nik_ibu']; ?></td>
                                    <td><?= $i['nama_ibu']; ?></td>
                                    <td><?= date_indo($i['tanggal_lahir_ibu']); ?></td>
                                    <td><?= $i['suami_ibu']; ?></td>
                                    <td><?= $i['alamat_ibu']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteIbu<?= $i['id_ibu']; ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <a href="/ibu/edit/<?= $i['id_ibu']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <a href="/ibu/<?= $i['id_ibu']; ?>" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal Hapus Data -->
                                <div class="modal fade" id="deleteIbu<?= $i['id_ibu']; ?>" tabindex="-1" aria-labelledby="deleteIbuLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteIbuLabel">Peringatan!</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah data ini akan dihapus?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="/ibu/<?= $i['id_ibu']; ?>" method="POST">
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