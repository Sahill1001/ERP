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
  <title>Home Page</title>
</head>

<body>
  <?php include 'comman/nav.php' ?>
  <?php
  // ------------------------------------------------For Enquiry status-------------------------------------------------------//
  if ($showAlertErr) {
    echo '<div class="err alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong>' . mysqli_error($conn) . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  } elseif ($showAlert) {
    echo '<div class="err alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulations! </strong> Your enquiry is created successfully!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }

  ?>

  <!-- Modal -->
  <div class="modal fade" id="quotationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Quotation</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">

            <div class="mb-3">
              <label for="qAmount" class="form-label">Quotation amount</label>
              <input type="number" min="1" name="qAmount" class="form-control" id="qAmount" required>
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">Choose Quotation file</label>
              <input class="form-control" type="file" id="formFile" name="file" required>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

    </div>
  </div>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">SrN.</th>
        <th scope="col">EQN.</th>
        <th scope="col">Company Name</th>
        <th scope="col">Status</th>
        <th scope="col">Date</th>
        <th scope="col">Area</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Action</th>
        <?php include 'comman/quotation.php';
        if ($Selected_Enq) {
          echo '<div class="err alert alert-success alert-dismissible fade show" role="alert">
              <strong>' . $Selected_Enq . ' </strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>
      </tr>
    </thead><?php
            $counter = 0;
            $qry = "SELECT * FROM enquiry WHERE estatus='Enquiry Generated'";
            $quy_result = mysqli_query($conn, $qry);
            if (mysqli_num_rows($quy_result) > 0) {
              while ($row = mysqli_fetch_assoc($quy_result)) {
                echo ' <tbody>
    <tr>
      <th scope="row">' . ++$counter . '</th>
      <td>' . $row["enqNum"] . '</td>
      <td>' . $row["cname"] . '</td>
      <td>' . $row["estatus"] . '</td>
      <td>' . $row["tdate"] . '</td>
      <td>' . $row["carea"] . '</td>
      <td>' . $row["fname"] . '</td>
      <td>' . $row["email"] . '</td>
      <td>' . $row["phone"] . '</td>
      <td ><input id="' . $row["enqNum"] . '" name="quot" type="radio" value="' . $row["enqNum"] . '" style="visibility: hidden;"><label for="' . $row["enqNum"] . '"><span class="badge rounded-pill bg-primary " data-bs-toggle="modal" data-bs-target="#quotationModal">Quotation</span></label></td>
    </tr>
  </tbody>';
              }
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