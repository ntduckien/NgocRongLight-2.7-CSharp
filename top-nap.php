<?php
$_alert = null;
$_title = "NRO Light - TOP NAP";
// include_once 'head.php';
include 'connect.php';
include_once 'set.php';
?>
<!DOCTYPE html>
<html lang=vi>
<meta http-equiv=content-type content="text/html;charset=UTF-8" />

<head>
   <meta charset=utf-8>
   <meta http-equiv=X-UA-Compatible content="IE=edge">
   <meta name=viewport
      content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no, shrink-to-fit=no">
   <meta name=apple-mobile-web-app-capable content=yes>
   <meta name=csrf-token content=jg0aMEdvyglZMgqfTAyPbDwjsNPofmw8mMCwvwnW>
   <meta name=app.content_locale content=vi>
   <meta name=app.env content=production>
   <meta name=app.lang content=vi>
   <meta name=robots content=index,follow />
   <meta name=revisit-after content="1 days">
   <title>Ngọc Rồng Light</title>
   <link href=assets/css/bootstrap.min.css rel=stylesheet>
   <link rel=stylesheet href=assets/css/all.min.css />
   <link rel=stylesheet href=assets/css/dataTables.bootstrap5.min.css>
   <script src=assets/js/jquery.min.js></script>
   <script src=assets/js/bootstrap.min.js></script>
   <script src=https://kit.fontawesome.com/c79383dd6c.js crossorigin=anonymous></script>
   <script src=http://cdn.jsdelivr.net/npm/sweetalert2@11></script>
   <script src=https://kit.fontawesome.com/c79383dd6c.js crossorigin=anonymous></script>
   <script src=https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js></script>
   <link rel=stylesheet href=https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css>
   <link rel=icon href=/img/nro.png type=image/png>
   <script src=assets/js/app.js type=text/javascript></script>
   <link rel=stylesheet href=./assets/css/app.css>
   <link rel=stylesheet href=./assets/css/dashboard.css>
   <link rel=stylesheet href=./assets/css/all.min.css>
   <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&amp;display=swap"
      rel=stylesheet>
   <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js></script>
   <script src=https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js></script>
   <script src=assets/js/main.js type=text/javascript></script>
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-FBRLPP0PX2"></script>
   <script src=https://code.jquery.com/jquery-3.6.0.min.js></script>
   <script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments) } gtag("js", new Date()); gtag("config", "G-FBRLPP0PX2");</script>
</head>
<script
   type=text/javascript>$(document).ready(function(){if($(window).width()<=500){$(".dashboard").addClass("menu-closed")}else{$(".dashboard").removeClass("menu-closed")}});</script>
<script type=text/javascript>$(document).ready(function(){$(".dropdown-toggle").dropdown()});</script>

