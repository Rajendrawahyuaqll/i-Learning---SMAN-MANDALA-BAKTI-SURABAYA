<?php
// File koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sma_manba";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tambah data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $ttl = $_POST['tempat_lahir'] . ", " . $_POST['tanggal_lahir'];
    $agama = $_POST['agama'];
    $kelas = $_POST['kelas'];

    $sql = "INSERT INTO siswas (nama, nisn, jenis_kelamin, ttl, agama, id_kelas) VALUES ('$nama', '$nis', '$jenis_kelamin', '$ttl', '$agama', '$kelas')";
    $conn->query($sql);
    header("Location: index.php");
    exit();
}

// Edit data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $ttl = $_POST['tempat_lahir'] . ", " . $_POST['tanggal_lahir'];
    $agama = $_POST['agama'];
    $kelas = $_POST['kelas'];

    $sql = "UPDATE siswas SET nama='$nama', nisn='$nis', jenis_kelamin='$jenis_kelamin', ttl='$ttl', agama='$agama', id_kelas='$kelas' WHERE id='$id'";
    $conn->query($sql);
    header("Location: index.php");
    exit();
}

// Delete data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];

    $sql = "DELETE FROM siswas WHERE id='$id'";
    $conn->query($sql);
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Siswa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
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
        <h1>Data Siswa SMAN MANDALA BAKTI SURABAYA</h1>
    </header>
    <div class="content">
        <div class="top-content">
            <h2>Tabel Siswa</h2>
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
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Jenis Kelamin</th>
                    <th>TTL</th>
                    <th>Agama</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM siswas";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $no++ . "</td>
                                <td>" . $row["nama"] . "</td>
                                <td>" . $row["nisn"] . "</td>
                                <td>" . $row["jenis_kelamin"] . "</td>
                                <td>" . $row["ttl"] . "</td>
                                <td>" . $row["agama"] . "</td>
                                <td>" . $row["id_kelas"] . "</td>
                                <td>
                                    <button class='btn-edit' data-id='" . $row["id"] . "' data-nama='" . $row["nama"] . "' data-nis='" . $row["nisn"] . "' data-jenis_kelamin='" . $row["jenis_kelamin"] . "' data-tempat_lahir='" . explode(", ", $row["ttl"])[0] . "' data-tanggal_lahir='" . explode(", ", $row["ttl"])[1] . "' data-agama='" . $row["agama"] . "' data-kelas='" . $row["id_kelas"] . "'>Edit</button>
                                    <button class='btn-delete' data-id='" . $row["id"] . "'>Delete</button>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Modal untuk Tambah Data -->
    <div id="modal-tambah" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Tambah Data Siswa</h2>
            <form id="form-tambah" method="POST">
                <input type="hidden" name="action" value="add" />
                <input type="text" name="nama" placeholder="Nama" required />
                <input type="text" name="nis" placeholder="NIS" required />
                <input type="text" name="jenis_kelamin" placeholder="Jenis Kelamin" required />
                <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" required />
                <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required />
                <input type="text" name="agama" placeholder="Agama" required />
                <input type="text" name="kelas" placeholder="Kelas" required />
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Modal untuk Edit Data -->
    <div id="modal-edit" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit Data Siswa</h2>
            <form id="form-edit" method="POST">
                <input type="hidden" name="action" value="edit" />
                <input type="hidden" id="edit-id" name="id" />
                <input type="text" id="edit-nama" name="nama" placeholder="Nama" required />
                <input type="text" id="edit-nis" name="nis" placeholder="NIS" required />
                <input type="text" id="edit-jenis_kelamin" name="jenis_kelamin" placeholder="Jenis Kelamin" required />
                <input type="text" id="edit-tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required />
                <input type="date" id="edit-tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" required />
                <input type="text" id="edit-agama" name="agama" placeholder="Agama" required />
                <input type="text" id="edit-kelas" name="kelas" placeholder="Kelas" required />
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <form id="form-delete" method="POST" style="display:none;">
        <input type="hidden" name="action" value="delete" />
        <input type="hidden" id="delete-id" name="id" />
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modalTambah = document.getElementById('modal-tambah');
            const modalEdit = document.getElementById('modal-edit');
            const btnTambah = document.querySelector('.btn-addData');
            const closeButtons = document.querySelectorAll('.close');

            btnTambah.onclick = function() {
                modalTambah.style.display = 'block';
            };

            closeButtons.forEach(button => {
                button.onclick = function() {
                    modalTambah.style.display = 'none';
                    modalEdit.style.display = 'none';
                };
            });

            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('btn-edit')) {
                    modalEdit.style.display = 'block';
                    document.getElementById('edit-id').value = e.target.getAttribute('data-id');
                    document.getElementById('edit-nama').value = e.target.getAttribute('data-nama');
                    document.getElementById('edit-nis').value = e.target.getAttribute('data-nis');
                    document.getElementById('edit-jenis_kelamin').value = e.target.getAttribute('data-jenis_kelamin');
                    document.getElementById('edit-tempat_lahir').value = e.target.getAttribute('data-tempat_lahir');
                    document.getElementById('edit-tanggal_lahir').value = e.target.getAttribute('data-tanggal_lahir');
                    document.getElementById('edit-agama').value = e.target.getAttribute('data-agama');
                    document.getElementById('edit-kelas').value = e.target.getAttribute('data-kelas');
                } else if (e.target.classList.contains('btn-delete')) {
                    const confirmDelete = confirm('Are you sure you want to delete this record?');
                    if (confirmDelete) {
                        document.getElementById('delete-id').value = e.target.getAttribute('data-id');
                        document.getElementById('form-delete').submit();
                    }
                }
            });

            window.onclick = function(event) {
                if (event.target === modalTambah) {
                    modalTambah.style.display = 'none';
                } else if (event.target === modalEdit) {
                    modalEdit.style.display = 'none';
                }
            };
        });
    </script>
</body>
</html>