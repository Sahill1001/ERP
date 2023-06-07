<?php
// define variables and set to empty values
$emailErrL = $passwordErrL = "";
$emailL = $passwordL = "";

$showAlertL = false;
$showUserL = false;
$showErrL = false;
$login = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["emailL"])) {
        $emailErrL = "Email is required";
    } else {
        $emailL = test_input($_POST["emailL"]);
        // check if e-mail address is well-formed
        if (!filter_var($emailL, FILTER_VALIDATE_EMAIL)) {
            $emailErrL = "Invalid email format";
        }
    }

    if (empty($_POST["passwdL"])) {
        $passwordErrL = "Password is required";
    } else {
        $passwordL = $_POST["passwdL"];
    }


    //check user credentials from database
    if (!empty($emailL) and !empty($passwordL)) {
        $sql = "SELECT * FROM myguest WHERE email='$emailL'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($passwordL, $row['passwd'])) {
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $emailL;
                    header("location: index.php");
                } else {
                    $showAlertL = true;
                }
            }
        } else {
            $showUserL = true;
        }
    }
}

?>