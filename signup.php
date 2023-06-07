<?php include 'comman/form.php' ?>
<?php include 'comman/login_form.php' ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .alert-danger {
            text-align: center;
        }
    </style>
    <title>Login & SignUp Form</title>
</head>


<body>
    <?php
    if ($showAlertErr) {
        echo '<div class="err alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong>' . mysqli_error($conn) . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } elseif ($showAlertL) {
        echo '<div class="err alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry! </strong> Wrong credentials.!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } elseif ($exists) {
        echo '<div class="err alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry! </strong> The user is already exists!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } elseif ($showUserL) {
        echo '<div class="err alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry! </strong> The user doesn not exists!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } elseif ($showAlert) {
        echo '<div class="err alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulations! </strong> Your account is created successfully now you can login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if ($cpasswordErr) {
        echo '<div class="err alert alert-danger alert-dismissible fade show" role="alert">
        <strong>' . $cpasswordErr . '</strong>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if ($passwordErr) {
        echo '<div class="err alert alert-danger alert-dismissible fade show" role="alert">
        <strong>' . $passwordErr . '</strong>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    ?>

    <a href="https://crescentengg.co.in/" class="logo" target="_blank">
        <img src="img/cec.png" alt="">
    </a>

    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Log In</h4>

                                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                <div class="form-group">
                                                    <input type="email" name="emailL" class="form-style" placeholder="Your Email" id="emailL" required>
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <!-- <span class="err"><?php echo  $emailErrL; ?></span> -->
                                                <div class="form-group mt-2">
                                                    <input type="password" name="passwdL" class="form-style" placeholder="Your Password" id="passwdL" onmouseover="lShowPass()" onmouseout="lHidePass()" required>
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <input type="submit" class="btn mt-4" value="LogIn" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-3 pb-3">Sign Up</h4>
                                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                <div class="form-group">
                                                    <input type="text" name="fname" class="form-style" placeholder="Your Full Name" id="fname" required>
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="email" name="email" class="form-style" placeholder="Your Email" id="email" required>
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="passwd" class="form-style" placeholder="Your Password" id="passwd" onmouseover="showPass()" onmouseout="hidePass()" required>
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="cpasswd" class="form-style" placeholder="Confirm your Password" id="cpasswd" onmouseover="cShowPass()" onmouseout="cHidePass()" required>
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <input type="submit" class="btn mt-4" value="SignUp" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'comman/footer.php' ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <script src="js/passShow.js"></script> -->

    <script>
        function showPass() {
            var x = document.getElementById("passwd");
            x.type = "text";
        }

        function hidePass() {
            var x = document.getElementById("passwd");
            x.type = "password";
        }

        function cShowPass() {
            var y = document.getElementById("cpasswd");
            y.type = "text";
        }

        function cHidePass() {
            var y = document.getElementById("cpasswd");
            y.type = "password";
        }

        function lShowPass() {
            var z = document.getElementById("passwdL");
            z.type = "text";
        }

        function lHidePass() {
            var a = document.getElementById("passwdL");
            a.type = "password";
        }
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>