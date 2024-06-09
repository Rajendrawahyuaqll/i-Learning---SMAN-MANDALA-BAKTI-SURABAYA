<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your database password
$dbname = "sma_manba";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT id, nama_kelas, ruang FROM kelass";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Kelas</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="style/admin.css" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-sidebar">
        <img src="images/logosekolah-logosite.png" alt="Logo Sekolah" />
      </div>
      <ul class="sidebar-items">
        <li class="main-item">
          <i class="bi bi-speedometer2"></i><a href="admin.php">Dashboard</a>
        </li>
        <li class="dropdown">
          <i class="bi bi-clipboard-data"></i><a href="#">Data Master</a>
          <ul class="dropdown-content">
            <li><a href="dataguru.php">Data Guru</a></li>
            <li><a href="datasiswa.php">Data Siswa</a></li>
            <li><a href="datamapel.php">Data Mapel</a></li>
            <li><a href="datastaf.php">Data Staf</a></li>
            <li><a href="datakelas.php">Data Kelas</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="header">
      <h1>Sistem Informasi Akademik</h1>
      <!-- Profil Admin -->
    </div>

    <!-- MAIN CONTENT -->
    <header>
      <h1>Data Kelas SMAN Mandala Bakti Surabaya</h1>
    </header>
    <div class="content">
      <div class="top-content">
        <h2>Tabel Kelas</h2>
        <div class="button-container">
          <button class="btn-addData">+Tambah Data</button>
        </div>
      </div>
      <form>
        <div class="search">
          <span><i class="bi bi-search"></i></span>
          <input class="search-input" type="search" placeholder="Cari" />
        </div>
      </form>

      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Ruangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
              $no = 1;
              while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $no++ . "</td>";
                  echo "<td>" . htmlspecialchars($row["nama_kelas"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["ruang"]) . "</td>";
                  echo "<td>
                          <button class='btn-kelas1'>Edit</button>
                          <button class='btn-kelas2'>Delete</button>
                        </td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='4'>No data found</td></tr>";
          }
          $conn->close();
          ?>
        </tbody>
      </table>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('.search-input');
        const tableRows = document.querySelectorAll('tbody tr');

        searchInput.addEventListener('input', function() {
          const searchText = this.value.toLowerCase().trim();

          tableRows.forEach(row => {
            const rowData = row.textContent.toLowerCase();
            if (rowData.includes(searchText)) {
              row.style.display = 'table-row';
            } else {
              row.style.display = 'none';
            }
          });
        });
      });
    </script>
  </body>
</html>