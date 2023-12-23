<?php

// Menghubungkan ke database
require_once 'db.php';

// Validasi form

if (empty($_POST['name'])) {
  echo "Nama harus diisi";
  exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  echo "Email tidak valid";
  exit;
}

// Pencegahan SQL injection

$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);

// Menambahkan pengguna ke database

$result = addUser($name, $email);

if ($result) {
  // Jika berhasil, arahkan ke halaman userlist
  header("Location: index.php");
} else {
  // Jika gagal, tampilkan pesan error
  echo "Gagal menambahkan pengguna";
}

?>
