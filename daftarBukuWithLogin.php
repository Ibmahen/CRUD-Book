<?php
session_start();
//mengamankan agar setiap halaman tidak dapat langsung diakses
//harus lewat login
if (!isset($_SESSION['username'])) {
    // Jika tidak ada session login, redirect ke halaman login
    header("Location: Login.php");
    exit();
}
echo "user:" . $_SESSION['username'] . "<br>";
$levelUser = $_SESSION['levelUser'];
// Koneksi ke database
include "koneksi.php";
// Query join tabel pegawai dan jabatan
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
    <?php if ($levelUser == 1 || $levelUser == 2) { ?>
        <a href="formTambahBuku.php">Tambah Data </a>
    <?php } ?>
    <table border=1>
        <thead>
            <tr>
                <th>Id </th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($hasil->num_rows > 0) {
                while ($row = $hasil->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id_buku'] ?></td>
                        <td><?= $row['judul'] ?></td>
                        <td><?= $row['penulis'] ?></td>
                        <td><?= $row['nama_kategori'] ?></td>
                        <?php if ($levelUser == 1) { ?>
                            <td><a href="hapusBuku.php?id_hapus=<?php echo
                                $row['id_buku']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a> </td>
                        <?php } ?>
                        <?php if ($levelUser == 1 || $levelUser == 2) { ?>
                            <td><a href="editBuku.php?id_edit=<?php echo
                                $row['id_buku']; ?>" onclick="return confirm('Apakah Anda mau edit record ini ?')">Edit</a></td>
                        <?php } ?>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="3"> Tidak ada data</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="Logout.php"> Logout </a>
</body>

</html>
<?php
$koneksi->close();
?>