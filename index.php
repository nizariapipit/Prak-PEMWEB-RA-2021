<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <br>
    <table style="width:100%">
        <thead>
            <th>no</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Angkatan</th>
            <th></th>
        </thead>
        <tbody id="barisData">

        </tbody>
    </table>

    <h2>Tambah Data</h2>
    <table>
        <tr>
            <td>id</td>
            <td><input type="text" name="id" disabled/></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td><input type="text" name="NIM"/></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td><input type="text" name="NAMA"/></td>
        </tr>
        <tr>
            <td>PRODI</td>
            <td><input type="text" name="PRODI"/></td>
        </tr>
        <tr>
            <td>ANGKATAN</td>
            <td><input type="text" name="ANGKATAN"/></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button id="tombolTambah" onclick="tambahdata()">TAMBAH DATA</button>
                <button id="tombolUpdate" onclick="updatedata()">UPDATE DATA</button>
            </td>
        </tr>
    </table>
        <p id="pesan"></p>

    <script type="text/javascript">
        onload();

        function updatedata(){
            var id = $("[name='id']").val();
            var NIM = $("[name='NIM']").val();
            var NAMA = $("[name='NAMA']").val();
            var PRODI= $("[name='PRODI']").val();
            var ANGKATAN = $("[name='ANGKATAN']").val();

            $.ajax({
                type : "POST",
                data : "id="+id+"&NIM="+NIM+"&NAMA="+NAMA+"&PRODI="+PRODI+"&ANGKATAN="+ANGKATAN,
                url : "updatedata.php",
                success : function(result){
                    var objectResult=JSON.parse(result);
                    $("#pesan").html(objectResult.pesan);
                
                onload();

                }
            })
        }

        function tambahdata(){
            var NIM = $("[name='NIM']").val();
            var NAMA = $("[name='NAMA']").val();
            var PRODI= $("[name='PRODI']").val();
            var ANGKATAN = $("[name='ANGKATAN']").val();

            $.ajax({
                type : "POST",
                data : "NIM="+NIM+"&NAMA="+NAMA+"&PRODI="+PRODI+"&ANGKATAN="+ANGKATAN,
                url : "tambahdata.php",
                success : function(result){
                    var objectResult=JSON.parse(result);
                    $("#pesan").html(objectResult.pesan);
                
                onload();

                }
            })
        }

        function pilihData(idx){
            var id=idx;
            $.ajax({
                type : "POST",
                data : "id="+id,
                url : "ambilid.php",
                success : function(result){
                    var objectResult=JSON.parse(result);
                    $("[name='nim']").val(objectResult.NIM);
                    $("[name='id']").val(objectResult.id);
                    $("[name='nama']").val(objectResult.NAMA);
                    $("[name='prodi']").val(objectResult.PRODI);
                    $("[name='angkatan']").val(objectResult.ANGKATAN);
                    $("#tombolTambah").hide();
                    $("#tombolUpdate").show();
                }
            })
        }

        function hapusData(id){
            var tanya = confirm("Apakah Anda yakin ingin menghapus data ini?");
            if (tanya){
            $.ajax({
                type : "POST",
                data : "id="+id,
                url : 'hapus.php',
                success : function($result){
                    onload();
                }
            })
        }
        }

        function onload(){
            var dataHandler=$("#barisData");
            dataHandler.html("");
            $.ajax({
            type : "GET",
            data : "",
            url : "ambilData.php",
            success : function(result){
                var objectResult=JSON.parse(result);
                var nomor =1;
                $.each(objectResult, function(key,val){
                    var barisBaru=$("<tr>");
                    barisBaru.html("<td>"+nomor+"</td><td>"+val.nim+"</td><td>"+val.nama+"</td><td>"+val.prodi+"</td><td>"
                    +val.angkatan+"</td><td><button onclick='pilihData("+val.id+")'>Select</button><button onclick='hapusData("+val.id+")'>Hapus</button></td>")                  
                    dataHandler.append(barisBaru);
                    nomor++;
                    $("#tombolUpdate").hide();
                    $("#tombolTambah").show();
                })
            } 
        })
        }
    </script>
</body>
</html>