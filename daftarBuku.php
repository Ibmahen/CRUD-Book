<?php
include "koneksi.php";
$sql = "SELECT buku.id_buku, buku.judul, buku.penulis, kategori.nama_kategori 
        FROM buku 
        INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori
        ORDER BY buku.id_buku DESC";
$hasil = $koneksi->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Buku</title>
</head>

<body>
    <h2>Daftar Buku</h2>
    <a href="formTambahBuku.php">Tambah Buku</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $hasil->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id_buku'] ?></td>
                <td><?= $row['judul'] ?></td>
                <td><?= $row['penulis'] ?></td>
                <td><?= $row['nama_kategori'] ?></td>
                <td>
                    <a href="edit_buku.php?id_edit=<?= $row['id_buku'] ?>">Edit</a> |
                    <a href="hapus_buku.php?id_hapus=<?= $row['id_buku'] ?>"
                        onclick="return confirm('Yakin mau hapus?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>