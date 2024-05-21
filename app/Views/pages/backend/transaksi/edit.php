<?= $this->extend('layouts/backend/base_layouts'); ?>
<?= $this->section('title'); ?>Data Transaksi <?= $this->endSection(); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <form id="tambahdatatransaksi" action="<?php echo base_url('admin/transaksi/simpan') ?>" method="post">
        <div class="form-group">
            <label for="anggota">Nama Anggota</label>
            <select name="id_anggota" class="form-control" id="anggota">
                <option value="">&nbsp;</option>
                <?php foreach ($anggota as $anggota) : ?>
                    <option value="<?= $anggota['id_anggota']; ?>"><?= $anggota['nama_anggota']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="buku">Judul Buku</label>
            <select name="id_buku" class="form-control" id="buku">
                <?php foreach ($buku as $buku) : ?>
                    <option value="<?= $buku['id_buku']; ?>"><?= $buku['judul']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
            <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman">
        </div>
        <div class="form-group">
            <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
            <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian">
        </div>
        <button class="btn btn-primary mt-3 mb-3">Simpan</button>
    </form>
</div>

<?= $this->endSection(); ?>