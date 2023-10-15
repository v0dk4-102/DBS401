<?php
require 'connection.php';
session_start();

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    $item_id = $_GET['id'];

    $check_query = "SELECT id FROM items WHERE id = $item_id";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) == 1) {
        $add_to_cart_query = "INSERT INTO users_items (user_id, item_id, status) VALUES (?, ?, 'Added to cart')";
        $stmt = mysqli_prepare($con, $add_to_cart_query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ii", $user_id, $item_id);
            mysqli_stmt_execute($stmt);
            header('location: products.php');
        } else {
            echo "Lỗi trong việc chuẩn bị truy vấn: " . mysqli_error($con);
        }
    } else {
        echo "Sản phẩm không tồn tại.";
    }
} else {
    echo "Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.";
}
?>
