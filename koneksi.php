<?php
$host = 'localhost'; // atau alamat server database Anda
$db = 'dbcms';
$user = 'root'; // username database Anda
$pass = ''; // password database Anda

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>