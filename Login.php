<?php
session_start();
$error = "";
// Jika sudah login, langsung redirect ke dashboard
if (isset($_SESSION['username'])) {
    header("Location: daftarBukuWithLogin.php");
    exit();
}
// Proses form login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Contoh validasi sederhana (user: admin, password: 123)
    // pada implementasi riil username dan password dari database

    if ($username == "admin" && $password == "123") {
        $_SESSION['username'] = $username;
        $_SESSION['levelUser'] = 1;
        header("Location: daftarBukuWithLogin.php");
        exit();
    } elseif ($username == "staf" && $password == "456") {
        $_SESSION['username'] = $username;
        $_SESSION['levelUser'] = 2;
        header("Location: daftarBukuWithLogin.php");
        exit();
    } elseif ($username == "tamu" && $password == "tamu") {
        $_SESSION['username'] = $username;
        $_SESSION['levelUser'] = 3;
        header("Location: daftarBukuWithLogin.php");
        exit();
    } else {
        $error = "Nama pengguna atau kata sandi salah.";

    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <?php if (!empty($error))
        echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="login.php">
        <label for="username">Nama User:</label><br>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Kata Sandi:</label><br>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Masuk">
    </form>
</body>

</html>