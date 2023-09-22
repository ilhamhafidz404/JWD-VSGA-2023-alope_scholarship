<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require './../../config/koneksi.php';

if (!isset($_SESSION["nim"]) || !isset($_SESSION["nama"])) {
  header("Location: login.php");
}

$nim = $_SESSION["nim"];
$nama = $_SESSION["nama"];
$result = mysqli_query($connect, "SELECT * FROM scholar WHERE nim='$nim' AND name='$nama'");
$scholar = mysqli_fetch_assoc($result);

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
      <h3 class="text-sm uppercase">Ilham Hafidz</h3>
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
        <a href="./scholar-form.php" class="hover:font-bold flex items-center  gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4">
            <path fill-rule="evenodd" d="M17.663 3.118c.225.015.45.032.673.05C19.876 3.298 21 4.604 21 6.109v9.642a3 3 0 01-3 3V16.5c0-5.922-4.576-10.775-10.384-11.217.324-1.132 1.3-2.01 2.548-2.114.224-.019.448-.036.673-.051A3 3 0 0113.5 1.5H15a3 3 0 012.663 1.618zM12 4.5A1.5 1.5 0 0113.5 3H15a1.5 1.5 0 011.5 1.5H12z" clip-rule="evenodd" />
            <path d="M3 8.625c0-1.036.84-1.875 1.875-1.875h.375A3.75 3.75 0 019 10.5v1.875c0 1.036.84 1.875 1.875 1.875h1.875A3.75 3.75 0 0116.5 18v2.625c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625v-12z" />
            <path d="M10.5 10.5a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963 5.23 5.23 0 00-3.434-1.279h-1.875a.375.375 0 01-.375-.375V10.5z" />
          </svg>

          Daftar Beasiswa
        </a>
      </li>
      <li class="text-sm">
        <a href="./status.php" class="hover:font-bold flex items-center  gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4">
            <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zm9.586 4.594a.75.75 0 00-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 00-1.06 1.06l1.5 1.5a.75.75 0 001.116-.062l3-3.75z" clip-rule="evenodd" />
          </svg>

          Status Penerimaan
        </a>
      </li>
    </ul>
  </section>

  <main class="container mx-auto px-20 mt-5">
    <div class="bg-white p-5 rounded shadow">
      <h1 class="text-2xl font-bold uppercase mb-5">STATUS Penerimaan</h1>
      <?php if (mysqli_num_rows($result)) : ?>
        <p>Status pendaftaran anda: <span class="uppercase font-semibold"><?= $scholar["status"] ?></span></p>
        <?php if ($scholar['by']) : ?>
          <p>Asesori : <span class="uppercase font-semibold"><?= $scholar["by"] ?></span></p>
        <?php endif; ?>
      <?php else : ?>
        <p>
          Anda belum mendaftar
        </p>
      <?php endif; ?>

    </div>
  </main>


</body>

</html>