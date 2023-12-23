<?php
require_once 'db.php';
$users = getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    h1 {
      color: #007bff;
    }

    .user-table {
      width: 80%;
      border-collapse: collapse;
      margin-top: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .user-table th,
    .user-table td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .user-table th {
      background-color: #f2f2f2;
    }

    .user-table tbody tr:hover {
      background-color: #f5f5f5;
    }

    a {
      text-decoration: none;
    }

    a.edit {
      color: #007bff;
    }

    a.delete {
      color: #dc3545;
    }

    .add-user-form {
      margin-top: 20px;
      width: 80%;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    label {
      margin-bottom: 5px;
      color: #333;
    }

    input[type="text"],
    input[type="email"],
    button {
      margin-bottom: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      background-color: #007bff;
      color: white;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <h1>User Management</h1>

  <table class="user-table">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) : ?>
        <tr>
          <td><?php echo $user['name']; ?></td>
          <td><?php echo $user['email']; ?></td>
          <td>
            <a class="edit" href="edit.php?id=<?php echo $user['id']; ?>">Edit</a>
            <a class="delete" href="delete.php?id=<?php echo $user['id']; ?>">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <form class="add-user-form" action="add.php" method="post">
    <label for="name">Nama:</label>
    <input type="text" id="name" name="name" placeholder="Masukkan nama">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Masukkan email">
    <button type="submit">Tambah</button>
  </form>
</body>

</html>
