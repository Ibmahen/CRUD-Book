<?php
include "koneksi.php";
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$id_kategori = $_POST['id_kategori'];

$sql = "INSERT INTO buku (judul, penulis, id_kategori) 
        VALUES ('$judul', '$penulis', '$id_kategori')";
if ($koneksi->query($sql)) {
    include "daftarBukuWithLogin.php";
} else {
    echo "Gagal simpan: " . $koneksi->error;
}
?>