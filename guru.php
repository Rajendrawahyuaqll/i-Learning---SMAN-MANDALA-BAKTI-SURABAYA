<?php
$servername = "localhost";
$database = "sma_manba";
$username = "root";
$password_db = "";

$conn = mysqli_connect($servername, $username, $password_db, $database);

if (!$conn) {
    die("Koneksi Gagal : " . mysqli_connect_error());
}

$sql_guru = "SELECT id_mapel, nama, nip FROM gurumapels";
$result_guru = mysqli_query($conn, $sql_guru);

$guru_data = array();
if ($result_guru->num_rows > 0) {
    while ($row = $result_guru->fetch_assoc()) {
        $guru_data[] = $row;
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Site Metas -->
<title>i-Learning-SMAN MANDALA BAKTI SURABAYA</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<!-- Site Icons -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Site CSS -->

<!-- ALL VERSION CSS -->
<link rel="stylesheet" href="css/versions.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="css/responsive.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="style.css">

<!-- Modernizer for Portfolio -->
<script src="js/modernizer.js"></script>

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>



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

    <div class="guru">
        <div class="guru-section">
            <h1>DATA GURU</h1>
            <h4>SMAN MANDALA BAKTI SURABAYA</h4>
        </div>

        <div class="team section" id="team">
            <div class="container">
                <div class="row">
                    <?php foreach ($guru_data as $guru) { ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="team-member">
                                <div class="main-content">
                                    <img src="https://i.pinimg.com/564x/ac/30/2d/ac302d0c7c0a1c613604c34403c25db2.jpg" alt="">
                                    <span class="category"><?php echo $guru['id_mapel']; ?></span>
                                    <h4><?php echo $guru['nama']; ?></h4>
                                    <p><?php echo $guru['nip']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->


    <!-- End Footer -->

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>

</body>

</html>