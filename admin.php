<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sma_manba";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$siswa_sql = "SELECT COUNT(*) as count FROM siswas";
$siswa_result = $conn->query($siswa_sql);
$siswa_count = $siswa_result->fetch_assoc()['count'];

$guru_sql = "SELECT COUNT(*) as count FROM gurumapels";
$guru_result = $conn->query($guru_sql);
$guru_count = $guru_result->fetch_assoc()['count'];

$staff_sql = "SELECT COUNT(*) as count FROM pegawais";
$staff_result = $conn->query($staff_sql);
$staff_count = $staff_result->fetch_assoc()['count'];

$pelajaran_sql = "SELECT COUNT(*) as count FROM pelajarans";
$pelajaran_result = $conn->query($pelajaran_sql);
$pelajaran_count = $pelajaran_result->fetch_assoc()['count'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dahsboard SIAKAD</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="style/dashboard.css" >
</head>
<body>
    <div class="sidebar">
        <div class="logo-sidebar">
            <img src="images/logosekolah-logosite.png" alt="" />
        </div>
        <ul class="sidebar-items">
            <li class="main-item">
                <i class="bi bi-speedometer2"></i><a href="admin.php">Dashboard</a>
            </li>
            <li class="dropdown">
                <i class="bi bi-clipboard-data"></i><a href="#">Data master</a>
                <ul class="dropdown-content">
                    <li><a href="dataguru.php">Data Guru</a></li>
                    <li><a href="datasiswa.php">Data Siswa</a></li>
                    <li><a href="datamapel.php">Data Mapel</a></li>
                    <li><a href="datastaf.php">Data staf</a></li>
                    <li><a href="datakelas.php">Data Kelas</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="header">
        <h1>Sistem Informasi Akademik</h1>
        <main>
            <h2>Selamat datang Admin</h2>
        </main>
    </div>
    <div class="container">
        <div class="card" style="border-left: 10px solid #0C359E;">
            <h3 style="color: #0C359E;">Jumlah Siswa</h3>
            <p><?php echo $siswa_count; ?></p>
        </div>
        <div class="card" style="border-left: 10px solid green;">
            <h3 style="color: green;">Jumlah Guru</h3>
            <p><?php echo $guru_count; ?></p>
        </div>
        <div class="card" style="border-left: 10px solid red;">
            <h3 style="color: red;">Jumlah Staff</h3>
            <p><?php echo $staff_count; ?></p>
        </div>
        <div class="card" style="border-left: 10px solid #FFBF00;">
            <h3 style="color: #FFBF00;">Jumlah Pelajaran</h3>
            <p><?php echo $pelajaran_count; ?></p>
        </div>
    </div>
    <header>
        <h2>PENGUMUMAN</h2>
    </header>
    <main>
        <div class="container1">
            <h4>Info Sekolah</h4>
            <p>Sekolah akan dimulai pada tanggal 12</p>
            <p>Silahkan lihat informasi pada tabel masing-masing</p>
        </div>
    </main>
</body>
</html>