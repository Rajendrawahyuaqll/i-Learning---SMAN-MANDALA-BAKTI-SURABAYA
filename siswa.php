<?php
// Database connection details for fetching student data
$servername_fetch = "localhost";
$database_fetch = "sma_manba";
$username_fetch = "root";
$password_db_fetch = "";

// Create connection for fetching student data
$conn_fetch = mysqli_connect($servername_fetch, $username_fetch, $password_db_fetch, $database_fetch);

// Check connection for fetching student data
if (!$conn_fetch) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

// Fetch student data
$nisn = '22051214137'; // Example NISN, this should be dynamically set based on the logged-in user
$query = "SELECT * FROM siswas WHERE nisn = '$nisn'";
$result = mysqli_query($conn_fetch, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nama = $row['nama'];
    $nis = $row['id'];
    $kelas = $row['id_kelas']; // Assuming id_kelas can be translated to the class name
} else {
    echo "No student found with the given NISN.";
    $nama = $nis = $kelas = "Unknown";
}

// Cek apakah tombol "Hadir" telah diklik
if (isset($_POST['absen_nis'])) {
    // Ambil NIS dari form
    $nis_absen = $_POST['absen_nis'];

    // Tambahkan query SQL untuk menyimpan data absensi ke dalam tabel
    $query_absen = "INSERT INTO absensis (nis, id_tahun_ajaran, tgl_absen, status_absen) VALUES ('$nis_absen', '2024', NOW(), 'HADIR')";

    // Eksekusi query
    if (mysqli_query($conn_fetch, $query_absen)) {
        echo "<script>alert('Absensi berhasil disimpan');</script>";
    } else {
        echo "Error: " . $query_absen . "<br>" . mysqli_error($conn_fetch);
    }
}

mysqli_close($conn_fetch);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>i-Learning - SMAN MANDALA BAKTI SURABAYA</title>  
    <link rel="shortcut icon" href="images/logosekolah-logosite.png" type="logosekolah-logosite" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/versions.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/modernizer.js"></script>
</head>
<body class="host_version"> 

  <!-- Start header -->
  <header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html">
          <img src="images/logosekolah-logosite.png" alt="" style="height: 100px;"/>
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
            <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="about.html">Tentang kami</a></li>
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

  <div class="siswa">
    <!-- Bagian Kiri (Profil Siswa) -->
    <div class="sidebar-left">
      <div class="profile-container">
        <!-- Photo Profile -->
        <div class="photo-profile">
          <img src="https://i.pinimg.com/564x/d7/fd/9e/d7fd9e0b952d5f9b9adff6ec29a8b20d.jpg" alt="Photo Profile">
        </div>
        <!-- Informasi Siswa -->
        <div class="info">
          <h2><?php echo $nama; ?></h2>
          <p>NIS: <?php echo $nis; ?></p>
          <p>Kelas: <?php echo $kelas; ?></p>
          <p>Angkatan: 2023</p>
        </div>
      </div>
      <div class="payment-info">
        <h3>Kode VA Pembayaran</h3>
        <p>Kode VA: 1234 5678 9012 3456</p>
      </div>
    </div>
    <!-- Bagian Kanan (Konten Utama) -->
    <div class="main-content">
        <!-- Konten Utama -->
       <table class="jadwal-sekolah">
        <thead>
            <tr>
                <th>Hari</th>
                <th>Jam Pelajaran</th>
                <th>Mata Pelajaran</th>
                <th>Absensi</th>
            </tr>
        </thead>
        <tbody>
            <form method="post" action="">
            <tr>
                <td rowspan="3">Senin</td>
                <td>07:00 - 08:30</td>
                <td>Matematika</td>
                <td>
                    <button type="submit" name="absen_nis" value="<?php echo $nis; ?>" class="btn btn-secondary">Hadir</button>
                </td>
            </tr>
            <tr>
                <td>09:00 - 10:30</td>
                <td>Bahasa Indonesia</td>
                <td>
                    <button type="submit" name="absen_nis" value="<?php echo $nis; ?>" class="btn btn-secondary">Hadir</button>
                </td>
            </tr>
            <tr>
                <td>11:00 - 12:30</td>
                <td>IPA</td>
                <td>
                    <button type="submit" name="absen_nis" value="<?php echo $nis; ?>" class="btn btn-secondary">Hadir</button>
                </td>
            </tr>
            <tr>
            <td rowspan="3">Selasa</td>
            <td>07:00 - 08:30</td>
            <td>Matematika</td>
            <td>
              <button type="submit" name="absen_nis" value="<?php echo $nis; ?>" class="btn btn-secondary">Hadir</button>
            </td>
        </tr>
        <tr>
            <td>09:00 - 10:30</td>
            <td>Bahasa Indonesia</td>
            <td>
              <button type="submit" name="absen_nis" value="<?php echo $nis; ?>" class="btn btn-secondary">Hadir</button>
            </td>
        </tr>
        <tr>
            <td>11:00 - 12:30</td>
            <td>IPA</td>
            <td>
              <button type="submit" name="absen_nis" value="<?php echo $nis; ?>" class="btn btn-secondary">Hadir</button>
            </td>
        </tr>
        <tr>
            <td rowspan="3">Rabu</td>
            <td>07:00 - 08:30</td>
            <td>Matematika</td>
            <td>
              <button type="submit" name="absen_nis" value="<?php echo $nis; ?>" class="btn btn-secondary">Hadir</button>
            </td>
        </tr>
        <tr>
            <td>09:00 - 10:30</td>
            <td>Bahasa Indonesia</td>
            <td>
              <button type="submit" name="absen_nis" value="<?php echo $nis; ?>" class="btn btn-secondary">Hadir</button>
            </td>
        </tr>
        <tr>
            <td>11:00 - 12:30</td>
            <td>IPA</td>
            <td>
              <button type="submit" name="absen_nis" value="<?php echo $nis; ?>" class="btn btn-secondary">Hadir</button>
            </td>
        </tr>
        <tr>
            <td rowspan="3">Kamis</td>
            <td>07:00 - 08:30</td>
            <td>Matematika</td>
            <td>
              <button type="submit" name="absen_nis" value="<?php echo $nis; ?>" class="btn btn-secondary">Hadir</button>
            </td>
        </tr>
        <tr>
            <td>09:00 - 10:30</td>
            <td>Bahasa Indonesia</td>
            <td>
              <button type="submit" name="absen_nis" value="<?php echo $nis; ?>" class="btn btn-secondary">Hadir</button>
            </td>
        </tr>
        <tr>
            <td>11:00 - 12:30</td>
            <td>IPA</td>
            <td><button class="btn btn-secondary" onclick="absen(<?php echo $siswa['id']; ?>)">Hadir</button></td>
        </tr>
    </tbody>
