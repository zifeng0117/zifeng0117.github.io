<?php

session_start();
require 'database.php';

// Add products into the cart table
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pcode = $_POST['pcode'];
    $pqty = $_POST['pqty'];
    $total_price = $pprice * $pqty;

    $stmt = $conn->prepare('SELECT product_code FROM cart WHERE product_code=?');
    $stmt->bind_param('s', $pcode);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    $code = $r['product_code'] ?? '';

    if (!$code) {
        $sql = $conn->prepare('INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code) VALUES (?,?,?,?,?,?)');
        $sql->bind_param('ssssss', $pname, $pprice, $pimage, $pqty, $total_price, $pcode);
        $sql->execute();

        echo '<div class="alert alert-success alert-dismissible mt-2">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Item added to your cart!</strong>
                        </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible mt-2">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Item already added to your cart!</strong>
                        </div>';
    }
}

// Get no.of items available in the cart table
if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
    $stmt = $conn->prepare('SELECT * FROM cart');
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;

    echo $rows;
}

// Remove single items from cart
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];

    $stmt = $conn->prepare('DELETE FROM cart WHERE id=?');
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Item removed from the cart!';
    header('location:cart.php');
}

// Remove all items at once from cart
if (isset($_GET['clear'])) {
    $stmt = $conn->prepare('DELETE FROM cart');
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'All Item removed from the cart!';
    header('location:cart.php');
}

// Set total price of the product in the cart table
if (isset($_POST['qty'])) {
    $qty = $_POST['qty'];
    $pid = $_POST['pid'];
    $pprice = $_POST['pprice'];

    $tprice = $qty * $pprice;

    $stmt = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
    $stmt->bind_param('isi', $qty, $tprice, $pid);
    $stmt->execute();
}

// Checkout and save customer info in the orders table
if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $products = $_POST['products'];
    $grand_total = $_POST['grand_total'];
    $address = $_POST['address'];
    $payment = $_POST['payment'];
    $status = $_POST['status'];

    $data = '';

    $stmt = $conn->prepare('INSERT INTO orders (name,email,phone,address,payment,products,amount_paid,status)VALUES(?,?,?,?,?,?,?,?)');
    $stmt->bind_param('ssssssss', $username, $email, $phone, $address, $payment, $products, $grand_total, $status);
    $stmt->execute();
    $stmt2 = $conn->prepare('DELETE FROM cart');
    $stmt2->execute();
    $data .= '<div class="text-center">
                                <h1>Thank You for Your Ordering</h1>

                                <h4 >Items Purchased : ' . $products . '</h4>
                                <h4>Your Name : ' . $username . '</h4>
                                <h4>Your E-mail : ' . $email . '</h4>
                                <h4>Your Phone : ' . $phone . '</h4>
                                <h4>Total Amount Payable : RM ' . number_format($grand_total, 2) . '</h4>
                                <h4>Payment Mode : ' . $payment . '</h4>                                                                        
                          </div>';
    echo $data;
}

//update and delete account function
if (isset($_POST['delete_user'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['delete_user']);

    $sql = "DELETE FROM user WHERE id='$user_id' ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Account Deleted Successfully";
        header("Location: adminaccount.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Account Not Deleted";
        header("Location: adminaccount.php");
        exit(0);
    }
}

if (isset($_POST['update_user'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $sql = "UPDATE user SET email='$email', username='$username', password='$password', phone='$phone' WHERE id='$user_id' ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Account Updated Successfully";
        header("Location: adminaccount.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Account Not Updated";
        header("Location: adminaccount.php");
        exit(0);
    }
}

//admin delete order function
if (isset($_POST['delete_order'])) {
    $order_id = mysqli_real_escape_string($conn, $_POST['delete_order']);

    $sql = "DELETE FROM orders WHERE id='$order_id' ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Order Deleted Successfully";
        header("Location: adminorder.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Order Not Deleted";
        header("Location: adminorder.php");
        exit(0);
    }
}

//admin update order function
if (isset($_POST['update_order'])) {
    $orders_id = mysqli_real_escape_string($conn, $_POST['orders_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $products = mysqli_real_escape_string($conn, $_POST['products']);
    $amount_paid = mysqli_real_escape_string($conn, $_POST['amount_paid']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $sql = "UPDATE orders SET name='$name', email='$email', phone='$phone', address='$address', products='$products', amount_paid='$amount_paid', status='$status' WHERE id='$orders_id' ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Order Updated Successfully";
        header("Location: adminorder.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Order Not Updated";
        header("Location: adminorder.php");
        exit(0);
    }
}

//admin delete product function
if (isset($_POST['delete_product'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['delete_product']);

    $sql = "DELETE FROM product WHERE id='$product_id' ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Product Deleted Successfully";
        header("Location: adminedit.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Product Not Deleted";
        header("Location: adminedit.php");
        exit(0);
    }
}

//admin update product function
if (isset($_POST['update_product'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['id']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
    $product_qty = mysqli_real_escape_string($conn, $_POST['product_qty']);
    $product_code = mysqli_real_escape_string($conn, $_POST['product_code']);

    // Upload image file and get path
    $image_name = $_FILES['product_image']['name'];
    $image_tmp_name = $_FILES['product_image']['tmp_name'];
    $image_path = "images/" . $image_name;
    move_uploaded_file($image_tmp_name, $image_path);

    $product_image = mysqli_real_escape_string($conn, $image_path);

    $sql = "UPDATE product SET id='$product_id', product_name='$product_name', product_price='$product_price', product_qty='$product_qty', product_image='$product_image', product_code='$product_code' WHERE id='$product_id' ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Product Updated Successfully";
        header("Location: adminedit.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Product Not Updated";
        header("Location: adminedit.php");
        exit(0);
    }
}

if (isset($_POST['create_product'])) {
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
    $product_qty = mysqli_real_escape_string($conn, $_POST['product_qty']);
    $filename = $_FILES['product_image']['name'];
    $filetmpname = $_FILES['product_image']['tmp_name'];
    $folder = '';
    move_uploaded_file($filetmpname, $folder . $filename);
    $product_code = mysqli_real_escape_string($conn, $_POST['product_code']);

    $query = "INSERT INTO product (product_name,product_price,product_qty,product_image,product_code) VALUES ('$product_name','$product_price','$product_qty','$filename','$product_code')";

    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['message'] = "Product Created Successfully";
        header("Location: adminedit.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Product Not Created";
        header("Location: adminedit.php");
        exit(0);
    }
}

//validation for manage account (user)
if (isset($_POST['manage_profile'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $currentuser = $_SESSION['id'];
    // Check if the data already exists in the database
    $sql = "SELECT * FROM user WHERE username = '$username' AND email = '$email' AND password = '$password' AND phone = '$phone' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // If the data already exists, display an error message and stop the update operation
        echo "<script> alert('Data already exists. Please Try Again.'); window.location = 'manageacc.php'</script>";
    } else {
        $sql = "UPDATE user SET username = '$username', email ='$email', password='$password', phone='$phone'where id='$currentuser' ";

        $result = mysqli_query($conn, $sql);
        echo "<script> alert('Update Successfully.'); window.location = 'login.php'</script>";
    }
}
?>
