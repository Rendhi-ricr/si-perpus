<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title'); ?>Data Transaksi <?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>
    </div>
    <a href="<?= base_url('admin/transaksi/tambah'); ?>" class="btn btn-primary btn-sm my-4"><i class="bx bx-plus"></i> Tambah Data</a>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($transaksi as $key => $value) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->nama_anggota ?></td>
                            <td>
                                <?php if ($value->status === 'selesai') : ?>
                                    <span class="badge badge-success">Selesai</span>
                                <?php else : ?>
                                    <span class="badge badge-warning">Belum Selesai</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/transaksi/detail/' . $value->id_transaksi) ?>" class="btn btn-info btn-sm">Details</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>