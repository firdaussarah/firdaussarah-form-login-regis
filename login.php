<?php
session_start(); // Pastikan session dimulai
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form-container">
        <h2>Login</h2>

        <!-- Tampilkan pesan error jika ada -->
        <?php
        if (isset($_SESSION['error'])) {
            echo "<div class='error-message'>" . htmlspecialchars($_SESSION['error']) . "</div>";
            unset($_SESSION['error']); // Hapus pesan setelah ditampilkan
        }
        ?>

        <form action="login_proses.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required aria-label="Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required aria-label="Password">
            </div>
            <button type="submit" class="btn">Login</button>
            <p>Belum punya akun? <a href="register.html">Daftar di sini</a></p>
            <p class="terms">Dengan melanjutkan, Anda menyetujui <a href="#">Ketentuan Layanan</a> dan <a href="#">Kebijakan Privasi</a> kami.</p>
        </form>
    </div>
</body>

</html>