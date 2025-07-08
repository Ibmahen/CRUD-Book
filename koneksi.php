<?php
$servername = "sql309.infinityfree.com";
$username = "if0_39423268";
$password = "kelompokb";
$dbname = "if0_39423268_db_pp";

$koneksi = new mysqli($servername, $username, $password, $dbname);
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}
?>