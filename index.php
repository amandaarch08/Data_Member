<?php
include "koneksi.php";

// Query JOIN, biaya_registrasi diambil dari tabel kategori (bukan ketik manual)
$query = "SELECT m.id_member, m.nama_member, m.alamat, m.no_hp, 
                 k.nama_kategori, k.biaya_registrasi
          FROM member m
          JOIN kategori k ON m.id_kategori = k.id_kategori
          ORDER BY m.id_member ASC";

$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Quis Koneksi PHP ke Database</title>
    <!-- Bootstrap via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">

    <h3 class="mb-4 text-center">Data Member</h3>

    <div class="d-flex justify-content-end mb-3">
        <a href="tambah.php" class="btn btn-success">+ Tambah Data</a>
    </div>

    <table class="table table-bordered table-striped bg-white">
        <thead class="table-warning">
            <tr>
                <th>No</th>
                <th>Nama Member</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Kategori</th>
                <th>Biaya Registrasi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama_member']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['no_hp']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama_kategori']) . "</td>";
                    echo "<td>Rp" . number_format($row['biaya_registrasi'], 0, ',', '.') . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>Belum ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>

</div>
</body>
</html>
