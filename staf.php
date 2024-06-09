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

// Langkah 2: Pengambilan data staf berdasarkan role_id
$sql_admin = "SELECT * FROM pegawais WHERE role_id = 1";
$result_admin = $conn->query($sql_admin);

$sql_finance = "SELECT * FROM pegawais WHERE role_id = 2";
$result_finance = $conn->query($sql_finance);

$sql_academic = "SELECT * FROM pegawais WHERE role_id = 3";
$result_academic = $conn->query($sql_academic);

// Proses penyisipan data staf baru
if (isset($_POST['nama_pegawai'])) {
    $id = $_POST["id"];
    $nama_pegawai = $_POST["nama_pegawai"];
    $ttl = $_POST["ttl"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $agama = $_POST["agama"];
    $pendidikan_akhir = $_POST["pendidikan_akhir"];
    $email = $_POST["email"];
    $user = $_POST["user"];
    $role_id = $_POST["role_id"];
    $no_hp = $_POST["no_hp"];

    $query_sql = "INSERT INTO pegawais (id, nama_pegawai, ttl, jenis_kelamin, agama, pendidikan_akhir, email, user, role_id, no_hp) 
                  VALUES ('$id', '$nama_pegawai', '$ttl', '$jenis_kelamin', '$agama', '$pendidikan_akhir', '$email', '$user', '$role_id', '$no_hp')";

    if (mysqli_query($conn, $query_sql)) {
        // Pendaftaran berhasil, arahkan pengguna ke halaman login
        echo "<script>window.location.href = 'login.php';</script>";
        exit(); // Pastikan untuk keluar dari skrip setelah pengalihan
    } else {
        echo "Error: " . $query_sql . "<br>" . mysqli_error($conn);
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
    <title>i-Learning-SMAN MANDALA BAKTI SURABAYA</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet" />

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />

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
          <a class="navbar-brand" href="index.html">
            <img src="images/logosekolah-logosite.png" alt="" style="height: 100px" />
            <nav class="navbar">
              <a href="index.html" class="nama-website">SMA MANDALA BAKTI</a>
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
                  <a class="dropdown-item" href="siswa.html">Siswa</a>
                  <a class="dropdown-item" href="guru.html">Guru</a>
                  <a class="dropdown-item" href="staf.html">Staf</a>
                </div>
              </li>
              <li class="nav-item"><a class="nav-link" href="kelas.html">Kelas</a></li>
              <li class="nav-item"><a class="nav-link" href="elearning.html">e-Learning</a></li>
              <li class="nav-item"><a class="nav-link" href="ekskul.html">Ekskul</a></li>
              <li class="nav-item"><a class="nav-link" href="prestasi.html">Prestasi</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- End header -->

    <!-- Main Content -->
    <div class="staf">
      <div class="navigasi-staf">
        <h2>STAF</h2>

        <ul>
          <li><a href="#administrasi">Staf Administrasi</a></li>
          <li><a href="#keuangan">Staf Keuangan</a></li>
          <li><a href="#akademik">Staf Akademik</a></li>
        </ul>
      </div>

      <!-- Konten Utama -->
      <div class="data-staf">
        <h2>DATA STAF SMAN MANDALA BAKTI</h2>

        <!-- Tabel Data Staf Administrasi -->
        <h3 id="administrasi">Staf Administrasi</h3>
        <table class="tabel-staf">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Email</th>
            <th>No. Telp</th>
          </tr>
          <?php
          if ($result_admin->num_rows > 0) {
              $no_admin = 1;
              while ($row = $result_admin->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $no_admin++ . "</td>";
                  echo "<td>" . $row["nama_pegawai"] . "</td>";
                  echo "<td>" . $row["id"] . "</td>";
                  echo "<td>" . $row["email"] . "</td>";
                  echo "<td>" . $row["no_hp"] . "</td>";
                  echo "</tr>";
              }
          }
          ?>
        </table>

        <!-- Tabel Data Staf Keuangan -->
        <h3 id="keuangan">Staf Keuangan</h3>
        <table class="tabel-staf">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Email</th>
            <th>No. Telp</th>
          </tr>
          <?php
          if ($result_finance->num_rows > 0) {
              $no_finance = 1;
              while ($row = $result_finance->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $no_finance++ . "</td>";
                  echo "<td>" . $row["nama_pegawai"] . "</td>";
                  echo "<td>" . $row["id"] . "</td>";
                  echo "<td>" . $row["email"] . "</td>";
                  echo "<td>" . $row["no_hp"] . "</td>";
                  echo "</tr>";
              }
          }
          ?>
        </table>

        <!-- Tabel Data Staf Akademik -->
        <h3 id="akademik">Staf Akademik</h3>
        <table class="tabel-staf">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Email</th>
            <th>No. Telp</th>
          </tr>
          <?php
          if ($result_academic->num_rows > 0) {
              $no_academic = 1;
              while ($row = $result_academic->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $no_academic++ . "</td>";
                  echo "<td>" . $row["nama_pegawai"] . "</td>";
                  echo "<td>" . $row["id"] . "</td>";
                  echo "<td>" . $row["email"] . "</td>";
                  echo "<td>" . $row["no_hp"] . "</td>";
                  echo "</tr>";
              }
          }
          ?>
        </table>
      </div>
    </div>

    <!-- Footer -->

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
  </body>
</html>

<?php
// Tutup koneksi database
$conn->close();
?>