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
    <title>Search Home Page</title>
</head>

<body>
    <?php include 'comman/nav.php' ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">SrN.</th>
                <th scope="col">Enquiry Num.</th>
                <th scope="col">Company Name</th>
                <th scope="col">Company Area</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Quotation Amount</th>
                <th scope="col">Po Amount</th>
                <th scope="col">Quotation Gen. by</th>
                <th scope="col">PO done by</th>
            </tr>
        </thead><?php
                $search = $_POST["search"];
                $qry = "SELECT * FROM `enquiry` WHERE CONCAT (`srn`, `enqNum`, `quotNum`, `cname`, `carea`, `fname`, `email`, `phone`, `tdate`, `quotDate`, `poDate`, `estatus`, `polength`, `pobreadth`, `quotAmount`, `poAmount`, `generatedby`, `QuotGeneratedby`, `doneBy`, `file_address`, `file_address_po`, `file_name_po`) LIKE '%$search%'";
                $counter = 0;
                $quy_result = mysqli_query($conn, $qry);
                if (mysqli_num_rows($quy_result) > 0) {
                    while ($row = mysqli_fetch_assoc($quy_result)) {
                        $address = $row["file_address_po"];
                        echo ' <tbody>
    <tr>
      <th scope="row">' . ++$counter . '</th>
      <td>' . $row["enqNum"] . '</td>
      <td>' . $row["cname"] . '</td>
      <td>' . $row["carea"] . '</td>
      <td>' . $row["phone"] . '</td>
      <td>' . $row["email"] . '</td>
      <td>' . $row["estatus"] . '</td>
      <td>' . $row["quotAmount"] . '</td>
      <td>' . $row["poAmount"] . '</td>
      <td>' . $row["QuotGeneratedby"] . '</td>
      <td>' . $row["doneBy"] . '</td>
    </tr>
  </tbody>';
                    }
                } else {
                    echo '<div class="err alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Sorry ! </strong>No result Found
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                }
                ?>
    </table>

    </form>
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