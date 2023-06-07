<?php
// define variables and set to empty values
$poAmountErr = $poFileErr = $lengthErr = $breadthErr = "";
$length = $breadth = $poAmount = $poFile = "";
$Selected_Enq = "";

// When form hit post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // define variables and set to empty values
    $poId = "";
    $quotNum_forPo = "";
    $poStatus = "";

    $companyWithDate = "";
    $fileDate = "";
    $cname = "";

    
    // Create date for folder 
    if (date("m") < 4) {
        $fileDate = (date("Y") - 1) . '-' . date("Y");
    } else {
        $fileDate = date("Y") . '-' . (date("Y") + 1);
    }



    // check if inputs are not empty !
    if (empty($_POST["length"])) {
        $lengthErr = "Please Enter PO length";
    } else {
        $length = $_POST["length"];
    }

    if (empty($_POST["breadth"])) {
        $breadthErr = "Please Enter Po breadth";
    } else {
        $breadth = $_POST["breadth"];
    }
    if (empty($_POST["poAmount"])) {
        $poAmountErr = "Please Enter Po amount";
    } else {
        $poAmount = $_POST["poAmount"];
    }

    if (!empty($_FILES["poFile"]["name"])) {
        $poFile = $_FILES["poFile"]["name"];
    } else {
        $poFileErr = "Please choose PO file";
    }

        // get quotation number.
    if (isset($_POST["po"])) {
        $quotNum = $_POST["po"];
    }


    if (!empty($length) && !empty($breadth) && !empty($poAmount) && !empty($poFile)) {
        $getIdQry = "SELECT * FROM enquiry WHERE quotNum='$quotNum'";
        $getIdQryRes = mysqli_query($conn, $getIdQry);
        if (mysqli_num_rows($getIdQryRes) > 0) {
            while ($poRow = mysqli_fetch_assoc($getIdQryRes)) {
                $quotNum_forPo = $poRow['quotNum'];
                $poStatus = $poRow['estatus'];
                $cname = $poRow['cname'];
            }
        }

        // File upload path\

        if (!is_dir("allFiles/")) {
            mkdir("allFiles/");
        }
        if (!is_dir("allFiles/" . $fileDate)) {
            mkdir("allFiles/" . $fileDate);
        }

        $companyWithDate = "$fileDate/$cname";
        $targetDir = "allFiles/$companyWithDate";

        if (!is_dir($targetDir)) {
            mkdir($targetDir);
        }

        $targetDir1 = "$targetDir/Po/";

        if (!is_dir($targetDir1)) {
            mkdir($targetDir1);
        }

        $fileName = basename($_FILES["poFile"]["name"]);
        $targetFilePath = $targetDir1;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $fName = 'PO' . date("Y-m-d") . '-';//filename

        if ($poStatus === "Quotation generated") {
            $fName = $fName . $quotNum_forPo;// file name
            $temp = explode(".", $_FILES["poFile"]["name"]); //file extention
            $newfilename = $fName . '.' . end($temp);// new filename
            if (move_uploaded_file($_FILES["poFile"]["tmp_name"], $targetFilePath . $newfilename)) {
                $poUpdate= "UPDATE enquiry SET polength='$length', pobreadth='$breadth',poAmount='$poAmount',poDate=current_timestamp(),doneBy='$name' ,estatus='Customer acquired',file_address_po='$targetDir1',file_name_po='$newfilename' WHERE quotNum='$quotNum_forPo'";
                if (mysqli_query($conn, $poUpdate)) {
                    $Selected_Enq = "PO have done of quotation number  $quotNum_forPo and the amount of po is ₹" . $poAmount;
                } else {
                    echo "somthing went wrong";
                }
            }
        }
    }
}
?>