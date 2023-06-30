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

                <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4" >
                    <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Products
                        </h1>                       
                    </div>                                    
                    <div class="container">
                        <div class="row">
                            <table class=" table-responsive mt-2 table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Product Price</th>
                                        <th scope="col">Product Quantity</th>
                                        <th scope="col">Product Image</th>
                                        <th scope="col">Product Code</th>              
                                        <th colspan="3"><a href="admincreateproduct.php" class="btn btn-primary btn-sm">Create Product</a></th>
                                    </tr>
                                </thead>                                                            
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM product";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        foreach ($result as $product) {
                                            ?>
                                            <tr>
                                                <td><?= $product['id']; ?></td>
                                                <td><?= $product['product_name']; ?></td>
                                                <td><?= $product['product_price']; ?></td>
                                                <td><?= $product['product_qty']; ?></td>  
                                                <td><img src="<?= $product['product_image']; ?>" width="100" height="50"></td>  
                                                <td><?= $product['product_code']; ?></td> 
                                                <td></td>                                                                                                                                                   
                                                <td>
                                                    <a href="admineditproduct.php?id=<?= $product['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="action.php" method="POST" class="d-inline" onclick="return confirm('Are you sure want to delete this product?');">
                                                        <button type="submit" name="delete_product" value="<?= $product['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<h5> No Product Found </h5>";
                                    }
                                    ?>                     
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </body>
</html>
<!--<button type="button" class="btn btn-dark ml-4 ">Buy</button>
                    <button type="button" class="btn btn-dark ">Add to cart</button>