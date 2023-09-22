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
  <style>
    .dropdown-menu {
      display: none;
    }

    .dropdown:hover .dropdown-menu {
      display: block !important;
    }
  </style>
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
    <div class="flex justify-between items-center  mb-10">
      <h1 class="text-2xl font-semibold uppercase">LIST Data Pendaftar</h1>
      <div>
        <a href="?status=accepted" class="bg-emerald-400/50 px-5 py-2 rounded text-white uppercase">Accept</a>
        <a href="?status=rejected" class="bg-red-400/50 px-5 py-2 rounded text-white uppercase">Reject</a>
        <a href="?status=pending" class="bg-yellow-400/50 px-5 py-2 rounded text-white uppercase">Pending</a>
        <span>|</span>
        <a href="./user-list.php" class="bg-indigo-400/50 px-5 py-2 rounded text-white uppercase">reset</a>
      </div>
    </div>
    <div class="bg-white p-2 rounded-md shadow">
      <table class="w-full text-sm">
        <thead>
          <tr class="bg-gray-800 text-white ">
            <th class="py-4">No</th>
            <th class="py-4">Tanggal</th>
            <th class="py-2">NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Sem/IPK</th>
            <th>Jenis Beasiswa</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="text-gray-800">
          <?php if (mysqli_num_rows($result)) : ?>
            <?php foreach ($result as $index => $scholar) : ?>
              <tr class="hover:bg-gray-200 <?php if ($index % 2 == 1) : ?> bg-gray-100 <?php endif; ?>">
                <td class="px-5"><?= $index + 1 ?></td>
                <td class="py-4"><?= $scholar["register_date"] ?></td>
                <td><?= $scholar["nim"] ?></td>
                <td><?= $scholar["name"] ?></td>
                <td><?= $scholar["email"] ?></td>
                <td><?= $scholar["number"] ?></td>
                <td><?= $scholar["semester"] . " / " . $scholar["ipk"] ?></td>
                <td class="text-center">
                  <?php if ($scholar["scholar"] == "A") : ?>
                    <span class="bg-indigo-400/50 font-semibold text-white px-3 text-sm py-1 rounded-full uppercase">Akademik</span>
                  <?php endif; ?>
                  <?php if ($scholar["scholar"] == "NA") : ?>
                    <span class="bg-cyan-400/50 font-semibold text-white px-3 text-sm py-1 rounded-full uppercase">Non Akademik</span>
                  <?php endif; ?>
                </td>
                <td class="text-center">
                  <?php if ($scholar["status"] == "pending") : ?>
                    <span class="bg-yellow-400/50 font-semibold text-white px-3 text-sm py-1 rounded-full uppercase">pending</span>
                  <?php endif; ?>
                  <?php if ($scholar["status"] == "accepted") : ?>
                    <span class="bg-emerald-400/50 font-semibold text-white px-3 text-sm py-1 rounded-full uppercase">accepted</span>
                  <?php endif; ?>
                  <?php if ($scholar["status"] == "rejected") : ?>
                    <span class="bg-red-400/50 font-semibold text-white px-3 text-sm py-1 rounded-full uppercase">rejected</span>
                  <?php endif; ?>
                </td>
                <td>
                  <div class="text-center mt-2">
                    <div class="p-4">
                      <div class="dropdown inline-block relative">
                        <button class="bg-indigo-500 text-white font-semibold py-2 px-2 rounded inline-flex items-center">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                          </span>
                        </button>
                        <form action="" method="POST" class="mt-2">
                          <ul class="bg-white rounded dropdown-menu absolute text-gray-700 pt-1" style="z-index: 50;">
                            <li class="px-5 py-2 hover:bg-gray-100">
                              <button class="w-full flex items-center px-2 py-1 text-sm text-gray-800 rounded" name="submit" value="rejected <?= $scholar['id'] ?>" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 mr-2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                </svg>
                                Reject
                              </button>
                            </li>
                            <li class="px-5 py-2 hover:bg-gray-100">
                              <button class="w-full flex items-center px-2 py-1 text-sm text-gray-800 rounded" name="submit" value="accepted <?= $scholar['id'] ?>" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 mr-2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Accept
                              </button>
                            </li>
                            <li class="px-5 py-2 hover:bg-gray-100">
                              <a href="./../../files/<?= $scholar['file'] ?>" target="_blank" class="w-full flex items-center px-2 py-1 text-sm text-gray-800 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 mr-2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                                Download
                              </a>
                            </li>
                          </ul>
                        </form>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr class="hover:bg-gray-200">
              <td class="px-5 py-3 text-center" colspan="11">Tidak ada data</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>