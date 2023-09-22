<?php

if (isset($_POST["submit"])) {
  $nim = $_POST["nim"];
  $password = $_POST["password"];

  $checkNIM = mysqli_query($connect, "SELECT * FROM user WHERE nim='$nim'");
  if (mysqli_num_rows($checkNIM)) {
    $result = mysqli_fetch_assoc($checkNIM);
    if (password_verify($password, $result["password"])) {

      $_SESSION["nim"] = $nim;
      $_SESSION["nama"] = $result["nama"];
      $_SESSION["ipk"] = $result["ipk"];
      $_SESSION["as"] = "user";

      header("Location: dashboard.php");
    } else {
      echo "
          <span></span>
          <script src='./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>
          <script>
            Swal.fire({
              title: 'Gagal Login!',
              text: 'Password Salah',
              icon: 'error',
              confirmButtonText: 'Oke'
            })
          </script>
        ";
    }
  } else {
    echo "
        <span></span>
        <script src='./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>
        <script>
          Swal.fire({
            title: 'Login Gagal!',
            text: 'NIM tidak terdaftar',
            icon: 'error',
            confirmButtonText: 'Oke'
          })
        </script>
      ";
  }
}
