<?php
// define variables and set to empty values
$quotAmountErr = "";
$quotAmount = "";
$Selected_Enq = "";

$fName = '';

// When form hit post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // define variables and set to empty values
    $qtId = "";
    $quotNum = "";
    $quotStatus = "";

    $companyWithDate = "";
    $fileDate = "";
    $cname = "";

    // Create date for folder 
    if (date("m") < 4) {
        $fileDate = (date("Y") - 1) . '-' . date("Y");
    } else {
        $fileDate = date("Y") . '-' . (date("Y") + 1);
    }



    // check if Quotation is  not empty !
    if (empty($_POST["qAmount"])) {
        $quotAmountErr = "Please Enter Quotation amount";
    } else {
        $quotAmount = $_POST["qAmount"];
    }

    // get enquiry number.
    if (isset($_POST["quot"])) {
        $enqNum = $_POST["quot"];
    }
    
    if (!empty($quotAmount) && !empty($_FILES["file"]["name"])) {
        $getIdQry = "SELECT * FROM enquiry WHERE enqNum='$enqNum'";
        $getIdQryRes = mysqli_query($conn, $getIdQry);

        if (mysqli_num_rows($getIdQryRes) > 0) {
            while ($row = mysqli_fetch_assoc($getIdQryRes)) {
                $quotNum = $row['enqNum'];
                $quotStatus = $row['estatus'];
                $cname = $row['cname'];
                $qtId = $row['quotNum'];
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

        $targetDir1 = "$targetDir/Quotation/";

        if (!is_dir($targetDir1)) {
            mkdir($targetDir1);
        }




        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir1;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


        $fName = date("Y-m-d") . '-'; //for filename



        $quotNum1 = $quotNum . "R01";

        //check if quotation is not generated 
        if ($quotStatus != "Quotation generated") { 
            $fName = $fName . $quotNum1;
            $temp = explode(".", $_FILES["file"]["name"]);
            $newfilename = $fName . '.' . end($temp);
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath . $newfilename)) {
                $update = "UPDATE enquiry SET quotNum='$quotNum1',quotAmount='$quotAmount',quotDate=current_timestamp(),QuotGeneratedby='$name' ,estatus='Quotation generated',file_address='$targetDir1' WHERE enqNum='$enqNum'";
                if (mysqli_query($conn, $update)) {
                    $Selected_Enq = "Quotation have done of enquiry number $quotNum and Quotation amount was ₹" . $quotAmount;
                }
            }
        } else {

            $quotNum2 = $quotNum;

            if ($qtId) {
                $qtId = $qtId[strlen($qtId) - 1];
                $qtId += 1;
                $qtId = $quotNum2 . 'R0' . $qtId;//id

                $fName = $fName . $qtId;//filename

                $temp = explode(".", $_FILES["file"]["name"]);//extention of file

                $newfilename = $fName . '.' . end($temp); //file name with extention

                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath . $newfilename)) {
                    $update = "UPDATE enquiry SET quotNum=' $qtId',quotAmount='$quotAmount',quotDate=current_timestamp(),QuotGeneratedby='$name',file_address='$targetDir1' WHERE enqNum='$enqNum'";
                    if (mysqli_query($conn, $update)) {
                        $Selected_Enq = "Re quotation have done of quotation number $quotNum1 and Quotation amount was ₹" . $quotAmount;
                    }
                }
            }
        }
    }
}
?>