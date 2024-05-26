<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title'); ?>Edit Transaksi <?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Transaksi</h1>
    </div>
    <a href="<?= base_url('admin/transaksi'); ?>" class="btn btn-secondary btn-sm my-4"><i class="bx bx-left-arrow-alt"></i> Kembali</a>
</div>

<form action="<?= base_url('admin/transaksi/update/' . $transaksi->id_transaksi); ?>" method="post">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Transaksi</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_anggota">Nama Anggota</label>
                        <select name="id_anggota" id="id_anggota" class="form-control select2">
                            <?php foreach ($anggota as $a) : ?>
                                <option value="<?= $a['id_anggota']; ?>" <?= $a['id_anggota'] == $transaksi->id_anggota ? 'selected' : ''; ?>><?= $a['nama_anggota']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                        <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control" value="<?= $transaksi->tanggal_peminjaman; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                        <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control" value="<?= $transaksi->tanggal_pengembalian; ?>">
                    </div>
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
                    <div class="form-group">
                        <label for="id_buku">Pilih Buku</label>
                        <select name="id_buku[]" id="id_buku" class="form-control select2" multiple>
                            <?php foreach ($buku as $b) : ?>
                                <option value="<?= $b['id_buku']; ?>" <?= in_array($b['id_buku'], array_column($detailTransaksi, 'id_buku')) ? 'selected' : ''; ?>><?= $b['judul']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection() ?>