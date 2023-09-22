<?php
$nim = $_SESSION["nim"];
$nama = $_SESSION["nama"];
$data = mysqli_query($connect, "SELECT * FROM scholar WHERE nim='$nim' AND name='$nama'");
$mySchoolarData = mysqli_fetch_assoc($data);

$emailValue = "";
$numberValue = "";
$semesterValue = "";
$ipkValue = "";
$scholarValue = "";
$statusValue = "";
$fileValue = "";

if (mysqli_num_rows($data)) {
  $emailValue = $mySchoolarData["email"];
  $numberValue = $mySchoolarData["number"];
  $semesterValue = $mySchoolarData["semester"];
  $ipkValue = $mySchoolarData["ipk"];
  $scholarValue = $mySchoolarData["scholar"];
  $statusValue = $mySchoolarData["status"];
  $fileValue = $mySchoolarData["file"];
}
