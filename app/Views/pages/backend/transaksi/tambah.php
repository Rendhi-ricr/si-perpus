<?= $this->extend('layouts/backend/base_layouts'); ?>
<?= $this->section('title'); ?>Data Transaksi <?= $this->endSection(); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Transaksi</h1>

    <div class="row">
        <div class="col-lg-6">
            <form action="<?= base_url('admin/transaksi/simpan'); ?>" method="post">
                <div class="form-group">
                    <label for="id_anggota">Anggota</label>
                    <select name="id_anggota" id="id_anggota" class="form-control select2">
                        <option value="">Pilih Anggota</option>
                        <?php foreach ($anggota as $item) : ?>
                            <option value="<?= $item['id_anggota']; ?>"><?= $item['nama_anggota']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="form-group">
                    <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                    <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control">
                </div>

                <div class="form-group">
                    <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                    <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control">
                </div>

                <div class="form-group">
                    <label for="id_buku">Buku</label>
                    <select name="id_buku[]" id="id_buku" class="form-control select2" multiple>
                        <?php foreach ($buku as $item) : ?>
                            <option value="<?= $item['id_buku']; ?>"><?= $item['judul']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>