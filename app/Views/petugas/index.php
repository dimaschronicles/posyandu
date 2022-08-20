<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Petugas</li>
        </ol>
        <hr>

        <?= session()->getFlashdata('message'); ?>

        <div class="card">
            <div class="card-body">
                <a href="/petugas/new" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data Petugas</a>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped text-center" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Jenis Kelamin</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Jenis Kelamin</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $j = 1;
                            foreach ($petugas as $p) : ?>
                                <tr>
                                    <td><?= $j++; ?></td>
                                    <td><?= $p['nama']; ?></td>
                                    <td><?= $p['jenis_kelamin']; ?></td>
                                    <td><?= ucfirst($p['role']); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $p['id_user']; ?>">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                        <a href="/petugas/edit/<?= $p['id_user']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="/petugas/<?= $p['id_user']; ?>" class="btn btn-info"><i class="fas fa-info"></i> Detail</a>
                                    </td>
                                </tr>

                                <!-- Modal Hapus Data -->
                                <div class="modal fade" id="exampleModal<?= $p['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah data ini akan dihapus?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="/petugas/<?= $p['id_user']; ?>" method="POST">
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