<?php 
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		if(!isset($_COOKIE[md5($id)])) {
			$slbl="SELECT * FROM blog WHERE id=$id";
			$slbls=mysqli_query($conn,$slbl)or die("loi cau lenh ".$slbl);
			$nviewbl = mysqli_fetch_assoc($slbls);
			$nview=$nviewbl['nview']+1;
            $sqlud="UPDATE blog set nview='$nview' WHERE id='$id'";
			mysqli_query($conn,$sqlud)or die("loi cau lenh ".$sqlud);
            setcookie(md5($id),md5($id), time() + 600, "/");
        }
		$sqlsl = "SELECT blog.`id`,blog.`nview`,blog.`avatar`,blog.`content`,blog.`dis`,user.`username`,typeblog.`nametypeblog`,blog.`timecreate`,blog.`title`,blog.`num` FROM blog,typeblog,user where blog.id_type_blog=typeblog.id AND blog.id_user=user.id  AND blog.id=$id";
		$getblog = mysqli_query($conn,$sqlsl) or die("Lỗi select");
		$blog = mysqli_fetch_assoc($getblog);
		/**
		 * pick
		 */
		$sqlpick = "SELECT blog.`id`,blog.`nview`,blog.`avatar`,blog.`content`,blog.`dis`,user.`username`,typeblog.`nametypeblog`,blog.`timecreate`,blog.`title`,blog.`num` FROM blog,typeblog,user where blog.id_type_blog=typeblog.id AND blog.id_user=user.id  AND blog.pick=1 ORDER BY timecreate DESC limit 1";
		$pick = mysqli_query($conn,$sqlpick) or die("Lỗi select");
		$pickblog = mysqli_fetch_assoc($pick);
		/**
		 * popular
		 */
		$sqlpo = "SELECT blog.`id`,blog.`nview`,blog.`avatar`,blog.`content`,blog.`dis`,user.`username`,typeblog.`nametypeblog`,blog.`timecreate`,blog.`title`,blog.`num` FROM blog,typeblog,user where blog.id_type_blog=typeblog.id AND blog.id_user=user.id   ORDER BY blog.nview DESC limit 5";
		$poblogs = mysqli_query($conn,$sqlpo) or die("Lỗi select");
		
	}
?>

