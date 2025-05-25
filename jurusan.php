<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="img/logors.png">
    <title>Tampil Data Spesialis</title>
    <link rel="stylesheet" href="css/spesialis.css">
</head>
<body>
    <div class="container">
        <h1>Data Spesialis</h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Spesialis</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                include ('koneksi.php'); 
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_jurusan ORDER BY id_jurusan ASC"); 
                $no = 1; 
                while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) { 
                    echo "<tr> 
                            <td>$no</td> 
                            <td>{$row['nama_jurusan']}</td> 
                          </tr>"; 
                    $no++; 
                } 
            ?>  
            </tbody>
        </table>
    </div>
    <style>
    /*backgoud gambar*/
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
/* Lapisan overlay untuk blur */
body::before {
  content: "";
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  backdrop-filter: blur(2px);
  -webkit-backdrop-filter: blur(3px);
  background-color: rgba(0, 0, 0, 0.3); /* Overlay gelap dengan transparansi */
  z-index: -1;
}
  </style>
</body>
</html>
