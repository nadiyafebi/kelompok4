<?php
    $koneksi = new mysqli("localhost","root","","kelompok4");
    if($koneksi -> connect_error){
        echo "Koneksi belum terhubung";
    }
?>