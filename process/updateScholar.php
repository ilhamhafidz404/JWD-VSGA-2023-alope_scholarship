<?php

if (isset($_POST["update"])) {
  $nim = $_SESSION["nim"];
  $nama = $_SESSION["nama"];
  $email = $_POST["email"];
  $hp = $_POST["hp"];
  $semester = $_POST["semester"];
  $ipk = (float)$_SESSION["ipk"];
  $beasiswa = $_POST["beasiswa"];

  if ($_FILES["berkas"]["name"]) {
    if (file_exists("../../files/" . $fileValue)) {
      unlink("../../files/" . $fileValue);
    }

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
        $sql = "UPDATE scholar SET `nim`='$nim', `email`='$email', `number`='$hp', `semester`='$semester', `ipk`='$ipk', `scholar`='$beasiswa', `file`='$nameForFileToUpload'  WHERE nim='$nim' AND name='$nama'";
        $result = mysqli_query($connect, $sql);

        if (mysqli_affected_rows($connect)) {
          echo "
          <span></span>
          <script src='./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>
          <script>
            Swal.fire({
              title: 'Berhasil Update!',
              text: 'Anda sudah mengupdate data pendaftaran',
              icon: 'success',
              confirmButtonText: 'Oke'
            })
          </script>
        ";
        }
      }
    }
  } else {
    $sql = "UPDATE scholar SET `nim`='$nim', `email`='$email', `number`='$hp', `semester`='$semester', `ipk`='$ipk', `scholar`='$beasiswa'  WHERE nim='$nim' AND name='$nama'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_affected_rows($connect)) {
      echo "
          <span></span>
          <script src='./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>
          <script>
            Swal.fire({
              title: 'Berhasil Update!',
              text: 'Anda sudah mengupdate data pendaftaran',
              icon: 'success',
              confirmButtonText: 'Oke'
            })
          </script>
        ";
    }
  }
  require "getScholar.php";
}
