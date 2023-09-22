<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require "./../../config/koneksi.php";

if (!isset($_SESSION["nama"]) || !isset($_SESSION["username"])) {
  header("Location: login.php");
}

if (!isset($_GET["status"])) {
  $result = mysqli_query($connect, "SELECT * FROM scholar ORDER BY id DESC");
  $scholars = mysqli_fetch_assoc($result);
} else {
  $status = $_GET["status"];
  $result = mysqli_query($connect, "SELECT * FROM scholar WHERE status='$status' ORDER BY id DESC");
  $scholars = mysqli_fetch_assoc($result);
}

$dataScholar = mysqli_query($connect, "SELECT * FROM scholar");

if (isset($_POST["submit"])) {
  $submit = $_POST["submit"];
  $parts = explode(" ", $submit);
  $status = $parts[0];
  $id = $parts[1];

  $adminName = $_SESSION["nama"];
  mysqli_query($connect, "UPDATE scholar SET `status`='$status', `by`='$adminName' WHERE id=$id");

  $result = mysqli_query($connect, "SELECT * FROM scholar ORDER BY id DESC");
  $scholars = mysqli_fetch_assoc($result);

  echo "
      <span></span>
      <script src='./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>
      <script>
        Swal.fire({
          title: 'Status Berubah',
          text: 'Status telah terhasil dirubah',
          icon: 'success',
          confirmButtonText: 'Cancel'
        })
      </script>
    ";
}

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./../../css/style.css">
</head>

<body class="bg-gray-50">
  <nav class="flex justify-between items-center bg-white shadow py-5 px-20">
    <div class="flex items-center gap-5">
      <div class="flex items-center">
        <img src="./../../images/logo.png" width="30px" class="mr-2">
        <h1 class="font-semibold">ALOPE SCHOLARSHIP</h1>
      </div>
      <span class="text-gray-400">
        |
      </span>
      <h3 class="text-sm uppercase">
        <?= $_SESSION["nama"] ?>
      </h3>
    </div>
    <a href="./../../config/logout.php" class="flex gap-3 text-sm items-center text-red-500">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
      </svg>
      Logout
    </a>
  </nav>
  <section class="bg-gradient-to-r from-indigo-500 to-purple-400 py-3 text-white px-20">
    <ul class="flex">
      <li class="text-sm mr-10">
        <a href="./dashboard.php" class="hover:font-bold flex items-center  gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4">
            <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
            <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
          </svg>
          Dashboard
        </a>
      </li>
      <li class="text-sm mr-10">
        <a href="./user-list.php" class="hover:font-bold flex items-center  gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4">
            <path fill-rule="evenodd" d="M17.663 3.118c.225.015.45.032.673.05C19.876 3.298 21 4.604 21 6.109v9.642a3 3 0 01-3 3V16.5c0-5.922-4.576-10.775-10.384-11.217.324-1.132 1.3-2.01 2.548-2.114.224-.019.448-.036.673-.051A3 3 0 0113.5 1.5H15a3 3 0 012.663 1.618zM12 4.5A1.5 1.5 0 0113.5 3H15a1.5 1.5 0 011.5 1.5H12z" clip-rule="evenodd" />
            <path d="M3 8.625c0-1.036.84-1.875 1.875-1.875h.375A3.75 3.75 0 019 10.5v1.875c0 1.036.84 1.875 1.875 1.875h1.875A3.75 3.75 0 0116.5 18v2.625c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625v-12z" />
            <path d="M10.5 10.5a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963 5.23 5.23 0 00-3.434-1.279h-1.875a.375.375 0 01-.375-.375V10.5z" />
          </svg>

          List Pendaftar
        </a>
      </li>
    </ul>
  </section>

  <div class="container mx-auto px-20 mt-10 mb-20">
    <div class="bg-white p-5 rounded shadow">
      <h1 class="text-2xl mb-3 font-semibold uppercase">HALO <?= $_SESSION["nama"] ?></h1>
      <h2 class="">Selamat datang di <span class="font-semibold">ALOPE SCHOLARSHIP</span></h2>
      <hr class="my-5">
      <p class="text-sm mt-5">
        Sekarang jumlah pendaftar beasiswa sudah mencapai
        <span class="text-blue-500 font-semibold"><?= mysqli_num_rows($dataScholar) ?></span>
        Orang
      </p>
    </div>
  </div>

</body>

</html>