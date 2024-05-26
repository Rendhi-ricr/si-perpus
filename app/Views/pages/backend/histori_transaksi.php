<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title'); ?>Histori Transaksi<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Histori Transaksi</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Histori Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Tanggal Dikembalikan</th>

                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($historiTransaksi as $histori) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $histori->nama_anggota; ?></td>
                                <td><?= $histori->tanggal_peminjaman; ?></td>
                                <td><?= $histori->tanggal_pengembalian; ?></td>
                                <td><?= isset($histori->tanggal_dikembalikan) ? $histori->tanggal_dikembalikan : ''; ?></td>

                                <td>
                                    <a href="<?= base_url('admin/historiTransaksi/detail/' . $histori->id_histori_transaksi); ?>" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>