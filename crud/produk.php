<?php

require 'koneksi.php';
date_default_timezone_set('asia/kuala_lumpur');

if(isset($_POST['add_product'])){

   $nama = $_POST['nama'];
   $nama = filter_var($nama, FILTER_SANITIZE_STRING);

   $d = date("Y-m-d H:i:s");

   $gambar = $_FILES['gambar']['name'];
   $gambar = filter_var($gambar, FILTER_SANITIZE_STRING);
   $x = explode('.', $gambar);
   $extensi = strtolower(end($x));
   $gambar_baru = "$nama.$extensi";
   $tmp = $_FILES['gambar']['tmp_name'];
   $image_folder = 'upload_img/'.$gambar_baru;

    

   if (move_uploaded_file($tmp, $image_folder)) {
      $result = mysqli_query($conn, "INSERT INTO produk VALUES ('','$nama','$d','$gambar_baru')");
      if ($result) {
          echo"
              <script>
                  alert('File berhasil diupload');
                  href.location = 'read_file.php';
              </script>
          ";
      }else{
          echo"
              <script>
                  alert('File gagal diupload');
              </script>
          ";
      }
  }

}

if(isset($_GET['delete'])){

   $id = $_GET['delete'];

   $result = mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id");
   
   if ( $result ) {
       echo"
           <script>
               alert('Data berhasil dihapus');
               document.location.href = 'produk.php';
           </script>
       ";
   }else{  
       echo"
           <script>
               alert('Data gagal dihapus');
               document.location.href = 'produk.php';
           </script>
       ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>
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
    width: 30%;
    padding:70px 0 0 0;
    position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

    .tabel-produk {
      margin:90px auto;
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

<!--   tambah produk  -->

<section class="add-products">

   <form action="" method="POST" enctype="multipart/form-data">
      <h3>Tambah produk</h3>
      <input type="text" required placeholder="masukkan nama produk" name="nama" maxlength="100" class="box">
      <input type="file" name="gambar" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" required>
      <input type="submit" value="add product" name="add_product" class="btn">
   </form>

</section>

<!-- tambah produk -->

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

<!-- show products   -->
<?php
   $result = mysqli_query($conn, "SELECT * FROM produk");
   if (isset($_GET['search'])) {
    $keyword=$_GET['keyword'];
    $result = mysqli_query($conn, "SELECT * FROM produk where 
    nama_produk LIKE '%$keyword%' OR waktu LIKE '%$keyword%' OR foto LIKE '%$keyword%'");
    } 
   if (isset($_GET['all'])) {
        $result = mysqli_query($conn, "SELECT * FROM produk");
    } 
   $produk = [];

   while ($row = mysqli_fetch_assoc($result)) {
      $produk[] = $row;
   }
?>
<section class="show-products" style="padding-top: 0;">

<div class="tabel-produk">
  <table border=1px>
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>MODIFIED</th>
            <th>FOTO</th>
            <th>UTAK ATIK</th>
    
        </tr>
        <?php $i = 1; foreach ($produk as $menu):?>
        <tr>
            <td><?php echo $i ;?></td>
            <td><?php echo $menu["nama_produk"]; ?></td>
            <td><?php echo $menu["waktu"] ;?></td>
            <td><img src="upload_img/<?= $menu['foto'] ?>" width="50px" height="50px"></td>
            <td><a href="edit-produk.php?update=<?php echo $menu["id_produk"]; ?>">Edit</a> 
                <a href="produk.php?delete=<?php echo $menu["id_produk"]; ?>" onclick = "return confirm('And yakin ingin menghapus data ini ?')">Hapus</a></td>
        </tr>
        <?php $i++; endforeach;?>
    </table>
  </div>

</section>

<!-- show products  -->









</body>
</html>