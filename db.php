<?php

// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";  // Pastikan keamanan password database Anda
$database = "uas_tools";

$con = mysqli_connect($host, $user, $password, $database);

// Cek koneksi database dan tampilkan error jika gagal
if (!$con) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Fungsi untuk mendapatkan semua pengguna
function getAllUsers() {
    global $con;

    $query = "SELECT * FROM users";
    $result = mysqli_query($con, $query);

    // Jika ada hasil
    if ($result) {
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }

        return $users;
    } else {
        return [];
    }
}

// Fungsi untuk mendapatkan pengguna berdasarkan id
function getUserById($id) {
    global $con;

    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($con, $query);

    // Jika ada hasil
    if ($result) {
        $user = mysqli_fetch_assoc($result);

        return $user;
    } else {
        return null;
    }
}

// Fungsi untuk menambah pengguna
function addUser($name, $email) {
    global $con;

    // Cegah SQL injection dengan escaping
    $name = mysqli_real_escape_string($con, $name);
    $email = mysqli_real_escape_string($con, $email);

    $query = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    $result = mysqli_query($con, $query);

    return $result;  // Kembalikan hasil query untuk pengecekan error
}

// Fungsi untuk mengedit pengguna
function editUser($id, $name, $email) {
    global $con;

    // Cegah SQL injection dengan escaping
    $name = mysqli_real_escape_string($con, $name);
    $email = mysqli_real_escape_string($con, $email);

    $query = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    $result = mysqli_query($con, $query);

    return $result;  // Kembalikan hasil query untuk pengecekan error
}

// Fungsi untuk menghapus pengguna
function deleteUser($id) {
    global $con;

    $query = "DELETE FROM users WHERE id=$id";
    $result = mysqli_query($con, $query);

    return $result;  // Kembalikan hasil query untuk pengecekan error
}

?>
