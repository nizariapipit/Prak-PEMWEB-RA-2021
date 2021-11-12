<?php
    include 'koneksi.php';

    $id=$_POST['id'];
    $connect->query("DELETE FROM mahasiswa WHERE id=".$id);
?>