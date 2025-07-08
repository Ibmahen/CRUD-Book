<!DOCTYPE html>
<html>

<head>
    <title>Form Tambah Buku</title>
</head>

<body>
    <h2>Tambah Buku</h2>
    <form action="simpanBuku.php" method="post">
        Judul: <input type="text" name="judul"><br><br>
        Penulis: <input type="text" name="penulis"><br><br>
        Kategori:
        <select name="id_kategori">
            <?php
            include "koneksi.php";
            $hasil = $koneksi->query("SELECT * FROM kategori");
            while ($row = $hasil->fetch_assoc()) {
                echo "<option value='{$row['id_kategori']}'>{$row['nama_kategori']}</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" value="Simpan">
    </form>
</body>

</html>