<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belanja</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <div>
            <p> Selamat Datang di </p>
            <h2> TOKO BUAH KAMI </h2>
        </div>
    </header><br>
    <p id="text1">Silakan Berbelanja!</p><br>

    <form method="post" action="fol.php">
        <div>
            <table >
                <tr>
                    <th>Mangga<br>15.000/kg</th>
                    <th>jambu<br>13.000/kg</th>
                    <th>Salak<br>10.000/kg</th>
                </tr>
                <tr>
                    <td><input type="number" min="0" id="id_mangga" name="mangga" placeholder="masukkan jumlah">kg</td>
                    <td><input type="number" min="0" id="id_jambu" name="jambu" placeholder="masukkan jumlah">kg</td>
                    <td><input type="number" min="0" id="id_salak" name="salak" placeholder="masukkan jumlah">kg</td>
                </tr>
            </table>
        </div><br>
        <input type="submit" value="Edit" id="tambah"/>
    </form><br>
    <div id="daftarbarang"></div>

    <?php
        $mangga=$_POST['mangga'];
        $jambu=$_POST['jambu'];
        $salak=$_POST['salak'];

        class beli{
            private $mangga, $jambu, $salak, $harga;

            public function __construct($mangga, $jambu, $salak, $harga){//magic method construct
                $this->mangga = $mangga;
                $this->jambu = $jambu;
                $this->salak = $salak;
                $this->harga = $mangga*15000 + $jambu*13000 + $salak*10000;
            }
            public function getHarga(){
                return $this->harga;
            }
            public function __toString(){//magic method toString
                return "<table id='table3'>
                <tr>
                <td>Mangga {$this->mangga} kg</td>
                </tr><tr>
                <td>jambu {$this->jambu} kg</td>
                </tr><tr>
                <td >salak {$this->salak} kg</td>
                </tr>
                </table>";  
            }
        }
        $keranjang = new beli($mangga, $jambu, $salak, $harga=0);//objek
    ?>

    <table id="table2">
        <tr><th colspan="4">Keranjang</th></tr>
        <tr>
            <th>Mangga</th>
            <th>Jambu</th>
            <th>Salak</th>
            <th>Total</th>
        </tr>
        <tr>
            <td><?php echo "$mangga"; ?> kg</td>
            <td><?php echo "$jambu"; ?> kg</td>
            <td><?php echo "$salak"; ?> kg</td>
            <td><?php echo "$mangga"+"$jambu"+"$salak"; ?> kg</td>
        </tr>
    </table><br>
    <input type="submit" value="Bayar" id="tambah" onclick="harga()"/><br><br>

    <div id="struk" style="border: 1px solid black;">
    <h3>Struk Belanjaan</h3>
        <?php echo $keranjang;?><br>
        <p>Harga total : </p><p id="harga_total"></p>
    </div>

    <script text="text/javascript">//javascript untuk menampilkan harga total
        function harga(){
            
            var jumlah = '<?php echo $keranjang->getHarga(); ?>';

            document.getElementById("harga_total").innerHTML = jumlah;
        }
    </script><br>

    <footer>pipit nizaria 11940155</footer>
</body>
</html>