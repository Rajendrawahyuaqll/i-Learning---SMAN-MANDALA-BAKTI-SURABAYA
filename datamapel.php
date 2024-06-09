<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mapel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
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
            <img src="img/logo.png" alt="" />
        </div>
        <ul class="sidebar-items">
            <li class="main-item">
                <i class="bi bi-speedometer2"></i><a href="#">Dashboard</a>
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

        <!-- Profil Admin -->
    </div>

    <!-- MAIN CONTENT -->
    <header>
        <h1>Data Mata Pelajaran SMAN MANDALA BAKTI SURABAYA</h1>
    </header>
    <div class="content">
        <div class="top-content">
            <h2>Tabel Mata Pelajaran </h2>
            <div class="button-container-mapel">
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
                    <th>Kode Mata Pelajaran</th>
                    <th>Nama Mata Pelajaran</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $servername = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "sma_manba";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch data from pelajarans table
                $sql = "SELECT id, nama_mapel FROM pelajarans";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // Output data of each row
                  $no = 1; // Initialize counter here
                  while($row = $result->fetch_assoc()) {
                      echo "<tr>
                              <td>" . $no++ . "</td>
                              <td>" . $row["id"] . "</td>
                              <td>" . $row["nama_mapel"] . "</td>
                              <td>1</td>
                              <td>
                                  <button class='btn-guru1'>Edit</button>
                                  <button class='btn-guru2'>Delete</button>
                              </td>
                            </tr>";
                  }
              } else {
                  echo "<tr><td colspan='5'>No data available</td></tr>";
              }

              $conn->close();
              ?>
          </tbody>
      </table>
  </div>

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