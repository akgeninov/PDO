<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "tugas5";

    try{
        $kon = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $kon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Berhasil terhubung";
    }
    catch(PDOException $gaga){
        echo "Gagal terhubung".$gagal->getMessage();
    }
?>
