<?php
require_once("koneksi.php");

if (isset($_GET["api"])) {
    // Sanitasi dan validasi input
    $data = $_GET["api"];
    if (!is_numeric($data)) {
        echo "Data harus berupa angka.";
        exit;
    }

    // Query menggunakan prepared statement
    $sql = "INSERT INTO api(sensor_vl) VALUES (?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "d", $data); // Bind parameter dengan tipe double (angka desimal)
        if (mysqli_stmt_execute($stmt)) {
            echo "Data berhasil disimpan";
        } else {
            echo "Error eksekusi query: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error persiapan query: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
} else {
    echo "Parameter tidak lengkap";
}
?>
