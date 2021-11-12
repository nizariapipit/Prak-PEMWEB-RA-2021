<?php
    include 'koneksi.php';

    $id=$_POST['id'];
    $NIM=$_POST['NIM'];
    $NAMA=$_POST['NAMA'];
    $PRODI=$_POST['PRODI'];
    $ANGKATAN=$_POST['ANGKATAN'];
    $result['pesan']="";

    if ($NIM==""){
        $result['pesan']="NIM harus diisi";
    } 
    elseif ($NAMA==""){
        $result['pesan']="NAMA harus diisi";
    }
    elseif ($PRODI==""){
        $result['pesan']="PRODI harus diisi";
    }
    elseif ($ANGKATAN==""){
        $result['pesan']="ANGKATAN harus diisi";
    }
    else{
        $queryResult=$connect->query("UPDATE mahasiswa SET NIM='".$NIM."', NAMA='".$NAMA."', PRODI='".$PRODI."', ANGKATAN='".$ANGKATAN."' WHERE id='".$id."'");
    
        if($queryResult){
            $result['pesan']="Data berhasil diubah";
        }
        else{
            $result['pesan']="Data gagal diubah";
        }
    }

    echo json_encode($result);
?>