</table>
</div>
</div>


<div class="semester-info" id="semester">
    <h4>SEMESTER II</h4>
    <p>Tahun Ajaran 2024/2025</p>
</div>

<table class="nilai-semester">
    <thead>
        <tr>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Nilai Tugas</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Matematika</td>
            <td>85</td>
            <td>78</td>
            <td>82</td>
            <td>82</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Bahasa Indonesia</td>
            <td>90</td>
            <td>88</td>
            <td>92</td>
            <td>90</td>
        </tr>
        <!-- Tambahkan baris untuk mata pelajaran lainnya seperti di atas -->
    </tbody>
</table>

<div class="semester-info" id="semester">
    <h4>SEMESTER II</h4>
    <p>Tahun Ajaran 2024/2025</p>
</div>

<table class="nilai-semester">
    <thead>
        <tr>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Nilai Tugas</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Matematika</td>
            <td>85</td>
            <td>78</td>
            <td>82</td>
            <td>82</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Bahasa Indonesia</td>
            <td>90</td>
            <td>88</td>
            <td>92</td>
            <td>90</td>
        </tr>
        <!-- Tambahkan baris untuk mata pelajaran lainnya seperti di atas -->
    </tbody>
</table>
<div class="semester-info" id="semester">
    <h4>SEMESTER II</h4>
    <p>Tahun Ajaran 2024/2025</p>
</div>

<table class="nilai-semester">
    <thead>
        <tr>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Nilai Tugas</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Matematika</td>
            <td>85</td>
            <td>78</td>
            <td>82</td>
            <td>82</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Bahasa Indonesia</td>
            <td>90</td>
            <td>88</td>
            <td>92</td>
            <td>90</td>
        </tr>
        <!-- Tambahkan baris untuk mata pelajaran lainnya seperti di atas -->
    </tbody>
</table>

<script src="js/all.js"></script>
<script src="js/custom.js"></script>
<script src="js/timeline.min.js"></script>
<script>
  timeline(document.querySelectorAll('.timeline'), {
    mode: 'horizontal',
    visibleItems: 4,
    forceVerticalMode: 700
  });
</script>

</body>
</html>