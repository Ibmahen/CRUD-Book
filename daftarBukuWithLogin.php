<?php
session_start();
//mengamankan agar setiap halaman tidak dapat langsung diakses
//harus lewat login
if (!isset($_SESSION['username'])) {
    // Jika tidak ada session login, redirect ke halaman login
    header("Location: Login.php");
    exit();
}
$levelUser = $_SESSION['levelUser']; // Mendapatkan level pengguna dari sesi
// Koneksi ke database
include "koneksi.php"; // Mengimpor konfigurasi koneksi database
// Query join tabel buku dan kategori
$sql = "SELECT buku.id_buku, buku.judul, buku.penulis, kategori.nama_kategori
        FROM buku
        INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori
        ORDER BY buku.id_buku DESC"; // Query untuk mengambil data buku beserta nama kategori
$hasil = $koneksi->query($sql); // Menjalankan query ke database
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
            color: #333;
        }
        h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .add-button {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 20px;
        }
        .add-button:hover {
            background-color: #218838;
        }
        .logout-button {
            display: inline-block;
            background-color: #dc3545;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }
        .logout-button:hover {
            background-color: #c82333;
        }
        .user-info {
            margin-bottom: 10px;
            font-size: 1.1em;
            color: #555;
        }

        /* Styles for action buttons */
        .action-button {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            font-size: 0.9em;
            text-align: center;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .delete-button {
            background-color: #dc3545; /* Red */
        }
        .delete-button:hover {
            background-color: #c82333;
        }

        .edit-button {
            background-color: #28a745; /* Green */
        }
        .edit-button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <p class="user-info">User: <?php echo $_SESSION['username']; ?></p>
    <h2>Daftar Buku</h2>
    <?php if ($levelUser == 1 || $levelUser == 2) { ?>
        <a href="formTambahBuku.php" class="add-button">Tambah Data</a>
    <?php } ?>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <?php if ($levelUser == 1 || $levelUser == 2) { // Tampilkan header Aksi hanya untuk Admin dan Staf ?>
                    <th colspan="2">Aksi</th>
                <?php } ?>
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
                        <?php if ($levelUser == 1) { // Hanya Admin yang bisa Hapus ?>
                            <td><a href="hapusBuku.php?id_hapus=<?php echo
                                $row['id_buku']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="action-button delete-button">Hapus</a></td>
                        <?php } ?>
                        <?php if ($levelUser == 1 || $levelUser == 2) { // Admin dan Staf bisa Edit ?>
                            <td><a href="editBuku.php?id_edit=<?php echo
                                $row['id_buku']; ?>" onclick="return confirm('Apakah Anda mau edit record ini ?')" class="action-button edit-button">Edit</a></td>
                        <?php } ?>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="<?php echo ($levelUser == 1 || $levelUser == 2) ? '6' : '4'; ?>">Tidak ada data</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="Logout.php" class="logout-button">Logout</a>
</body>

</html>
<?php
$koneksi->close();
?>