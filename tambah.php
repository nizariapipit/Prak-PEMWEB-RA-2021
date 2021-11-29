<?php
//include file koneksi ke database
include "koneksi.php";
//menerima nilai dari kiriman form
$id=$_POST["id"];
$high=$_POST["high"];
$low=$_POST["low"];
$custom=$_POST["custom"];

//Query input menginput data kedalam tabel data
$sql="insert into sepatu (id,high,low,custom) values('$id','$high','$low','$custom')";

//mengeksekusi/menjalankan query diatas
$hasil=mysqli_query($kon,$sql);

?>