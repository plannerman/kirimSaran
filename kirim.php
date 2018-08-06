<?php
include 'config.php';

if(isset($_POST['submit'])){
$dari = mysqli_real_escape_string($kon, $_POST['dari']);
$untuk = mysqli_real_escape_string($kon, $_POST['untuk']);
$isi = mysqli_real_escape_string($kon, $_POST['isi']);
  
date_default_timezone_set('Asia/Jakarta');
$now = date('d M Y , H:i')

$sql = "INSERT INTO pesan (dari, untuk, isi, time) VALUES ('$dari', '$untuk', '$isi' , '$now');";
mysqli_query($kon, $sql);

header("Location: index.php?status=oke");
}

echo 'Tidak memiliki akses!';
