<?php
require 'connection.php';
session_start();

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    $item_id = $_GET['id'];

    // Sử dụng prepared statement để xóa sản phẩm khỏi giỏ hàng
    $delete_query = "DELETE FROM users_items WHERE user_id = ? AND item_id = ?";
    $stmt = mysqli_prepare($con, $delete_query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ii", $user_id, $item_id);
        mysqli_stmt_execute($stmt);
        header('location: cart.php');
    } else {
        echo "Lỗi trong việc chuẩn bị truy vấn: " . mysqli_error($con);
    }
} else {
    echo "Vui lòng đăng nhập để xóa sản phẩm khỏi giỏ hàng.";
}
?>
