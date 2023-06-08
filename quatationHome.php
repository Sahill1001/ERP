<?php
include 'comman/enquiry.php';
?>
<!doctype html>
<html lang="en">

<head>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Quotation Home Page</title>
</head>

<body>
  <?php include 'comman/nav.php' ?>
  <!-- Modal For Files -->
  <div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Files of quotations</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <table class="table table-hover" id="tbl">
          </table>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal For Quotation-->
  <div class="modal fade" id="poModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Quotation</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">

            <div class="mb-3">
              <label for="length" class="form-label">Length</label>
              <input type="number" name="length" class="form-control" id="length" required>
            </div>
            <div class="mb-3">
              <label for="breadth" class="form-label">Breadth</label>
              <input type="number" name="breadth" class="form-control" id="breadth" required>
            </div>
            <div class="mb-3">
              <label for="poAmount" class="form-label">PO Amount</label>
              <input type="number" name="poAmount" class="form-control" id="poAmount" required>
            </div>
            <div class="mb-3">
              <label for="poFile" class="form-label">Choose PO File</label>
              <input class="form-control" type="file" id="poFile" name="poFile" required>
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
        <th scope="col">Quotation No.</th>
        <th scope="col">Company Name</th>
        <th scope="col">Status</th>
        <th scope="col">Amount</th>
        <th scope="col">Date</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
        <?php include 'comman/po.php';
        if ($Selected_Enq) {
          echo '<div class="err alert alert-success alert-dismissible fade show" role="alert">
                      <strong>' . $Selected_Enq . ' </strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        } ?>
      </tr>
    </thead><?php
            $counter = 0;
            $enq = "";
            $qry = "SELECT * FROM enquiry  WHERE estatus='Quotation generated' ";
            $quy_result = mysqli_query($conn, $qry);
            if (mysqli_num_rows($quy_result) > 0) {
              while ($row = mysqli_fetch_assoc($quy_result)) {
                echo ' <tbody>
    <tr>
      <th scope="row">' . ++$counter . '</th>
      <td ><input id="id' . $row["enqNum"] . '" name="enqNumId" type="radio" value="' . $row["enqNum"] . '" style="visibility: hidden;"><label for="id' . $row["enqNum"] . '"><span class="badge rounded-pill bg-primary" data-bs-toggle="modal" data-bs-target="#fileModal">' . $row["quotNum"] . '</span></label></td>
      <td>' . $row["cname"] . '</td>
      <td>' . $row["estatus"] . '</td>
      <td>₹ ' . $row["quotAmount"] . '</td>
      <td>' . $row["quotDate"] . '</td>
      <td>' . $row["QuotGeneratedby"] . '</td>
      <td ><input id="' . $row["quotNum"] . '" name="po" type="radio" value="' . $row["quotNum"] . '" style="visibility: hidden;"><label for="' . $row["quotNum"] . '"><span class="badge rounded-pill bg-primary" data-bs-toggle="modal" data-bs-target="#poModal">PO</span></label></td>
    </tr>
  </tbody>';
              }
            }
            ?>
  </table>





  <?php include 'comman/footer.php' ?>

  <script>
    $('input[type=radio]').click(function(e) {
      var enqNumId = $(this).val();
      console.log(enqNumId);
      $.ajax({
        url: 'ajax.php', // Leave it empty to send the request to the same page
        type: 'POST',
        data: {
          enqNumId: enqNumId
        },
        success: function(data) {
          document.getElementById("tbl").innerHTML = data;
          console.log('Data sent successfully!');
        },
        error: function() {
          console.log('Error sending data!');
        }
      });
    });
  </script>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRI0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



    -->
</body>

</html>