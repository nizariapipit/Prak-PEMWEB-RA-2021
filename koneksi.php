<?php
    $connect=new mysqli("localhost", "root", "", "praktikum");
    if(!$connect) {
        echo "koneksi gagal";
        exit();
    }
?>