<?php
require_once 'db.php';

$id = $_GET['id'];
$user = getUserById($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>
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
      color: #333;
    }

    form {
      margin-top: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    input[type="text"],
    input[type="email"],
    input[type="submit"] {
      margin-bottom: 10px;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    input[type="submit"] {
      background-color: #3498db;
      color: #fff;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #2980b9;
    }
  </style>
</head>

<body>
  <h1>Edit User</h1>

  <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="text" name="name" placeholder="Nama" value="<?php echo $user['name']; ?>">
    <input type="email" name="email" placeholder="Email" value="<?php echo $user['email']; ?>">
    <input type="submit" value="Simpan">
  </form>
</body>

</html>