<body class=dashboard>
   <header class="navbar navbar-expand-md navbar-light bg-white fixed-top">
      <div class=container-fluid>
         <a class=navbar-brand href=/index.php>
            <img src=img/nro.png alt="Quản Lý Tài Khoản  - Ngọc Rồng Light">
         </a>
         <button class="navbar-toggler left-menu-btn-control" type=button data-toggle=collapse data-target=#left-menu
            aria-controls=left-menu aria-expanded=false aria-label="Left menu navigation">
            <span class=navbar-toggler-icon></span>
         </button>
         <div class="collapse navbar-collapse" id=navbarSupportedContent>
            <ul class="navbar-nav mr-auto"> </ul>
            <ul class="navbar-nav ml-auto align-items-center">
               <li class="nav-item dropdown user-action-header ms-3">
                  <?php if ($_login == null) { ?>
                     <a class=nav-link href=/login.php>
                        Đăng nhập
                        <i class="fas fa-sign-in-alt" style=font-weight:bold;color:#343a40;margin-right:5px></i>
                     </a>
                  <?php } else { ?>
                  <li class=nav-item>
                     <i class="fas fa-coin" style=font-weight:bold;color:#343a40;margin-right:5px></i>
                     <span style=color:#343a40>
                        <?php echo number_format($_coin); ?> VND
                     </span>
                  </li>
                  <div class=dropdown>
                     <a id="navbarDropdown dropdown-toggle" class="nav-link dropdown-toggle" href=# role=button
                        data-toggle=dropdown aria-haspopup=true aria-expanded=false>
                        <i class="fas fa-user me-2" style=font-weight></i>
                        <?php echo $_username; ?>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby=navbarDropdown>
                        <a class=dropdown-item href=profile.php>Trang Cá Nhân</a>
                        <a class=dropdown-item href=security.php>Bảo Mật</a>
                        <a class=dropdown-item href=nap-tien.php>Nạp Tiền</a>
                        <a class=dropdown-item href=history.php>Lịch Sử Giao Dịch</a>
                        <a class=dropdown-item href=/?out>Đăng xuất</a>
                     </div>
                  </div>
               <?php } ?>
               </li>
            </ul>
         </div>
      </div>
   </header>
   <div class="container-fluid account-container">
      <nav class="left-menu menu-closed">
         <ul class="nav flex-column dashboard-menu-left">
            <li class=nav-item>
               <a class=nav-link href=/index.php>
                  <i class="fas fa-home"></i>&nbsp;Trang Chủ
               </a>
            </li>
            <li class=nav-item>
               <a class=nav-link href=/profile.php>
                  <i class="fas fa-user me-2"></i>&nbsp;Thông tin tài khoản
               </a>
            </li>
            <li class=nav-item>
               <a class=nav-link href=security.php>
                  <i class="fas fa-lock"></i>&nbsp;Bảo mật
               </a>
            </li>
            <li class=nav-item>
               <a class=nav-link href=nap-tien.php>
                  <i class="fas fa-wallet"></i>&nbsp;Nạp Tiền
               </a>
            </li>
            <li class=nav-item>
               <a class=nav-link href=history.php>
                  <i class="fas fa-history"></i>&nbsp;Lịch sử giao dịch
               </a>
            </li>
            <li class=nav-item>
               <a class=nav-link href=top-nap.php>
                  <i class="fa fa-donate"></i>&nbsp;Top Nạp Thẻ
               </a>
            </li>
            <li class=nav-item>
               <a class=nav-link href=top-suc-manh.php>
                  <i class="fa fa-trophy"></i>&nbsp;Top Sức Mạnh
               </a>
            </li>
            <li class=nav-item>
               <a class=nav-link href=/?out>
                  <i class="fas fa-sign-out-alt"></i>&nbsp;Đăng xuất
               </a>
            </li>
         </ul>
      </nav>
   </div>
   <script
      type=text/javascript>$(document).ready(function(){$(".left-menu-btn-control").click(function(){$("#left-menu").toggleClass("menu-closed")})});</script>
   <style>
      .center {
         margin-left: 150px;
         margin-right: auto
      }
   </style>
   <link rel=stylesheet href=file/style.css>
   <section class="text-center container">
      <br><br><br>
      <h2 class=fw-light>TOP NẠP THẺ</h2>
   </section>
   <main class="c-layout-page custom-slide mt-header">
      <div class="container py-3">
         <div class=row>
            <div class="col-md-9 pb-3 pt-2">
               <div class=card-body>
                  <table class="table table-bordered blueTable my-table center">
                     <thead>
                        <tr>
                           <th>STT</th>
                           <th>Tên Game</th>
                           <th>Tổng Nạp</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        include 'connect.php';

                        $query = "SELECT username, SUM(tongnap) AS tongnap FROM `user` GROUP BY username ORDER BY tongnap DESC LIMIT 10";
                        $result = $conn->query($query);
                        $stt = 1;
                        if (!$result) {
                           echo 'Lỗi truy vấn SQL: ' . mysqli_error($conn);
                        } elseif ($result->num_rows > 0) {
                           while ($row = $result->fetch_assoc()) {
                              echo '
                           <tr>
                           <td>' . $stt . '</td>
                           <td>' . $row['username'] . '</td>
                           <td>' . number_format($row['tongnap']) . 'đ</td>
                           </tr>
                           ';
                              $stt++;
                           }
                        } else {
                           echo '
                           <tr>
                           <td colspan="3" align="center"><span style="font-size:100%;"><< Lịch Sử Trống >></span></td>
                           </tr>
                           ';
                        }

                        // Đóng kết nối
                        $conn->close();
                        ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <?php
      include_once('end.php');
      ?>
</body>