<?php
include 'dbconnect.php';
// define variables and set to empty values
$nameErr = $emailErr = $passwordErr = $cpasswordErr = "";
$name = $email = $password = "";

$showAlert = false;
$showAlertErr = false;
$exists = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

//password validation
  if (empty($_POST["passwd"])) {
    $passwordErr = "Password is required";
  } elseif (strlen($_POST["passwd"]) < 6) {
    $passwordErr = "Password should be minimus 6 charecter";
  } elseif ($_POST["passwd"] !== $_POST["cpasswd"]) {
    $cpasswordErr = "Password is not match";
  } else {
    $password = $_POST["passwd"];
  }

//insert user credentials in database.
  if (!empty($name) and !empty($email) and !empty($password)) {
    $sql = "SELECT * FROM myguest WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO myguest (fname,email,passwd,tdate) VALUES ('$name','$email','$hash',current_timestamp())";
      if (mysqli_query($conn, $sql)) {
        $showAlert = true;
      } else {
        $showAlertErr = true;
      }
    } else {
      $exists = true;
    }
  }
}


//input validation function
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>