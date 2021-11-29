<?php
include "koneksi.php";
$id = $_GET["id"];

$sql = "delete from sepatu where id='".$id."'";
$hasil = mysqli_query($kon,$sql);
?>