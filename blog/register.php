<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Redister</title>

    <!-- Fontfaces CSS-->
    <link href="asset/login/css/font-face.css" rel="stylesheet" media="all">
    <link href="asset/login/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="asset/login/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="asset/login/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="asset/login/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="asset/login/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="asset/login/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="asset/login/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="asset/login/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="asset/login/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="asset/login/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="asset/login/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="asset/login/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">
                <div class="login-wrap" style="padding: 0px;">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img class="img-fluid" src="asset/page/img/logo.png" alt="">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="action/admin/register.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="mail" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Re Password</label>
                                    <input class="au-input au-input--full" type="password" name="repassword" placeholder="Re Password">
                                </div>
                                <div class="form-group">
                                    <label for="title">Avatar</label>
                                    <input type="file" name='avatar'>
                                </div>
                                
                                <?php 
                                    if (isset($_SESSION['error'])){
                                        foreach ($_SESSION['error'] as  $error){
                                 ?>
                                    <h4 style="color: red;"><?=$error?></h4>
                                 <?php
                                        }
                                    }
                                    unset($_SESSION['error']);
                                 ?>
                                  <br>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="register">sign in</button>
                            </form>
                            <br>
                            <a style="text-align: center;" class="au-btn au-btn--block au-btn--blue m-b-20" href="login.php">Quay về Trang Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="asset/login/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="asset/login/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="asset/login/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="asset/login/vendor/slick/slick.min.js">
    </script>
    <script src="asset/login/vendor/wow/wow.min.js"></script>
    <script src="asset/login/vendor/animsition/animsition.min.js"></script>
    <script src="asset/login/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="asset/login/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="asset/login/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="asset/login/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="asset/login/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="asset/login/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="asset/login/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="asset/login/js/main.js"></script>

</body>

</html>
<!-- end document-->