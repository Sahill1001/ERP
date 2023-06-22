<?php
include 'comman/dbconnect.php';
$counter = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the value of enqNumId from the AJAX request
    $enqNumId = $_POST['enqNumId'];
    // Send a response back to the AJAX request
    $files = "";
    $sql = "SELECT * FROM enquiry WHERE enqNum='$enqNumId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $files = scandir($row["file_address"], SCANDIR_SORT_DESCENDING);
            $num = count($files);
            for ($i = 0; $i < ($num - 2); $i++) {
                echo ' <tbody id="myTable">
            <tr>
                <th scope="row">' . ++$counter . '</th>
                <th scope="row">' . $files[$i] . '</th>
                <td><a href="' . $row["file_address"] . $files[$i] . '"><span class="badge rounded-pill bg-primary">Download</span></a></td>
            </tr>
            </tbody>';
            }
        }
    }
    exit; // Terminate the PHP script after sending the response

} else {
    echo "Else";
}
