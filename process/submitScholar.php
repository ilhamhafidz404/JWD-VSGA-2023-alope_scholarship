<?php

if (isset($_POST["submit"])) {

  if (!isset($_POST["email"]) || !isset($_POST["hp"]) || !isset($_POST["semester"]) || !isset($_POST["beasiswa"])) {
    echo "
      <span></span>
      <script src='./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>
      <script>
        Swal.fire({
          title: 'Field ada yang kosong',
          text: 'Tolong isi field yang wajib diisi',
          icon: 'warning',
          confirmButtonText: 'Cancel'
        })
      </script>
    ";
  } else {

    $nim = $_SESSION["nim"];
    $nama = $_SESSION["nama"];
    $email = $_POST["email"];
    $hp = $_POST["hp"];
    $semester = $_POST["semester"];
    $ipk = (float)$_SESSION["ipk"];
    $beasiswa = $_POST["beasiswa"];

    if ($_FILES["berkas"]["name"]) {
      $target_dir = "../../files/";
      $target_file = $target_dir . basename($_FILES["berkas"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

      $check = getimagesize($_FILES["berkas"]["tmp_name"]);
      if ($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        // echo "File is not an image.";
        $uploadOk = 0;
      }

      $extensionFile = pathinfo($_FILES["berkas"]["name"], PATHINFO_EXTENSION);
      $nameForFileToUpload = md5(uniqid(rand(), true)) . "." . $extensionFile;

      if ($uploadOk == 0) {
        echo "
          <span></span>
          <script src='./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>
          <script>
            Swal.fire({
              title: 'Gagal Daftar',
              text: 'Terdapat kesalahan dalam meng-upload berkas',
              icon: 'error',
              confirmButtonText: 'Cancel'
            })
          </script>
        ";
      } else {
        if (move_uploaded_file($_FILES["berkas"]["tmp_name"], $target_dir . $nameForFileToUpload)) {
          $result = mysqli_query($connect, "INSERT INTO scholar VALUES (null, '2023-09-20', '$nim', '$email', '$hp', '$semester', $ipk, '$beasiswa', '$nameForFileToUpload', 'pending', '', '$nama')");
          if (mysqli_affected_rows($connect)) {
            echo "
              <span></span>
              <script src='./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>
              <script>
                Swal.fire({
                  title: 'Berhasil Daftar!',
                  text: 'Anda sudah mendaftar beasiswa',
                  icon: 'success',
                  confirmButtonText: 'Oke'
                })
              </script>
            ";
          }
        }
      }
    } else {
      echo "
        <span></span>
        <script src='./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>
        <script>
          Swal.fire({
            title: 'Gagal Daftar!',
            text: 'File berkas harus dikirimkan',
            icon: 'error',
            confirmButtonText: 'Oke'
          })
        </script>
      ";
    }
  }
}
