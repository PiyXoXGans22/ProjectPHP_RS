<?php
include("koneksi.php");

$sql = mysqli_query($koneksi, "
  SELECT d.*, j.nama_jurusan 
  FROM tambah_dokter d
  LEFT JOIN tb_jurusan j ON d.id_jurusan = j.id_jurusan
  ORDER BY d.id ASC
");

if (!$sql) {
  die("Query error: " . mysqli_error($koneksi));
}

$no = 1;
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Data Dokter</title>
  <link rel="icon" type="image/png" href="img/logors.png" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
    
    body {
      margin: 0;
      padding: 0;
      font-family: 'Montserrat', sans-serif;
      background-image: url("img/bg_login1.jpg");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
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
      background-color: white;
      margin: 50px auto;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 1000px;
    }

    h1 {
      text-align: center;
      color: #00796b;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #00796b;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Data Dokter</h1>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nomor SIP</th>
        <th>Nama Dokter</th>
        <th>Spesialis</th>
        <th>Tempat / Tanggal Lahir</th>
        <th>Alamat</th>
        <th>No Telepon</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($sql)) : 
        $tglLahir = date('d F Y', strtotime($row['tanggal_lahir']));
        $jurusan = htmlspecialchars($row['nama_jurusan'] ?? 'Tidak Diketahui');
      ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($row['nomor_SIP']) ?></td>
        <td><?= htmlspecialchars($row['nama']) ?></td>
        <td><?= $jurusan ?></td>
        <td><?= $tglLahir ?></td>
        <td><?= htmlspecialchars($row['alamat']) ?></td>
        <td><?= htmlspecialchars($row['no_telpon']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

</body>
</html>
