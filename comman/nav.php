<style>.blink_me {
  animation: blinker 3s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}</style>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="img/cec.png" alt="cec_logo">
        </a>
    </div>
    <div class="container-fluid">
        <span class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome : <?php echo $name ?>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Update</a></li>
                <li><a class="dropdown-item" href="logout.php">LogOut</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="ph.php">Something else here</a></li>
            </ul>
        </span>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Options
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="enquiryHome.php">Enquiry</a></li>
                        <li><a class="dropdown-item" href="quatationHome.php">Quotation</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="poHome.php">PO</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Modal -->
            <div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Enquiry</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="comName" class="form-label">Company Name</label>
                                    <input type="text" name="cName" class="form-control" id="comName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="area" class="form-label">Company Area</label>
                                    <input type="text" name="cArea" class="form-control" id="area" required>
                                </div>
                                <div class="mb-3">
                                    <label for="PerName" class="form-label">Contact Person Name</label>
                                    <input type="text" name="name" class="form-control" id="PerName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Id</label>
                                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="number" name="phone" class="form-control" id="phone" minlength="10" maxlength="10" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <form class="d-flex" role="search" method="post" action="search.php">
                <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-primary" type="submit" name="submitSearch">Search</button>
            </form>
            <ul>
            <li class="nav-item pe-4">
                <span class="badge bg-primary mt-3 blink_me" data-bs-toggle="modal" data-bs-target="#enquiryModal">New Enquiry</span>
            </li>
        </ul>
        </div>
    </div>
</nav>