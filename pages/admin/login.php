<!DOCTYPE html>
<html lang="en">

<?php
require "./../../config/koneksi.php";
session_start();


if (isset($_SESSION["nama"]) || isset($_SESSION["username"]) || isset($_SESSION["has"])) {
  header("Location: ./dashboard.php");
}

if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $check = mysqli_query($connect, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
  if (mysqli_num_rows($check)) {

    $result = mysqli_fetch_assoc($check);

    $_SESSION["nama"] = $result["name"];
    $_SESSION["username"] = $result["username"];
    $_SESSION["has"] = "admin";

    header("Location: ./dashboard.php");
  } else {
    echo "
      <span></span>
      <script src='./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>
      <script>
        Swal.fire({
          title: 'Gagal Masuk',
          text: 'Username atau Password Salah',
          icon: 'error',
          confirmButtonText: 'Cancel'
        })
      </script>
    ";
  }
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./../../css/style.css">
</head>

<body>

  <section class="grid grid-cols-2 min-h-screen">

    <div class="relative">
      <img src="./../../images/bgLogin.jpg" class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-black/40"></div>
      <div class="absolute bottom-[50px] left-0 pl-10 py-5 border-l-[5px] bg-black/60 border-indigo-500 max-w-[500px]">
        <h2 class="text-2xl font-semibold text-white">BEASISWA PENDIDIKAN ALOPE</h2>
        <p class="text-gray-200 text-sm mt-2">
          Merupakan beasiswa pendidikan khususnya untuk S1/D3 untuk universitas Negeri maupun Swasta di seluruh Indonesia dengan total tunai 1 Juta / semester.
        </p>
      </div>
    </div>

    <div class="bg-white flex items-center justify-center relative">

      <div class="absolute top-0 left-0 m-5 flex items-center gap-2">
        <a href="./../../index.php" class="flex w-[40px] h-[40px] bg-gray-100 hover:bg-gray-200 rounded-full items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
          </svg>
        </a>
        <a href="./../../index.php">
          Kembali
        </a>
      </div>

      <div class="w-1/2 text-center">
        <img src="./../../images/logo.png" width="50px" class="mx-auto mb-2">
        <h1 class="text-2xl font-semibold mb-10">LOGIN ADMIN</h1>
        <form action="" method="POST">
          <div class="relative mb-5">
            <input type="text" id="username" name="username" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer border" placeholder=" " />
            <label for="username" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
              Username
            </label>
          </div>
          <div class="relative">
            <div class="relative">
              <input type="password" id="password" name="password" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer border" placeholder=" " />
              <label for="password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                Password
              </label>
            </div>
            <div class="absolute flex items-center justify-between w-full mt-1">
              <div class="flex items-center gap-2">
                <input type="checkbox" class="rounded-md" />
                <label for="remember" class="text-[12px]">
                  Remembe me?
                </label>
              </div>
              <div>
                <a href="" class="text-[13px] text-indigo-500 hover:underline">Lupa password?</a>
              </div>
            </div>
          </div>
          <div class="mt-16">
            <button type="submit" name="submit" class="bg-indigo-500 hover:bg-indigo-400 w-full py-2 mb-2 rounded-md text-white">Submit</button>
            <button type="reset" class="mt-5 bg-red-500 hover:bg-red-400 w-full py-2 rounded-md text-white">
              Reset
            </button>
          </div>
        </form>

        <footer class="absolute bottom-[25px] text-sm text-gray-600 text-center w-full left-0">
          Copyright &copy; 2023 Ilham Hafidz
        </footer>
      </div>
    </div>
  </section>

</body>

</html>