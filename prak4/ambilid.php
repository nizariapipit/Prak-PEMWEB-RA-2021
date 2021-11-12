<?php
    include 'koneksi.php';

    $id=$_POST['id'];
    $result=array();

   $queryResult = $connect->query("SELECT * FROM mahasiswa where id=".$id);
    $fetchData= $queryResult->fetch_assoc();
    $result=$fetchData;

    echo json_encode($result);

?>