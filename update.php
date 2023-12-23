<?php

// Menghubungkan ke database
require_once 'db.php';

// Validasi form

if (empty($_POST['name'])) {
  echo "Nama harus diisi";
  exit;
}

if (!filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING)) {
  echo "Nama tidak valid";
  exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  echo "Email tidak valid";
  exit;
}

// Pencegahan SQL injection

$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$id = $_POST['id'];

// Mengubah data pengguna di database

$query = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
$result = mysqli_query($con, $query);

if ($result) {
  // Jika berhasil, arahkan ke halaman userlist
  header("Location: index.php");
} else {
  // Jika gagal, tampilkan pesan error
  echo "Gagal mengubah pengguna: " . mysqli_error($con);
}

?>
