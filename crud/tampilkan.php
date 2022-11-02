<?php
include 'koneksi.php';

$result = mysqli_query($conn, "SELECT * FROM pesanan_awal");
if (isset($_GET['search'])) {
  $keyword=$_GET['keyword'];
  $result = mysqli_query($conn, "SELECT * FROM pesanan_awal where 
  nama LIKE '%$keyword%' OR tgl_pesanan LIKE '%$keyword%' OR alamat LIKE '%$keyword%' OR jumlah LIKE '%$keyword%' OR kontak LIKE '%$keyword%' OR menu LIKE '%$keyword%'");
} 
if (isset($_GET['all'])) {
  $result = mysqli_query($conn, "SELECT * FROM pesanan_awal");
} 

$pesanan_awal = [];

while ($row = mysqli_fetch_assoc($result)) {
    $pesanan_awal[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="crud-style.css">
  <style>
  .search {
  width: 100%;
  position: relative;
  display: flex;
  }

  .searchTerm {
    width: 100%;
    border: 3px solid #04AA6D;
    border-right: none;
    padding: 5px;
    height: 40px;
    border-radius: 5px 0 0 5px;
    outline: none;
    color: #9DBFAF;
  }

  .searchTerm:focus{
    color: #04AA6D;
  }

  .searchButton {
    width: 40px;
    height: 40px;
    border: 1px solid #04AA6D;
    text-align: center;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 20px;
  }
  .button1 {background: #04AA6D;} 
  .button2 {background: #008CBA;} 

  .wrap{
    width: 20%;
    padding:0px;
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

    .tabel-pesanan {
      margin:100px auto;
      height:40rem;
    }

    table {
      font-size:20px;
      border-collapse: collapse;
      width: 100%;
      border:2px solid;
    }
    
    th {
    background-color: #04AA6D;
    color: white;
    height:70px;
     }

    th, td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {background-color: #f2f2f2;}
    tr:hover {background-color: coral;}
</style>
</head>
<body>
  <?php include "crud-header.php"; ?>
  <!-- search bar -->
  <form action="" method="GET">
  <div class="wrap">
   <div class="search">
      <input type="text" class="searchTerm" name="keyword" placeholder="Cari di sini...">
      <button type="submit" class="searchButton button1" name="search">
      <i class='bx bx-search-alt' ></i>
     </button><button type="submit" class="searchButton button2" name="all">All</button>
   </div>
  </div>    
  </form>
  <!-- search bar -->

  <!-- table -->
  <div class="tabel-pesanan">
  <table border=1px>
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>TANGGAL</th>
            <th>ALAMAT</th>
            <th>JUMLAH</th>
            <th>KONTAK</th>
            <th>MENU</th>
            <th>UTAK ATIK</th>
    
        </tr>
        <?php $i = 1; foreach ($pesanan_awal as $pesanan):?>
        <tr>
            <td><?php echo $i ;?></td>
            <td><?php echo $pesanan["nama"]; ?></td>
            <td><?php echo $pesanan["tgl_pesanan"] ;?></td>
            <td><?php echo $pesanan["alamat"] ;?></td>
            <td><?php echo $pesanan["jumlah"] ;?></td>
            <td><?php echo $pesanan["kontak"] ;?></td>
            <td><?php echo $pesanan["menu"] ;?></td>
            <td><a href="edit.php?id=<?php echo $pesanan["id_pesanan"]; ?>">Edit</a> 
            | <a href="hapus.php?id=<?php echo $pesanan["id_pesanan"]; ?>" onclick = "return confirm('And yakin ingin menghapus data ini ?')">Hapus</a></td>
        </tr>
        <?php $i++; endforeach;?>
    </table>
  </div>
  <!-- table -->
  <?php include "crud-footer.php"; ?>
</body>
</html>