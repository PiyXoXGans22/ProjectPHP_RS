<html>
<head>
    <title>Hapus Data Jurusan</title>
    <link rel="icon" type="image/png" href="img/logors.png">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            background-image: url("img/bg_login1.jpg");
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-repeat: no-repeat;
        }

        /* Overlay blur */
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

        h1 {
            color: #007b5f;
            margin-top: 0;
        }

        table {
            margin: 40px auto;
            border-collapse: collapse;
            width: 70%;
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        th {
            background-color: #007b5f;
            color: #ffffff;
            padding: 12px;
            text-align: center;
        }

        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 10px;
            background-color: #e7f3f7;
        }

        a {
            color: #007b5f;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .table-container {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
<div class="table-container">
    <table width="80%">
        <thead>
            <tr>
                <th colspan="3" style="background-color: white;">
                    <h1>Hapus Data Spesialis</h1>
                </th>
            </tr>
            <tr>
                <th>No</th>
                <th style="width: 150px;">Nama Spesialis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("koneksi.php");
            $sql = mysqli_query($koneksi, "SELECT * FROM tb_jurusan ORDER BY id_jurusan ASC");
            $no = 1;
            while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                $id_jurusan = $row['id_jurusan'];
                $nama_jurusan = $row['nama_jurusan'];
                echo "<tr>
                        <td>$no.</td>
                        <td>$nama_jurusan</td>
                        <td><a href='?id=$id_jurusan'> Hapus </a></td>
                      </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>

<?php
if(isset($_GET['id'])){
    mysqli_query($koneksi, "DELETE FROM tb_jurusan WHERE id_jurusan='$_GET[id]'");
    echo "<p style='color:white; font-weight:bold;'>Data Telah Terhapus</p>";
    echo "<meta http-equiv='refresh' content='2;URL=\"hapus_jurusan.php\"'>";
}
?>
</body>
</html>
