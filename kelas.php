<?php
// Langkah 1: Koneksi ke database
$servername = "localhost";
$username = "root";
$password_db = "";
$database = "sma_manba";

$conn = new mysqli($servername, $username, $password_db, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM walikelass";
$result = $conn->query($sql);
$walikelass = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $walikelass[] = $row;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Site Metas -->
    <title>i-Learning - SMAN MANDALA BAKTI SURABAYA</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logosekolah-logosite.png" type="image/x-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css" />
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css" />

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>
</head>
<body class="host_version">
<!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logosekolah-logosite.png" alt="" style="height: 100px;" />
                    <nav class="navbar">
                        <a href="index.php" class="nama-website">SMA MANDALA BAKTI</a>
                    </nav>
                </a>    
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-host">
                    <ul class="navbar-nav ml-auto"> 
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">Tentang kami</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Data Master</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="siswa.php">Siswa</a>
                                <a class="dropdown-item" href="guru.php">Guru</a>
                                <a class="dropdown-item" href="staf.php">Staf</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="kelas.php">Kelas</a>
                        <li class="nav-item"><a class="nav-link" href="elearning.php">e-Learning</a>
                        <li class="nav-item"><a class="nav-link" href="ekskul.php">Ekskul</a></li>
                        <li class="nav-item"><a class="nav-link" href="prestasi.php">Prestasi</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

<!-- Main Content -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sma_manba";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM walikelass";
$result = $conn->query($sql);
$walikelass = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $walikelass[$row['id_kelas']] = $row['nama'];
    }
}
?>

<div class="kelas">
    <div class="tabel-kelas">
        <h2>KELAS 10-A</h2>
        <li>Wali Kelas : <?php echo $walikelass['101'] ?? 'Tidak diketahui'; ?></li>
        <li>Ketua Kelas :</li>
        <table>
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam Pelajaran</th>
                    <th>Mapel</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Senin</td>
                    <td>08:00 - 09:30</td>
                    <td>Matematika</td>
                </tr>
                <tr>
                    <td>Senin</td>
                    <td>09:45 - 11:15</td>
                    <td>Bahasa Indonesia</td>
                </tr>
                <!-- Tambahkan data lainnya di sini -->
            </tbody>
        </table>
    </div>
    <div class="tabel-kelas">
        <h2>KELAS 10-B</h2>
        <li>Wali Kelas : <?php echo $walikelass['102'] ?? 'Tidak diketahui'; ?></li>
        <li>Ketua Kelas :</li>
        <table>
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam Pelajaran</th>
                    <th>Mapel</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Senin</td>
                    <td>08:00 - 09:30</td>
                    <td>Fisika</td>
                </tr>
                <tr>
                    <td>Senin</td>
                    <td>09:45 - 11:15</td>
                    <td>Kimia</td>
                </tr>
                <!-- Tambahkan data lainnya di sini -->
            </tbody>
        </table>
    </div>
</div>

<div class="kelas">
    <div class="tabel-kelas">
        <h2>KELAS 11-A</h2>
        <li>Wali Kelas : <?php echo $walikelass['103'] ?? 'Tidak diketahui'; ?></li>
        <li>Ketua Kelas :</li>
        <table>
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam Pelajaran</th>
                    <th>Mapel</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Senin</td>
                    <td>08:00 - 09:30</td>
                    <td>Matematika</td>
                </tr>
                <tr>
                    <td>Senin</td>
                    <td>09:45 - 11:15</td>
                    <td>Bahasa Indonesia</td>
                </tr>
                <!-- Tambahkan data lainnya di sini -->
            </tbody>
        </table>
    </div>
    <div class="tabel-kelas">
        <h2>KELAS 11-B</h2>
        <li>Wali Kelas : <?php echo $walikelass['104'] ?? 'Tidak diketahui'; ?></li>
        <li>Ketua Kelas :</li>
        <table>
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam Pelajaran</th>
                    <th>Mapel</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Senin</td>
                    <td>08:00 - 09:30</td>
                    <td>Fisika</td>
                </tr>
                <tr>
                    <td>Senin</td>
                    <td>09:45 - 11:15</td>
                    <td>Kimia</td>
                </tr>
                <!-- Tambahkan data lainnya di sini -->
            </tbody>
        </table>
    </div>
</div>

<div class="kelas">
    <div class="tabel-kelas">
        <h2>KELAS 12-A</h2>
        <li>Wali Kelas : <?php echo $walikelass['105'] ?? 'Tidak diketahui'; ?></li>
        <li>Ketua Kelas :</li>
        <table>
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam Pelajaran</th>
                    <th>Mapel</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Senin</td>
                    <td>08:00 - 09:30</td>
                    <td>Matematika</td>
                </tr>
                <tr>
                    <td>Senin</td>
                    <td>09:45 - 11:15</td>
                    <td>Bahasa Indonesia</td>
                </tr>
                <!-- Tambahkan data lainnya di sini -->
            </tbody>
        </table>
    </div>
    <div class="tabel-kelas">
        <h2>KELAS 12-B</h2>
        <li>Wali Kelas : <?php echo $walikelass['106'] ?? 'Tidak diketahui'; ?></li>
        <li>Ketua Kelas :</li>
        <table>
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam Pelajaran</th>
                    <th>Mapel</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Senin</td>
                    <td>08:00 - 09:30</td>
                    <td>Fisika</td>
                </tr>
                <tr>
                    <td>Senin</td>
                    <td>09:45 - 11:15</td>
                    <td>Kimia</td>
                </tr>
                <!-- Tambahkan data lainnya di sini -->
            </tbody>
        </table>
    </div>
</div>
<!-- Repeat similar blocks for other classes -->

<!-- Bootstrap JS -->
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>


