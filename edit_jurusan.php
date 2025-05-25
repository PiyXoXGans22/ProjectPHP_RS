<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Spesialis</title>
    <link rel="icon" type="image/png" href="img/logors.png">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            background-image: url("img/bg_login1.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(3px);
            background-color: rgba(0, 0, 0, 0.3);
            z-index: -1;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            margin-bottom: 30px;
        }

        h1, h2 {
            text-align: center;
            color: green;
            margin-bottom: 20px;
        }

        form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"], input[type="button"] {
            background-color: #00796b;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }

        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #004d40;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #00796b;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            color: #d32f2f;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">

<?php include ("koneksi.php"); ?>

<?php 
if (isset($_GET['id_jurusan'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id_jurusan']);
    $sql_edit = mysqli_query($koneksi, "SELECT * FROM tb_jurusan WHERE id_jurusan = '$id'");
    
    if ($data = mysqli_fetch_array($sql_edit, MYSQLI_ASSOC)) {
        $ed_id_jurusan = $data['id_jurusan'];
        $ed_nama_jurusan = $data['nama_jurusan'];
?>

<div class="card">
    <h2>Edit Data Jurusan</h2>
    <form action="edit_jurusan.php" method="POST">
        <input type="hidden" name="id_jurusan" value="<?php echo htmlspecialchars($ed_id_jurusan); ?>">
        <label for="nama_jurusan">Nama Jurusan:</label>
        <input type="text" id="nama_jurusan" name="nama_jurusan" value="<?php echo htmlspecialchars($ed_nama_jurusan); ?>" required>
        <input type="submit" name="update" value="Update">
        <input type="button" name="batal" value="Batal" onclick="window.location.href='halaman_utama.php'">
    </form>
</div>

<?php 
    } else {
        echo "<p class='error'>Jurusan tidak ditemukan.</p>";
    }
} 
?>

<div class="card">
    <h2>Daftar Data Spesialis</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th width='150'>Nama Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_jurusan ORDER BY id_jurusan ASC");
        $no = 1;
        while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
            $id_jurusan = $row['id_jurusan'];
            $nama_jurusan = $row['nama_jurusan'];
            echo "
                <tr>
                    <td>".$no."</td>
                    <td width='150'>".htmlspecialchars($nama_jurusan)."</td>
                    <td><a href='edit_jurusan.php?id_jurusan=".$id_jurusan."'>Edit</a></td>
                </tr>
            ";
            $no++;
        }
        ?>
        </tbody>
    </table>
</div>

<?php
if (isset($_POST['update'])) {
    $id_jurusan = mysqli_real_escape_string($koneksi, $_POST['id_jurusan']);
    $nama_jurusan = mysqli_real_escape_string($koneksi, $_POST['nama_jurusan']);

    $update_query = "UPDATE tb_jurusan SET nama_jurusan='$nama_jurusan' WHERE id_jurusan='$id_jurusan'";
    mysqli_query($koneksi, $update_query);

    echo "<p style='text-align:center; color:white; font-weight:bold;'>Data Telah Terupdate</p>";
    echo "<meta http-equiv='refresh' content='2;URL=\"edit_jurusan.php\"'>";
}
?>
</div>
</body>
</html>
