<?php
include "koneksi.php";
$id = $_GET['id_edit'];
$data = $koneksi->query("SELECT * FROM buku WHERE id_buku='$id'")->fetch_assoc();
?>
<html>

<head>
    <title>Edit Buku</title>
</head>

<body>
    <h2>Edit Buku</h2>
    <form action="simpanEditBuku.php" method="post">
        <input type="hidden" name="id_buku" value="<?= $id ?>">
        Judul: <input type="text" name="judul" value="<?= $data['judul'] ?>"><br><br>
        Penulis: <input type="text" name="penulis" value="<?= $data['penulis'] ?>"><br><br>
        Kategori:
        <select name="id_kategori">
            <?php
            $kategori = $koneksi->query("SELECT * FROM kategori");
            while ($row = $kategori->fetch_assoc()) {
                $selected = ($row['id_kategori'] == $data['id_kategori']) ? "selected" : "";
                echo "<option value='{$row['id_kategori']}' $selected>{$row['nama_kategori']}</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" value="Simpan">
    </form>
</body>

</html>