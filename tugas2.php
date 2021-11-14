<?php

    $listArray = ['larine','aduh','qifuat','toda','anevi','samid','kifuat'];

    echo "tugas 2";
    echo "<br>"; echo "<br>";
    function fungsi($Array){
        foreach($Array as $list){
            echo $list;
            echo "<br>";
        }   
    }

    sort($listArray);
    fungsi($listArray);

?>