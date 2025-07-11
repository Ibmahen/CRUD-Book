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
        .login-button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 20px;
            float: right; /* Untuk memposisikan di kanan */
        }
        .login-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <a href="Login.php" class="login-button">Login</a>
    <h2>Daftar Buku</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
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
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="4">Tidak ada data</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
<?php
$koneksi->close();
?>