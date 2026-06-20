<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_member = $_POST['nama_member'];
    $alamat      = $_POST['alamat'];
    $no_hp       = $_POST['no_hp'];
    $id_kategori = $_POST['id_kategori'];

    // Pakai prepared statement biar aman dari SQL Injection
    $query = $koneksi->prepare(
        "INSERT INTO member (nama_member, alamat, no_hp, id_kategori) VALUES (?, ?, ?, ?)"
    );
    $query->bind_param("sssi", $nama_member, $alamat, $no_hp, $id_kategori);

    if ($query->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . $koneksi->error;
    }
}
?>
