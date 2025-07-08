<?php
session_start();

// Proses login jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ganti dengan username dan password yang kamu inginkan
    if ($username === 'admin' && $password === '123') {
        $_SESSION['username'] = $username;
        $_SESSION['levelUser'] = 1; // Contoh level user admin

        // Redirect ke halaman daftar buku
        header("Location: daftarBukuWithLogin.php");
        exit();
    } elseif ($username === 'staf' && $password === '456') {
        $_SESSION['username'] = $username;
        $_SESSION['levelUser'] = 2; // Contoh level user staf

        header("Location: daftarBukuWithLogin.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
            width: 300px;
            box-sizing: border-box;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
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
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p.error {
            color: red;
            text-align: center;
            margin-top: -10px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <h2>Login</h2>
    <?php if (isset($error))
        echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>

</html>