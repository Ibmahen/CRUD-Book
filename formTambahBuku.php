<!DOCTYPE html>
<html>

<head>
    <title>Form Tambah Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            box-sizing: border-box;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        br {
            display: none; /* Hide default <br> tags */
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Tambah Buku</h2>
        <form action="simpanBuku.php" method="post">
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" required>

            <label for="penulis">Penulis:</label>
            <input type="text" name="penulis" id="penulis" required>

            <label for="id_kategori">Kategori:</label>
            <select name="id_kategori" id="id_kategori">
                <?php
                include "koneksi.php";
                $hasil = $koneksi->query("SELECT * FROM kategori");
                while ($row = $hasil->fetch_assoc()) {
                    echo "<option value='{$row['id_kategori']}'>{$row['nama_kategori']}</option>";
                }
                ?>
            </select>
            <input type="submit" value="Simpan">
        </form>
    </div>
</body>

</html>