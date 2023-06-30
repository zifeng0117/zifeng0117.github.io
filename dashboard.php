<?php
include('database.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.101.0">
        <title>Online Optical Shop Ordering System Ban UK</title>


        <!-- bootstrap -->
        <link href="JRadmindesign.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    </head>
    <body>

        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-3 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3 p-2" href="#">Ban UK Optometrist</a>
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

                    <a class="nav-link" href="adminlogin.php">Sign out </a>

                </li>

            </ul>

        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="dashboard.php">
                                    Dashboard <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="adminedit.php">
                                    Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="adminaccount.php">
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
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>                       
                    </div>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="card border-success mb-3" style="max-width: 18rem;">
                                    <div class="card-header bg-transparent border-success text-center">Total Product <i class="bi bi-sunglasses"></i></div>                        
                                    <div class="card-body text-success">
                                        <div class="card-title text-center">
                                            <?php
                                            $dash_products_query = "SELECT * from product";
                                            $dash_products_query_run = mysqli_query($conn, $dash_products_query);
                                            if ($product_total = mysqli_num_rows($dash_products_query_run)) {
                                                echo '<h4 class="mb-0">', $product_total, '</h4>';
                                            } else {
                                                echo '<h4 class="mb-0"> No Data </h4>';
                                            }
                                            ?></div>                          
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-black-50 stretched-link" href="adminedit.php">View Details</a>  
                                    </div>  
                                </div>
                            </div>                         
                            <div class="col">
                                <div class="card border-success mb-3" style="max-width: 18rem;">
                                    <div class="card-header bg-transparent border-success text-center">Total Order <i class="bi bi-box"></i></div>                        
                                    <div class="card-body text-success">
                                        <div class="card-title text-center"> <?php
                                            $dash_orders_query = "SELECT * from orders";
                                            $dash_orders_query_run = mysqli_query($conn, $dash_orders_query);
                                            if ($orders_total = mysqli_num_rows($dash_orders_query_run)) {
                                                echo '<h4 class="mb-0">', $orders_total, '</h4>';
                                            } else {
                                                echo '<h4 class="mb-0"> No Data </h4>';
                                            }
                                            ?></div>                          
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-black-50 stretched-link" href="adminorder.php">View Details</a>  
                                    </div>  
                                </div> 
                            </div>
                            <div class="col">
                                <div class="card border-success mb-3" style="max-width: 18rem;">
                                    <div class="card-header bg-transparent border-success text-center">Total User <i class="bi bi-people-fill"></i></div>                        
                                    <div class="card-body text-success">
                                        <div class="card-title text-center"> <?php
                                            $dash_user_query = "SELECT * from user";
                                            $dash_user_query_run = mysqli_query($conn, $dash_user_query);
                                            if ($user_total = mysqli_num_rows($dash_user_query_run)) {
                                                echo '<h4 class="mb-0">', $user_total, '</h4>';
                                            } else {
                                                echo '<h4 class="mb-0"> No Data </h4>';
                                            }
                                            ?></div>                          
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-black-50 stretched-link" href="adminaccount.php">View Details</a>  
                                    </div>  
                                </div> 
                            </div>
                        </div>
                    </div>

                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </body>

</html>
