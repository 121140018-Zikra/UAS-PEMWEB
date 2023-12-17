<?php
// Konfigurasi koneksi ke database MySQL
define('DB_HOST', 'localhost'); // Host
define('DB_USER', 'root'); // Username
define('DB_PASSWORD', ''); // Password
define('DB_NAME', 'mahasiswa'); // Nama database

// Buat koneksi
$koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
