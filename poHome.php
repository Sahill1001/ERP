<?php
include 'comman/enquiry.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title> PO Home Page</title>
</head>

<body>
    <?php include 'comman/nav.php' ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">SrN.</th>
                <th scope="col">Quotation No.</th>
                <th scope="col">Length</th>
                <th scope="col">Breadth</th>
                <th scope="col">Company Name</th>
                <th scope="col">Status</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
                <th scope="col">Done By</th>
                <th scope="col">Action</th>
            </tr>
        </thead><?php
                $counter = 0;
                $address = "";
                $qry = "SELECT * FROM enquiry  WHERE estatus='Customer acquired' ";
                $quy_result = mysqli_query($conn, $qry);
                if (mysqli_num_rows($quy_result) > 0) {
                    while ($row = mysqli_fetch_assoc($quy_result)) {
                        echo ' <tbody>
    <tr>
      <th scope="row">' . ++$counter . '</th>
      <td>' . $row["quotNum"] . '</td>
      <td>' . $row["polength"] . 'cm</td>
      <td>' . $row["pobreadth"] . 'cm</td>
      <td>' . $row["cname"] . '</td>
      <td>' . $row["estatus"] . '</td>
      <td>₹' . $row["poAmount"] . '</td>
      <td>' . $row["poDate"] . '</td>
      <td>' . $row["doneBy"] . '</td>
      <td><a href="' . $row["file_address_po"] . $row["file_name_po"] . '"><span class="badge rounded-pill bg-primary">Download</span></a></td>
    </tr>
  </tbody>';
                    }
                }
                ?>
    </table>
    <?php include 'comman/footer.php' ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>