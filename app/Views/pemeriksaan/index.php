<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Vitamin</li>
        </ol>
        <hr>

        <?= session()->getFlashdata('message'); ?>

        <div class="card">
            <div class="card-body">
                <a href="/penimbangan/new" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Data Penimbangan
                </a>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped text-center" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Vitamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Vitamin</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>
<?= $this->endSection(); ?>