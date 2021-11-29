<?php
include "koneksi.php";

$id = $_POST["id"];
$high = $_POST["high"];
$low = $_POST["low"];
$custom = $_POST["custom"];

$sql = "update sepatu set high='".$high."', low='".$low."', custom='".$custom."' where id = '".$id."' ";
$hasil = mysqli_query($kon,$sql);
?>