<div class="site-main-container">
			<!-- Start top-post Area -->
			<!-- <section class="top-post-area pt-10">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12">
							<div class="hero-nav-area">
								<h1 class="text-white">Image Post</h1>
								<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="#">Post Types </a><span class="lnr lnr-arrow-right"></span><a href="image-post.html">Image Post </a></p>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="news-tracker-wrap">
								<h6><span>Breaking News:</span>   <a href="#">Astronomy Binoculars A Great Alternative</a></h6>
							</div>
						</div>
					</div>
				</div> -->
			</section>
			<!-- End top-post Area -->
			<!-- Start latest-post Area -->
			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-8 post-list">
							<!-- Start single-post Area -->
							<div class="single-post-wrap">
								<div class="feature-img-thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="asset/admin/images/<?=$blog['avatar']?>" alt="">
								</div>
								<div class="content-wrap">
									<ul class="tags mt-10">
										<li><a href="#"><?=$blog['nametypeblog']?></a></li>
									</ul>
									<a href="#">
										<h3><?=$blog['title']?></h3>
									</a>
									<ul class="meta pb-20">
										<li><a href="#"><span class="lnr lnr-user"></span><?=$blog['username']?></a></li>
										<li><a href="#"><span class="lnr lnr-calendar-full"></span><?=$blog['timecreate']?></a></li>
										<li><a href="#"><span class="lnr lnr-bubble"></span><?=$blog['num']?> Comment </a></li>
										<li><a href="#"><i class="far fa-eye"></i> <?=$blog['nview']?>   Views </a></li>
									</ul>
									<div class="content_bl">
										<?=$blog['content']?>
									</div>
								
								<div class="navigation-wrap justify-content-between d-flex">
									<a class="prev" href="#"><span class="lnr lnr-arrow-left"></span>Prev Post</a>
									<a class="next" href="#">Next Post<span class="lnr lnr-arrow-right"></span></a>
								</div>
								<?php if (isset($_SESSION['user'])) {
								?>
								<br>
								<br>
								<div class="single-comment justify-content-between d-flex">
									<div class="form-group">

										<label for="title">Write comment</label>
										<textarea name="comment" class="upcomment1 form-control" rows="3" cols="80"></textarea>
									</div>
								  	<div style="margin: 50px 0px 0px 20px;">
										<p name='btcomment' class="btcomment btn btn-primary">Comment</p>
									</div>
								</div>
								<?php } if (!isset($_SESSION['user'])) {
									# code...
								?>
								<a href="login.php" class="btcomment btn btn-primary" style="margin-top: 50px;">Login to comment</a>
								<?php } ?>
								<div class="comment">
									
								</div>
								
							</div>
						</div>
						<!-- End single-post Area -->
					</div>
					<div class="col-lg-4">
						<div class="sidebars-area">
							<div class="single-sidebar-widget editors-pick-widget">
								<h6 class="title">Editor’s Pick</h6>
								<div class="editors-pick-post">
									<div class="feature-img-wrap relative">
										<div class="feature-img relative">
											<div class="overlay overlay-bg"></div>
											<img class="img-fluid" src="asset/admin/images/<?=$pickblog['avatar']?>" alt="">
										</div>
										<ul class="tags">
											<li><a href="#"><?=$pickblog['nametypeblog']?></a></li>
										</ul>
									</div>
									<div class="details">
										<a href="index.php?module=blog&id=<?=$pickblog['id']?>">
											<h4 class="mt-20"><?=$pickblog['title']?></h4>
										</a>
										<ul class="meta">
											<li><a href="#"><span class="lnr lnr-user"></span><?=$pickblog['username']?></a></li>
											<li><a href="#"><span class="lnr lnr-calendar-full"></span><?=$pickblog['timecreate']?></a></li>
											<li><a href="#"><span class="lnr lnr-bubble"></span><?=$pickblog['num']?> </a></li>
										</ul>
										<p class="excert">
											<?=$pickblog['dis']?>
										</p>
									</div>
									
								</div>
							</div>
							
							<div class="single-sidebar-widget most-popular-widget">
								<h6 class="title">Most Popular</h6>
								<?php
					                while ($poblog = mysqli_fetch_assoc($poblogs)) {
					            ?>
								<div class="single-list flex-row d-flex">
									<div class="row">
										<div class="col-md-5">
											<div class="thumb">
												<img width="100%" src="asset/admin/images/<?=$poblog['avatar']?>" alt="">
											</div>
										</div>
										<div class="col-md-7">
											<div class="details">
												<a href="index.php?module=blog&id=<?=$poblog['id']?>">
													<h6><?=$poblog['title']?></h6>
												</a>
												<ul class="meta">
													<li><a href="#"><span class="lnr lnr-calendar-full"></span><?=$poblog['timecreate']?></a></li>
													<li><a href="#"><span class="lnr lnr-bubble"></span><?=$poblog['num']?></a></li>
													<li><i class="far fa-eye"></i> <?=$poblog['nview']?></li>

												</ul>
											</div>
										</div>
									</div>
									
									
								</div>
								<?php 
									}
								 ?>
							</div>
							<div class="single-sidebar-widget social-network-widget">
								<div id="fb-root"></div>
								<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3&appId=2314394905493788&autoLogAppEvents=1"></script>
								<div class="fb-page" data-href="https://www.facebook.com/D%C3%A2n-Tr%C3%AD-767185309964149/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/D%C3%A2n-Tr%C3%AD-767185309964149/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/D%C3%A2n-Tr%C3%AD-767185309964149/">Dân Trí</a></blockquote></div>
								<h6 class="title">Social Networks</h6>
								<ul class="social-list">
									<li class="d-flex justify-content-between align-items-center fb">
										<div class="icons d-flex flex-row align-items-center">
											<i class="fa fa-facebook" aria-hidden="true"></i>
											<p>983 Likes</p>
										</div>
										<a href="#">Like our page</a>
									</li>
									<li class="d-flex justify-content-between align-items-center tw">
										<div class="icons d-flex flex-row align-items-center">
											<i class="fa fa-twitter" aria-hidden="true"></i>
											<p>983 Followers</p>
										</div>
										<a href="#">Follow Us</a>
									</li>
									<li class="d-flex justify-content-between align-items-center yt">
										<div class="icons d-flex flex-row align-items-center">
											<i class="fa fa-youtube-play" aria-hidden="true"></i>
											<p>983 Subscriber</p>
										</div>
										<a href="#">Subscribe</a>
									</li>
									<li class="d-flex justify-content-between align-items-center rs">
										<div class="icons d-flex flex-row align-items-center">
											<i class="fa fa-rss" aria-hidden="true"></i>
											<p>983 Subscribe</p>
										</div>
										<a href="#">Subscribe</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>