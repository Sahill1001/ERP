<style>
    /* .blink_me {
        animation: blinker 3s linear infinite;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    } */

    .badge:hover {
        cursor: pointer;
    }

    /* The sidebar menu */
    .sidebar {
        height: 100%;
        width: 0;
        /* 0 width - change this with JavaScript */
        position: fixed;
        /* Stay in place */
        z-index: 0.5;
        /* Stay on top */
        top: 69.5px;
        left: 0;
        background-color: #212529 !important;
        /* Black*/
        overflow-x: hidden;
        /* Disable horizontal scroll */
        padding-top: 60px;
        /* Place content 60px from the top */
        transition: 0.5s;
        /* 0.5 second transition effect to slide in the sidebar */
    }

    /* The sidebar links */
    .sidebar a {
        text-decoration: none;
        color: #FFFFFF;
        display: block;
        transition: 0.3s;
        opacity: 0.7;
    }

    /* When you mouse over the navigation links, change their color */
    .sidebar a:hover {
        color: black;
    }

    /* Position and style the close button (top right corner) */
    .sidebar .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    /* The button used to open the sidebar */
    .openbtn {
        font-size: 17px;
        cursor: pointer;
        background-color: #212529;
        color: white;
        padding: 10px 15px;
        border: none;
    }

    .openbtn:hover {
        opacity: 1;
        border: #FFFFFF;
    }

    /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
    #main {
        transition: margin-left .5s;
        /* If you want a transition effect */
        padding: 20px;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidebar {
            padding-top: 15px;
        }

        .sidebar a {
            font-size: 18px;
        }
    }
</style>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark bg-dark">
    <div class="container " style="width: 511px;">
        <a class="navbar-brand" href="index.php" style="margin: 0;">
            <img src="img/cec.png" alt="cec_logo">
        </a>
    </div>
    <div class="container"><button class="openbtn" onclick="myFunction()" style="opacity: 0.6;">&#9776;Options</button>
        <ul>
            <li class="nav-item">
                <span class="badge bg-primary mt-3 blink_me mr-4" data-bs-toggle="modal" data-bs-target="#enquiryModal">New Enquiry</span>
            </li>
        </ul>
    </div>
    <div class="container-fluid">
        <ul>
            <li class="nav-item">
            </li>
        </ul>
        <ul>
            <li class="nav-item">
            </li>
        </ul>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
            <span class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome : <?php echo $name ?>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item disabled " href="#">Update</a></li>
                    <li><a class="dropdown-item" href="logout.php">LogOut</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item disabled" href="#">Something else here</a></li>
                </ul>
            </span>

        </div>
    </div>
</nav>

<!-- The sidebar -->
<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a class="dropdown-item" href="enquiryHome.php">Enquiry</a>
    <a class="dropdown-item" href="quatationHome.php">Quotation</a>
    <a class="dropdown-item" href="poHome.php">PO</a>
</div>


<!-- <script>
    /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
    function openNav() {
        document.getElementById("mySidebar").style.width = "100px";
        document.getElementById("main").style.marginLeft = "100px";
    }

    /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */

</script> -->

<script>
    function myFunction() {
        var x = document.getElementById("mySidebar");
        var y = document.getElementById("main");
        if (x.style.width == "100px") {
            x.style.width = "0";
            y.style.marginLeft = "0";
        } else {
            x.style.width = "100px";
            y.style.marginLeft = "100px";
        }
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>