<?php
include_once 'cauhinh.php';
require_once 'apipass2.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Kiểm tra và khởi động phiên làm việc nếu chưa được khởi động
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$_login = isset($_login) ? $_login : null;
$_user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

if ($_user !== null) {
	$_login = "on";
	$user_arr = _fetch("SELECT * FROM user WHERE username='$_user'");

	if (count($user_arr) <= 0) {
		header("Location: /?out");
		exit();
	}

	$_username = htmlspecialchars($user_arr['username']);
	$_password = htmlspecialchars($user_arr['password']);
	$_coin = $user_arr['vnd'];
	$_tcoin = htmlspecialchars($user_arr['tongnap']);

	// Gọi hàm has_mkc2 để kiểm tra xem người dùng đã đặt mật khẩu cấp 2 hay chưa
	$has_mkc2 = has_mkc2($_user);
} else {
	$_login = null;
}

if (isset($_GET['out'])) {
	session_destroy();
	header("Location: /");
	exit();
}
?>