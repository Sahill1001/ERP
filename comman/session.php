<?php
include 'comman/dbconnect.php';
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:signup.php");
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
    exit;
} else {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM myguest WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row["fname"];
    }
}
?>