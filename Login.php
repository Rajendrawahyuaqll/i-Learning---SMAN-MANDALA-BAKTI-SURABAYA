<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $servername = "localhost";
    $database = "sma_manba"; // Nama database Anda
    $db_username = "root"; // Username database Anda
    $db_password = ""; // Password database Anda

    // Buat koneksi
    $conn = mysqli_connect($servername, $db_username, $db_password, $database);

    // Periksa koneksi
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Periksa apakah username dan password cocok dengan data dalam database
    $query_check_user = "SELECT * FROM users WHERE (name = ? OR email = ?) AND password = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $query_check_user);
    mysqli_stmt_bind_param($stmt, "sss", $username, $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        // Username dan password cocok, redirect ke index.php
        mysqli_close($conn);
        header("Location: index.php");
        exit();
    } else {
        echo "Username atau password salah.";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="style/Login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="login-container">
        <form action="" method="post" class="login-form">
            <h2>Login</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required />

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required />

            <button type="submit">Login</button>
        </form>

        <div class="background-image"></div>

        <div class="google-icon">
            <a href="https://accounts.google.com/?hl=ID" target="_blank">
                <i class="fab fa-google"></i> Login with Google
            </a>
        </div>
    </div>
</body>
</html>
