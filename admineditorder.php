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
                                <a class="nav-link " href="adminaccount.php">
                                    Account
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="adminorder.php">
                                    Orders
                                </a>
                            </li>                         
                        </ul>                                           
                    </div>
                </nav>          

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" >
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Edit Order</h1>                       
                    </div>
                    <?php
                    if (isset($_GET['id'])) {
                        $orders_id = mysqli_real_escape_string($conn, $_GET['id']);
                        $sql = "SELECT * FROM orders WHERE id='$orders_id' ";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            $orders = mysqli_fetch_array($result);
                            ?>
                            <form action="action.php" method="POST">
                                <input type="hidden" name="orders_id" value="<?= $orders['id']; ?>">
                                <div class="row">
                                    <div class="col">
                                        <label>Name</label>
                                        <input id="name" name="name" value="<?= $orders['name']; ?>" class="form-control" type="text" pattern="[A-Za-z0-9 ]{3,20}" required />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label>Email Address</label>
                                        <input id="email" name="email" value="<?= $orders['email'] ?>" class="form-control" type="email" required />                         
                                    </div>
                                </div>
                                <br>
                                <p>Phone Number:</p>
                                <input id="phone" name="phone" value="<?= $orders['phone']; ?>" class="form-control" type="tel" pattern="[0-9\+]+" required/>
                                <div class="alert alert-info" style="display: none;"></div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label>Delivery Address</label>
                                        <input type="text" name="address" value="<?= $orders['address']; ?>" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">

                                        <label>Products</label>
                                        <input id="products" name="products" value="<?= $orders['products'] ?>" class="form-control" type="text" required /> 
                                    </div>
                                </div>


                                <br>
                                <div class="row">
                                    <div class="col">

                                        <label>Amount to Pay</label>
                                        <input id="amount_paid" name="amount_paid" value="<?= $orders['amount_paid'] ?>" class="form-control" type="number" min="1.00" max="9999.99" step="0.10" required/>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">

                                        <div class="form-group ">
                                            <label>Status</label>
                                            <select required name="status" class="form-control">
                                                <option value="<?= $orders['status']; ?>" disabled>-Status-</option>
                                                <option value="Pending" selected>Pending</option>
                                                <option value="Delivery">Delivering</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <a href="adminorder.php" class="btn btn-primary">Back</a>
                                <button type="submit" name="update_order" class="btn btn-primary submitbtn">Update</button>
                            </form>
                            <?php
                        } else {
                            echo "<h4>Order Not Found</h4>";
                        }
                    }
                    ?>
                </main>
            </div>
        </div>
    </body>

</html>
