<?php
include "koneksi.php";

// Ambil data kategori untuk dropdown
$queryKategori = "SELECT id_kategori, nama_kategori, biaya_registrasi FROM kategori";
$resultKategori = mysqli_query($koneksi, $queryKategori);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4">Tambah Data Member</h4>

                    <form action="proses_tambah.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nama Member</label>
                            <input type="text" name="nama_member" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="id_kategori" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                <?php while ($k = mysqli_fetch_assoc($resultKategori)) { ?>
                                    <option value="<?= $k['id_kategori'] ?>">
                                        <?= htmlspecialchars($k['nama_kategori']) ?>
                                        (Rp<?= number_format($k['biaya_registrasi'], 0, ',', '.') ?>)
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
