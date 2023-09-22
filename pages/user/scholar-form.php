<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require './../../config/koneksi.php';

if (!isset($_SESSION["nim"]) || !isset($_SESSION["nama"])) {
  header("Location: login.php");
}

require "../../process/submitScholar.php";

require "../../process/getScholar.php";

require "../../process/updateScholar.php";

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


  <div style="width: 90%; margin-top: 30px" class="mx-auto bg-white p-5 rounded shadow">
    <h1 class="text-2xl font-bold uppercase mb-5">Daftar Beasiswa</h1>

    <?php if ((float)$_SESSION["ipk"] < 3.0) : ?>
      <div class="bg-red-500/30 border-2 border-red-500 text-red-500 p-5 rounded mb-10">
        <h3 class="flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
          </svg>
          Anda tidak bisa mendaftar, IPK anda terlalu rendah!
        </h3>
      </div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
      <div class="grid grid-cols-3 gap-5">
        <div class="relative">
          <input type="text" id="nim" name="nim" class="bg-gray-50 cursor-not-allowed block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer border" placeholder=" " value="<?= $_SESSION['nim'] ?>" disabled />
          <label for="nim" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
            NIM
          </label>
        </div>
        <div class="relative">
          <input type="text" id="nama" name="nama" class="bg-gray-50 cursor-not-allowed block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer border" placeholder=" " value="<?= $_SESSION['nama'] ?>" disabled />
          <label for="nama" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
            NAMA
          </label>
        </div>
        <div class="relative">
          <input type="email" id="email" name="email" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer border" placeholder=" " value="<?= $emailValue ?>" <?php if ((float)$_SESSION["ipk"] < 3.0) : ?> disabled <?php endif; ?> />
          <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
            Email
          </label>
        </div>
        <div class="relative">
          <input type="number" id="hp" name="hp" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer border" placeholder=" " value="<?= $numberValue ?>" <?php if ((float)$_SESSION["ipk"] < 3.0) : ?> disabled <?php endif; ?> />
          <label for="hp" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
            NO HP
          </label>
        </div>
        <div class="relative">
          <select name="semester" class="w-full py-3 rounded px-3 bg-transparent border" <?php if ((float)$_SESSION["ipk"] < 3.0) : ?> disabled <?php endif; ?>>
            <option value="" disabled selected>Pilihan Semester</option>
            <option value="1" <?php if ($semesterValue == '1') : ?> selected <?php endif; ?>>1</option>
            <option value="2" <?php if ($semesterValue == '2') : ?> selected <?php endif; ?>>2</option>
            <option value="3" <?php if ($semesterValue == '3') : ?> selected <?php endif; ?>>3</option>
            <option value="4" <?php if ($semesterValue == '4') : ?> selected <?php endif; ?>>4</option>
            <option value="5" <?php if ($semesterValue == '5') : ?> selected <?php endif; ?>>5</option>
            <option value="6" <?php if ($semesterValue == '6') : ?> selected <?php endif; ?>>6</option>
            <option value="7" <?php if ($semesterValue == '7') : ?> selected <?php endif; ?>>7</option>
            <option value="8" <?php if ($semesterValue == '8') : ?> selected <?php endif; ?>>8</option>
          </select>
        </div>
        <div class="relative">
          <input type="text" id="ipk" name="ipk" class="cursor-not-allowed block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer border" placeholder=" " value="<?= $_SESSION['ipk'] ?>" disabled />
          <label for="ipk" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
            IPK
          </label>
        </div>
        <div class="relative">
          <select name="beasiswa" class="w-full py-3 rounded px-3 bg-transparent border" <?php if ((float)$_SESSION["ipk"] < 3.0) : ?> disabled <?php endif; ?>>
            <option value="" disabled selected>Pilihan Beasiswa</option>
            <option value="A" <?php if ($scholarValue == 'A') : ?> selected <?php endif; ?>>Akademik</option>
            <option value="NA" <?php if ($scholarValue == 'NA') : ?> selected <?php endif; ?>>Non Akademik</option>
          </select>
        </div>
        <div class="relative">
          <input type="file" require name="berkas" class="mt-3 block" accept=".jp,.png,.jpeg" <?php if ((float)$_SESSION["ipk"] < 3.0) : ?> disabled <?php endif; ?>>
          <?php if ($fileValue) : ?>
            <a href="./../../files/<?= $fileValue ?>" target="_blank" class="mt-3 mb-1 inline-block bg-purple-500 hover:bg-purple-400 px-4 py-2 text-sm text-white rounded">Download Berkas Sebelumnya</a>
          <?php endif; ?>
        </div>
        <div class="col-span-3 text-right mt-3">
          <hr class="my-4">

          <?php if (!mysqli_num_rows($data)) : ?>
            <?php if (((float)$_SESSION["ipk"] > 3.0)) : ?>
              <button class="bg-red-500 hover:bg-red-400 px-5 py-2 text-sm rounded text-white">Reset</button>
              <button type="submit" name="submit" class="bg-indigo-500 hover:bg-indigo-400 px-5 py-2 text-sm rounded text-white">Submit</button>
            <?php endif; ?>
          <?php else : ?>
            <div class="flex items-center justify-between">
              <?php if ($statusValue == 'pending') : ?>
                <div class="inline-flex items-end">
                  <button onclick="confirmDelete(<?= $_SESSION['nim'] ?>)" type="button" name="delete" class="bg-red-500 px-5 py-2 border- border-red-500 text-white rounded mr-2 hover:bg-red-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                    </svg>
                  </button>
                  <button type="submit" name="update" class="bg-indigo-500 px-5 py-2 border- border-indigo-500 text-white rounded mr-2 hover:bg-indigo-400">
                    UPDATE
                  </button>
                </div>
              <?php endif; ?>
              <a href="./status.php" class="border border-purple-500 text-purple-500 px-5 py-2 text-sm rounded hover:bg-purple-500 hover:text-white">
                Lihat status pendaftaran
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </form>
  </div>

  <script src='./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>
  <script>
    const confirmDelete = (nim) => {
      Swal.fire({
        title: 'Apakah kamu yakin',
        text: "Data pendaftaranmu akan dihapus permanen!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Dihapus!',
            'Data pendaftaranmu telah berhasil dihapus.',
            'success'
          )
          setTimeout(() => {
            window.location.replace("./deleteScholar.php?nim=" + nim);
          }, 1000);
        }
      })
    }
  </script>

</body>

</html>