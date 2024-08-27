<?php
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

$servername = "localhost";
$username = "root";
$password = "";
$database = "my-site";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
  die("Connection failde: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];

  do {
    if (empty($name) | empty($email) | empty($phone) | empty($address)) {
      $errorMessage = "All fields are required";
      break;
    }

    $sql = "INSERT INTO clients (name, email, phone, address)" . "VALUES ('$name', '$email', '$phone', '$address')";
    $result = $connection->query($sql);

    if (!$result) {
      $errorMessage = "Invalid query: " . $connection->error;
      break;
    }

    $successMessage = "Client added sucessfully";

    header("location: /my-site");
  } while (false);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit client</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container my-5">
    <h2>New Client</h2>

    <?php
    if (!empty($errorMessage)) {
    ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><?= $errorMessage ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
    }
    ?>

    <form method="post">
      <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-6">
          <input type="text" name="name" id="" class="form-control" value="<?= $name ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-6">
          <input type="email" name="email" id="" class="form-control" value="<?= $email ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">Phone</label>
        <div class="col-sm-6">
          <input type="text" name="phone" id="" class="form-control" value="<?= $phone ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">Address</label>
        <div class="col-sm-6">
          <input type="text" name="address" id="" class="form-control" value="<?= $address ?>">
        </div>
      </div>

      <?php
      if (!empty($successMessage)) {
      ?>
        <div class="row mb-3">
          <div class="offset-sm-3 col-sm-6">
            <div class="alert alert-success alert-dismissible fase show" role="alert">
              <strong><?= $successMessage ?></strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        </div>
      <?php
      }
      ?>

      <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-3 d-grid">
          <a href='/my-site' type="submit" class="btn btn-outline-danger">Cancel</a>
        </div>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>