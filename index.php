<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Site</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
  <main class="container my-5">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h2 class="">List of clients</h2>
      <a class="btn btn-primary" href="create.php" role="button">New Client</a>
    </div>
    <br>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Created at</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "my-site";

        $connection = new mysqli($servername, $username, $password, $database);

        if ($connection->connect_error) {
          die("Connection failde: " . $connection->connect_error);
        }

        $sql = "SELECT * FROM clients";
        $result = $connection->query($sql);

        if (!$result) {
          die("Invalid query: " . $connection->error);
        }

        while ($row = $result->fetch_assoc()) {
        ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['address'] ?></td>
            <td><?= $row['created_at'] ?></td>
            <td>
              <a href='/edit.php?id=<?= $row['id'] ?>' class='btn btn-primary btn-sm'>Edit</a>
              <a href='/delete.php?id=<?= $row['id'] ?>' class='btn btn-danger btn-sm'>Delete</a>
            </td>
          </tr>

        <?php
        };
        $connection->close();
        ?>

      </tbody>
    </table>
  </main>
</body>

</html>