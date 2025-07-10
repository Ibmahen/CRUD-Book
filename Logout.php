<?php
session_start();
session_destroy();
header("Location: daftarBuku.php");
exit();
?>