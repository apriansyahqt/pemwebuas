<?php
$conn = mysqli_connect("localhost", "root", "", "kosaku");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
