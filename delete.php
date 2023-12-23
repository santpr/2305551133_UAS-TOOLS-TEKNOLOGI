<?php

// Menghubungkan ke database
require_once 'db.php';

// Mendapatkan id pengguna dari URL
$id = $_GET['id'];

// Menghapus pengguna berdasarkan id
deleteUser($id);

// Mengarahkan ke halaman userlist
header("Location: index.php");

?>
