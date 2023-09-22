<?php
require "./../../config/koneksi.php";

$nim = $_GET["nim"];


$data = mysqli_query($connect, "SELECT * FROM scholar WHERE nim='$nim'");
$result = mysqli_fetch_assoc($data);


if (file_exists("../../files/" . $result["file"])) {
  unlink("../../files/" . $result["file"]);
}

mysqli_query($connect, "DELETE FROM scholar WHERE nim='$nim'");


header("Location: ./scholar-form.php");
