<?php
include('database.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.101.0">
        <title>Online Optical Shop Ordering System Ban UK</title>

        <!-- Phone number -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
        <!-- bootstrap -->
        <link href="JRadmindesign.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Ban UK Optometrist</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <div class="text-white">
                        Welcome
                        <strong>
                            <?php echo $_SESSION['admin']; ?>
                        </strong>
                    </div>
                    <a class="nav-link" href="adminlogin.php">Sign out</a>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php">
                                    Dashboard <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="adminedit.php">
                                    Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="adminaccount.php">
                                    Account
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="adminorder.php">
                                    Orders
                                </a>
                            </li>                         
                        </ul>                                           
                    </div>
                </nav>          
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" >
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Edit Account</h1>                       
                    </div>
                    <?php
                    if (isset($_GET['id'])) {
                        $user_id = mysqli_real_escape_string($conn, $_GET['id']);
                        $sql = "SELECT * FROM user WHERE id='$user_id' ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $user = mysqli_fetch_array($result);
                            ?>
                            <form action="action.php" method="POST">
                                <input type="hidden" name="user_id" value="<?= $user['id']; ?>">

                                <div class="email">
                                    <label>Email Address</label>
                                    <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control">
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label>Username</label>
                                        <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control" 
                                               minlength="2" maxlength="12" pattern="[A-Za-z0-9]{2,12}" title="Please enter only alphanumeric characters" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label >Password</label>
                                        <input type="password" name="password" value="<?= $user['password']; ?>" class="form-control" minlength="3"
                                               maxlength="8" pattern="[A-Za-z0-9]{3,8}" title="Please enter a password with a minimum of 3 alphanumeric characters" required>
                                    </div>
                                </div>
                                <br>
                                <p>Phone Number:</p>
                                <input id="phone" name="phone" value="<?= $user['phone']; ?>" class="form-control" type="tel" pattern="[0-9\+]+"/>
                                <div class="alert alert-info" style="display: none;"></div>
                                <br><br>
                                <a href="adminaccount.php" class="btn btn-primary">Back</a>
                                <button type="submit" name="update_user" class="btn btn-primary submitbtn">Update</button>
                            </form>
                            <?php
                        } else {
                            echo "<h4>Account Not Found</h4>";
                        }
                    }
                    ?>              
                </main>
            </div>
        </div>
    </body>
    <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript:
                    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
        const info = document.querySelector(".alert-info");

        function process(event) {
            event.preventDefault();

            const phoneNumber = phoneInput.getNumber();

            info.style.display = "";
            info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
        }
    </script>
</html>
