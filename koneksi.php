<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "admin_antrian");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>