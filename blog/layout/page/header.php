<?php 
	$sqltype = "SELECT * FROM typeblog";
	$result = mysqli_query($conn,$sqltype) or die("Lỗi select");
 ?>

<header>			
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding" style="margin-top: 8px;">
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="#"><i class="fa fa-behance"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">
					<ul>
						<li><a href="tel:+440 012 3654 896"><span class="lnr lnr-phone-handset"></span><span>0904512997</span></a></li>
						<li><a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span><span>Ghtk@.com</span></a></li>
						<?php
						 if (!isset($_SESSION['user'])) {
						?>
							<li><a href="login.php"><i class="fas fa-sign-in-alt"></i>Login</a></li>
						<?php }
						?>
						<?php
						 if (isset($_SESSION['user'])) {
						 	$idus=$_SESSION['user'];
						 	$slus="SELECT * FROM user WHERE id=$idus";
							$getuser=mysqli_query($conn,$slus)or die("loi cau lenh ".$slbl);
							$user = mysqli_fetch_assoc($getuser);
						?>
							<li class="nav-item dropdown no-arrow">
						        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          <img style="width: 20px;" src="asset/page/upload/<?=$user['avartar']?>" alt="">   <?=$user['username']?>
						        </a>
						        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
						          <a style="color: #04091e;" class="dropdown-item" href="#">Settings</a>
						          <a style="color: #04091e;" class="dropdown-item" href="#">Activity Log</a>
						          <div class="dropdown-divider"></div>
						          <a style="color: #04091e;" class="dropdown-item" href="admin.php?module=Logout">Logout</a>
						        </div>
						      </li>
						<?php }
						 ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="logo-wrap">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
					<a href="index.php">
						<img class="img-fluid" src="asset/page/img/logo.png" alt="">
					</a>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
					<img class="img-fluid" src="asset/page/upload/banner.jpg" alt="">
				</div>
			</div>
		</div>
	</div>
	<div class="container main-menu" id="main-menu">
		<div class="row align-items-center justify-content-between">
			<nav id="nav-menu-container">
				<ul class="nav-menu">
					<li class="menu-active"><a href="index.php">Home</a></li>
					<li><a href="index.php?module=archive">Archive</a></li>
					<li><a href="index.php?module=Category">Category</a></li>
					<li class="menu-has-children"><a href="">Post Types</a>
					<ul>
						<?php
			                while ($row = mysqli_fetch_assoc($result)) {
			            ?>
			                <li class="menu-active"><a href="index.php?module=typeblog&id=<?=$row['id']?>"><?=$row['nametypeblog']?></a></li>
			            <?php
			            };
			            ?>
					</ul>
				</li>
				<li><a href="index.php?module=About">About</a></li>
				<li><a href="index.php?module=Contact">Contact</a></li>
			</ul>
			</nav><!-- #nav-menu-container -->
			<div class="navbar-right">
				<form class="Search" action="index.php?module=Search" method="GET">
					<input type="text" class="form-control Search-box" name="Search-box" id="Search-box" placeholder="Search">
					<label for="Search-box" class="Search-box-label">
						<span class="lnr lnr-magnifier"></span>
					</label>
					<span class="Search-close">
						<span class="lnr lnr-cross"></span>
					</span>
				</form>
			</div>
		</div>
	</div>
</header>