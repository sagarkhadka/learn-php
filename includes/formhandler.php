<?php
// var_dump($_SERVER["REQUEST_METHOD"]);

if ($_SERVER["REQUEST_METHOD"]) {
  $firstName = htmlspecialchars($_POST["name"]);
  $lastName = htmlspecialchars($_POST["lastname"]);
  $favouritePet = htmlspecialchars($_POST["favouritepet"]);

  echo "data";
  echo "<br />";
  echo $firstName;
  echo "<br />";
  echo $lastName;
}
