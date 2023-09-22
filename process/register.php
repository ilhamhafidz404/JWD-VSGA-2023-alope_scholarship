<?php
if (isset($_POST["submit"])) {
  $nim = $_POST["nim"];
  $name = $_POST["name"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirm_password"];


  $checkNIM = mysqli_query($connect, "SELECT * FROM user WHERE nim='$nim'");
  if (!mysqli_num_rows($checkNIM)) {
    if ($password != $confirmPassword) {
      echo "
        <span></span>
        <script src='./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>
        <script>
          Swal.fire({
            title: 'Gagal Daftar!',
            text: 'Password tidak sesuai',
            icon: 'error',
            confirmButtonText: 'Oke'
          })
        </script>
      ";
    } else {
      if ($connect) {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($connect, "INSERT INTO user VALUES(null, '$nim', '$hashPassword', '$name', 3.5)");

        header("Location: ./login.php?register=success");
      }
    }
  } else {
    echo "
      <span></span>
      <script src='./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>
      <script>
        Swal.fire({
          title: 'Gagal Daftar!',
          text: 'NIM anda sudah terdaftar',
          icon: 'error',
          confirmButtonText: 'Oke'
        })
      </script>
    ";
  }
}
