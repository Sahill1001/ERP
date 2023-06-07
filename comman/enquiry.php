<?php
include 'comman/session.php';
// define variables and set to empty values
$cNameErr = $cAreaErr = $eNameErr = $emailErr = $phoneErr = "";
$cName = $cArea = $eName = $email = $phone = "";

$id = "cecE1";
$showAlert = false;
$showAlertErr = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["cName"])) {
        $cNameErr = "Company name is required";
    } else {
        $cName = test_input($_POST["cName"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $cName)) {
            $cNameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["cArea"])) {
        $cAreaErr = "Company is required";
    } else {
        $cArea = test_input($_POST["cArea"]);
    }


    if (empty($_POST["name"])) {
        $eNameErr = "Name is required";
    } else {
        $eName = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $eName)) {
            $eNameErr = "Only letters and white space allowed";
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

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
    } else {
        $phone = test_input($_POST["phone"]);
        // check if e-mail address is well-formed
        if (!preg_match('/^[0-9]{10}+$/', $phone)) {
            $phoneErr = "Invalid Phone format";
        }
    }


    //check enquiry number exist or not
    $eqnum = "";
    if (!empty($cName) and !empty($cArea) and !empty($eName) and !empty($email) and !empty($phone)) {
        $sql1 = "SELECT `enqNum` FROM enquiry ORDER BY srn DESC LIMIT 1";
        $result = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $eqnum = $row['enqNum'];
            }
        }

        //if enquiry number exist in databse
        if ($eqnum) {
            $eqnum = $eqnum[strlen($eqnum) - 1];
            $eqnum += 1;
            $eqnum = "cecE" . $eqnum;
            $sql = "INSERT INTO enquiry (enqNum,cname ,carea ,fname ,email ,phone ,tdate ,estatus ,generatedby) VALUES ('$eqnum','$cName','$cArea','$eName','$email','$phone',current_timestamp(),'Enquiry Generated' ,'$name')";
            if (mysqli_query($conn, $sql)) {
                $showAlert = true;
            } else {
                $showAlertErr = true;
            }
        }
        //if enquiry number not exist in databse
        else { 
            $sql = "INSERT INTO enquiry (enqNum,cname ,carea ,fname ,email ,phone ,tdate ,estatus ,generatedby) VALUES ('$id','$cName','$cArea','$eName','$email','$phone',current_timestamp(),'Enquiry Generated' ,'$name')";
            if (mysqli_query($conn, $sql)) {
                $showAlert = true;
            } else {
                $showAlertErr = true;
            }
        }
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>