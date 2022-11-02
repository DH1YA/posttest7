<?php
require 'crud/koneksi.php';

if (isset($_POST["tambah"])) {
    $nama = htmlspecialchars($_POST["nama"]);
    $tgl_pesanan = htmlspecialchars($_POST["tanggal"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);
    $kontak = htmlspecialchars($_POST["nomor"]);
    $menu = htmlspecialchars($_POST["menu"]);

    // $sql = "INSERT INTO pesanan_awal VALUES ('','$nama', '$tgl_pesanan', '$alamat', '$jumlah','$kontak', '$menu')";
    // $result = mysqli_query($conn, $sql);
    mysqli_query($conn,"INSERT INTO `pesanan_awal`(`id_pesanan`, `nama`, `tgl_pesanan`, `alamat`, `jumlah`, `kontak`, `menu`) 
    VALUES ('','$nama','$tgl_pesanan','$alamat','$jumlah','$kontak','$menu')") or die(mysqli_error($conn));

    echo"<div align='center'><h5> menambahkan data </h5></div>";
    echo"<meta http-equiv='refresh' content='1;url=http://localhost/posttest5/crud/tampilkan.php'>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nusantara Catering</title>
  <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
  <header>
    <div class="logo">
      Nusantara<i>Catering</i>
    </div>
    <div class="info_container">
      <div class="tabel_info">
          <p>Info Lebih Lanjut</p>
          <button class="close-btn"><i class="fas fa-times"></i></button>
          <h4>Silahkan Hubungi</h4>
          <ul>
              <li>
                  <a href="https://api.whatsapp.com/send?phone=625156579635" target="_blank">
                      <i class='bx bxl-whatsapp'></i>
                  </a>
              </li>
              <li>
                  <a href="https://id-id.facebook.com/" target="_blank">
                    <i class='bx bxl-facebook-circle' ></i>
                  </a>
              </li>
              <li>
                  <a href="https://www.instagram.com/" target="_blank">
                    <i class='bx bxl-instagram' ></i>
                  </a>
              </li>
          </ul>
      </div>
  </div>
    <nav>
      <ul>
        <li><a href="#main">Home</a> </li>
        <li>
          <button class="tbl_info">
          Kontak
          </button>
        </li>
        <li><a href="#about">About</a> </li>
        <div class="tombol"><input type="checkbox" class="checkbox" id="chk" >
        <label class="label" for="chk">
          <i class='bx bxs-moon' ></i>
          <i class='bx bxs-sun' ></i>
          <div class="ball"></div>
        </label></div>
        
      </ul>
      <!-- <div class="tombol">
      </div> -->
    </nav>
  </header>

  <div id="main">
    <div class="konten">
      <h1>Nikmatnya Cita Rasa Nusantara</h1>
      <h2>Tanpa repot dan cukup menunggu</h2>
    </div>
  </div>

  <div class="paketan">
    <p class="section-title">Dengan Pelayanan Terbaik</p>
    <div class="container">
      <div class="jenis-paketan">
        <img src="chef.jpg" alt="">
        <p>Tenaga Ahli</p>
      </div>
      <div class="jenis-paketan">
        <img src="aneka menu.jpg">
        <p>Aneka Menu</p>
      </div>
      <div class="jenis-paketan">
        <img src="mobil.jpg">
        <p>Pengiriman aman</p>
      </div>
      <div class="jenis-paketan">
        <img src="bersih.jpg">
        <p>Kebersihan Terjaga</p>
      </div>
    </div>
  </div>

  <!-- login/registrasi -->
  <div class="container-login" id="container-login">
    <div class="form-container registrasi-container">
      <form action="" method="POST">
        <h1>Create Account</h1>
        <input type="text" placeholder="Userame" />
        <input type="password" placeholer="Password" />
        <input type="password" placeholder="Konfirmasi Password" />
        <button>Registrasi</button>
      </form>
    </div>
    <div class="form-container login-container">
      <form action="" method="POST">
        <h1><span>Log in</span> </h1>
        <input type="text" placeholder="Username
        zzzzzzzzzzzzzzzzzzzzzzzzzzz" />
        <input type="password" placeholder="Password" />
        <button>Log In</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Tes Login</h1>
          <p> </p>
          <button class="ghost" id="login">Log in</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Tes Registrasi</h1>
          <p> </p>
          <button class="ghost" id="registrasi">Registrasi</button>
        </div>
      </div>
    </div>
  </div>
  <!-- login/registrasi -->

  <div id="about">
    <h3>Aboout me</h3>
    <div class="about">
      <img src="boss.png" alt="">
      <div class="deskripsi">
        <h2>AHMAD DHIYA ULHAQI</h2><br>
        <p class="title">Mahasiswa Informatika</p>
        <p>Seorang mahasiswa berjiwa muda yang selalu belajar untuk apa dirinya belajar, berharap suatu saat akan
          menjadi orang paling sukses dunia akhirat.
          Berencana untuk membangun bisnis agar dapat mengurangi angka pengangguran dan meningkatkan perekonomian
          masyarakat
        </p>
        <p><br> 2109106056</p>
        <p><br> dhiya334@gmail.com</p>
        <p><br> +628123456789</p>
      </div>
    </div>
  </div>
  <footer>
    <div class="footer-logo">Nusantara<i>Catering</i></div>
    <div class="footer-list">
      <ul>
        <li><a href="#main">Home</a></li>
        <li><a href="#about">About</a></li>
      </ul>
  </footer>
  <script type="text/javascript" src="script.js"></script>
</body>

</html>