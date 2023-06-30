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
                                <a class="nav-link active" href="adminedit.php">
                                    Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="adminaccount.php">
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
                        <h1 class="h2">Create Product</h1>                       
                    </div>

                    <?php include('database.php'); ?>
                    <form action="action.php" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="col">
                                <label>Product Name</label>
                                <input type="hidden" name="id">
                                <input type="text" name="product_name" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>Product Price</label>
                                <input type="number" name="product_price" class="form-control" min="1.00" max="9999.99" step="0.10"required>
                            </div>
                        </div>
                        <br>
                        <label>Product Quantity</label>
                        <input type="number" name="product_qty" class="form-control" min="1" max="50" required step="1" oninput="validity.valid||(value='');"required>
                        <div class="alert alert-info" style="display: none;"></div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>Product Image</label>
                                <input type="hidden" name="id" class="form-control">
                                <input type="file" name="product_image"  class="form-control-file" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>Product Code</label>
                                <input type="text" name="product_code" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <a href="adminedit.php" class="btn btn-primary">Back</a>
                        <button type="submit" name="create_product" class="btn btn-primary submitbtn">Create</button>
                    </form>                           
                </main>
            </div>
        </div>
    </body>

</html>