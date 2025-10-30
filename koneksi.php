<?php
$servername = "localhost"; // default server
$username = "root";        // default user di XAMPP
$password = "";            // kosongin aja (kalau belum diset)
$database = "juns_barber_arga_homes";      // nama database lo

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    echo "Koneksi berhasil!";
}
?>
