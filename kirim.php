<?php
include 'config.php';

if(isset($_POST['submit'])){
$dari = $_POST['dari'];
$untuk = $_POST['untuk'];
$isi = $_POST['isi'];

$sql = "INSERT INTO pesan (dari, untuk, isi) VALUES ('$dari', '$untuk', '$isi');";
mysqli_query($kon, $sql);

header("Location: index.php?status=oke");
}

echo 'Hayo ngapain';
