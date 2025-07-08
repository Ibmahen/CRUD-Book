<?php
include "koneksi.php";
$id = $_POST['id_buku'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$id_kategori = $_POST['id_kategori'];

$sql = "UPDATE buku SET judul='$judul', penulis='$penulis', id_kategori='$id_kategori' 
        WHERE id_buku='$id'";
if ($koneksi->query($sql)) {
    include "daftarBukuWithLogin.php";
} else {
    echo "Gagal update: " . $koneksi->error;
}
?>