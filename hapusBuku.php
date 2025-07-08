<?php
include "koneksi.php";
$id = $_GET['id_hapus'];
$sql = "DELETE FROM buku WHERE id_buku='$id'";
$koneksi->query($sql);
include "daftarBukuWithLogin.php";
?>