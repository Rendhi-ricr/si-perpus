<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title'); ?>Detail Transaksi <?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi</h1>
    </div>
    <a href="<?= base_url('admin/transaksi'); ?>" class="btn btn-secondary btn-sm my-4"><i class="bx bx-left-arrow-alt"></i> Kembali</a>
    <a href="<?= base_url('admin/transaksi/edit/' . $transaksi->id_transaksi); ?>" class="btn btn-primary btn-sm my-4"><i class="bx bx-edit"></i> Edit</a>
    <a href="<?= base_url('admin/transaksi/selesai/' . $transaksi->id_transaksi); ?>" class="btn btn-success btn-sm my-4"><i class="bx bx-check"></i> Selesai</a>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Transaksi</h6>
            </div>
            <div class="card-body">
                <p><strong>ID Transaksi:</strong> <?= $transaksi->id_transaksi; ?></p>
                <p><strong>Nama Anggota:</strong> <?= $transaksi->nama_anggota; ?></p>
                <p><strong>Tanggal Peminjaman:</strong> <?= $transaksi->tanggal_peminjaman; ?></p>
                <p><strong>Tanggal Pengembalian:</strong> <?= $transaksi->tanggal_pengembalian; ?></p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Buku</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($detailTransaksi as $detail) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $detail->judul ?></td>
                                    <td><?= $detail->tanggal_peminjaman ?></td>
                                    <td><?= $detail->tanggal_pengembalian ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>