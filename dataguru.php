<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard SIAKAD</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Perbaiki tanda kutip penutup di sini -->
    <link rel="stylesheet" href="style/admin.css" />
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
    </div>

    <header>
        <h1>Data Guru SMAN MANDALA BAKTI SURABAYA</h1>
    </header>
    <div class="content">
        <div class="top-content">
            <h2>Tabel Guru</h2>
            <div class="button-container">
                <button class="btn-addData" onclick="showAddModal()">+Tambah Data</button>
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
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Jenis Kelamin</th>
                    <th>TTL</th>
                    <th>Agama</th>
                    <th>No Hp</th>
                    <th>Mapel</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "sma_manba";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['action'])) {
                        if ($_POST['action'] == 'add') {
                            $nama = $_POST['nama'];
                            $nip = $_POST['nip'];
                            $jenis_kelamin = $_POST['jenis_kelamin'];
                            $ttl = $_POST['ttl'];
                            $Agama = $_POST['Agama'];
                            $no_hp = $_POST['no_hp'];
                            $id_mapel = $_POST['id_mapel'];

                            $sql = "INSERT INTO gurumapels (nama, nip, jenis_kelamin, ttl, Agama, no_hp, id_mapel) VALUES ('$nama', '$nip', '$jenis_kelamin', '$ttl', '$Agama', '$no_hp', '$id_mapel')";
                            if ($conn->query($sql) === TRUE) {
                                echo "New record created successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        } elseif ($_POST['action'] == 'edit') {
                            $id = $_POST['id'];
                            $nama = $_POST['nama'];
                            $nip = $_POST['nip'];
                            $jenis_kelamin = $_POST['jenis_kelamin'];
                            $ttl = $_POST['ttl'];
                            $Agama = $_POST['Agama'];
                            $no_hp = $_POST['no_hp'];
                            $id_mapel = $_POST['id_mapel'];

                            $sql = "UPDATE gurumapels SET nama='$nama', nip='$nip', jenis_kelamin='$jenis_kelamin', ttl='$ttl', Agama='$Agama', no_hp='$no_hp', id_mapel='$id_mapel' WHERE id='$id'";
                            if ($conn->query($sql) === TRUE) {
                                echo "Record updated successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                    }
                }

                if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'delete') {
                    $id = $_GET['id'];

                    $sql = "DELETE FROM gurumapels WHERE id='$id'";
                    if ($conn->query($sql) === TRUE) {
                        echo "Record deleted successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }

                $sql = "SELECT id, nama, nip, ttl, jenis_kelamin, Agama, no_hp, id_mapel FROM gurumapels";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $no++ . "</td>
                                <td>" . $row["nama"] . "</td>
                                <td>" . $row["nip"] . "</td>
                                <td>" . $row["jenis_kelamin"] . "</td>
                                <td>" . $row["ttl"] . "</td>
                                <td>" . $row["Agama"] . "</td>
                                <td>" . $row["no_hp"] . "</td>
                                <td>" . $row["id_mapel"] . "</td>
                                <td>
                                    <button class='btn-guru1' onclick='showEditModal(" . json_encode($row) . ")'>Edit</button>
                                    <button class='btn-guru2' onclick='deleteData(" . $row["id"] . ")'>Delete</button>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No data found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Add Data Modal -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeAddModal()">&times;</span>
            <form method="post">
                <input type="hidden" name="action" value="add">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
                <label for="nip">NIP:</label>
                <input type="text" id="nip" name="nip" required>
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <input type="text" id="jenis_kelamin" name="jenis_kelamin" required>
                <label for="ttl">TTL:</label>
                <input type="text" id="ttl" name="ttl" required>
                <label for="Agama">Agama:</label>
                <input type="text" id="Agama" name="Agama" required>
                <label for="no_hp">No HP:</label>
                <input type="text" id="no_hp" name="no_hp" required>
                <label for="id_mapel">Mapel:</label>
                <input type="text" id="id_mapel" name="id_mapel" required>
                <button type="submit">Tambah</button>
            </form>
        </div>
    </div>

     <!-- Edit Data Modal -->
     <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <form method="post">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" id="edit_id" name="id">
                <label for="edit_nama">Nama:</label>
                <input type="text" id="edit_nama" name="nama" required>
                <label for="edit_nip">NIP:</label>
                <input type="text" id="edit_nip" name="nip" required>
                <label for="edit_jenis_kelamin">Jenis Kelamin:</label>
                <input type="text" id="edit_jenis_kelamin" name="jenis_kelamin" required>
                <label for="edit_ttl">TTL:</label>
                <input type="text" id="edit_ttl" name="ttl" required>
                <label for="edit_Agama">Agama:</label>
                <input type="text" id="edit_Agama" name="Agama" required>
                <label for="edit_no_hp">No HP:</label>
                <input type="text" id="edit_no_hp" name="no_hp" required>
                <label for="edit_id_mapel">Mapel:</label>
                <input type="text" id="edit_id_mapel" name="id_mapel" required>
                <button type="submit">Edit</button>
            </form>
        </div>
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

        function showAddModal() {
            document.getElementById('addModal').style.display = 'block';
        }

        function closeAddModal() {
            document.getElementById('addModal').style.display = 'none';
        }

        function showEditModal(data) {
            document.getElementById('edit_id').value = data.id;
            document.getElementById('edit_nama').value = data.nama;
            document.getElementById('edit_nip').value = data.nip;
            document.getElementById('edit_jenis_kelamin').value = data.jenis_kelamin;
            document.getElementById('edit_ttl').value = data.ttl;
            document.getElementById('edit_Agama').value = data.Agama;
            document.getElementById('edit_no_hp').value = data.no_hp;
            document.getElementById('edit_id_mapel').value = data.id_mapel;
            document.getElementById('editModal').style.display = 'block';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        function deleteData(id) {
            if (confirm('Are you sure you want to delete this data?')) {
                window.location.href = '?action=delete&id=' + id;
            }
        }
    </script>
</body>
</html>