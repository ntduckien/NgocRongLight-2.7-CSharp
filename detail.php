<?php
require_once('connect.php');
include_once('head.php');
include_once('set.php');

// Kết nối tới cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'test');

// Kiểm tra kết nối
if (!$conn) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}

// Lấy ID của bài viết từ tham số trên URL
$id = $_GET['id'];

// Thực hiện truy vấn để lấy thông tin chi tiết của bài viết
$sql = "SELECT * FROM posts WHERE id='" . $id . "'";
$result = mysqli_query($conn, $sql);

// Kiểm tra kết quả truy vấn
if (mysqli_num_rows($result) == 1) {
    // Lấy thông tin của bài viết
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];
    $content = $row['content'];
    $author = $row['author'];
    $created_at = $row['created_at'];

    // Hiển thị thông tin chi tiết của bài viết
    echo "<div class='container'>";
    echo "<h1>" . $title . "</h1>";
    echo "<p>" . $content . "</p>";
    echo "<small>Đăng bởi: " . $author . ", Đăng vào lúc " . $created_at . "</small>";

    // Hiển thị các bình luận của bài viết
    // CODE HIỂN THỊ CÁC BÌNH LUẬN CỦA BÀI VIẾT Ở ĐÂY
    echo "</div>";

} else {
    echo "<p>Không tìm thấy bài viết.</p>";
}

// Đóng kết nối
mysqli_close($conn);
?>