<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$conn = mysqli_connect("localhost", "root", "", "banuk");
if (!$conn) {
    die("Something went wrong;");
}
?>
<?php
if (isset($_SESSION['message'])) :
    ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']; ?>

    </div>

    <?php
    unset($_SESSION['message']);
endif;
?>
