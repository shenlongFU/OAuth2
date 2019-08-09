<?php 
	$limit=5;
	$sqlnew = "SELECT blog.`id`,blog.`nview`,blog.`avatar`,blog.`content`,blog.`dis`,user.`username`,typeblog.`nametypeblog`,blog.`timecreate`,blog.`title`,blog.`num` FROM blog,typeblog,user where blog.id_type_blog=typeblog.id AND blog.id_user=user.id  ORDER BY timecreate DESC limit $limit";
	$newblogs = mysqli_query($conn,$sqlnew) or die("Lỗi select");

	/**
	 * pick
	 */
	$sqlpick = "SELECT blog.`id_type_blog`,blog.`id`,blog.`nview`,blog.`avatar`,blog.`content`,blog.`dis`,user.`username`,typeblog.`nametypeblog`,blog.`timecreate`,blog.`title`,blog.`num` FROM blog,typeblog,user where blog.id_type_blog=typeblog.id AND blog.id_user=user.id  AND blog.pick=1 ORDER BY timecreate DESC limit 1";
	$pick = mysqli_query($conn,$sqlpick) or die("Lỗi select ");
	$pickblog = mysqli_fetch_assoc($pick);
	$idtopBlog=$pickblog['id'];
	$typetopBlog=$pickblog['id_type_blog'];

	$sqlpickrelate = "SELECT blog.`id`,blog.`nview`,blog.`avatar`,blog.`content`,blog.`dis`,user.`username`,typeblog.`nametypeblog`,blog.`timecreate`,blog.`title`,blog.`num` FROM blog,typeblog,user where blog.id_type_blog=typeblog.id AND blog.id_user=user.id  AND blog.id!=$idtopBlog AND blog.id_type_blog =$typetopBlog limit 2";
	$pickre = mysqli_query($conn,$sqlpickrelate) or die("Lỗi select");

	/**
	 * popular
	 */
	$sqlpo = "SELECT blog.`id`,blog.`nview`,blog.`avatar`,blog.`content`,blog.`dis`,user.`username`,typeblog.`nametypeblog`,blog.`timecreate`,blog.`title`,blog.`num` FROM blog,typeblog,user where blog.id_type_blog=typeblog.id AND blog.id_user=user.id   ORDER BY blog.nview DESC limit 5";
	$poblogs = mysqli_query($conn,$sqlpo) or die("Lỗi select");
	/**
	 * ran
	 */
	$sqlran = "SELECT blog.`id`,blog.`nview`,blog.`avatar`,blog.`content`,blog.`dis`,user.`username`,typeblog.`nametypeblog`,blog.`timecreate`,blog.`title`,blog.`num` FROM blog,typeblog,user where blog.id_type_blog=typeblog.id AND blog.id_user=user.id  ORDER BY RAND ( )  limit 5";
	$ranblogs = mysqli_query($conn,$sqlran) or die("Lỗi select");
	/**
	 * pagination
	 */
	
	$selectnum="SELECT * FROM blog";
	$getnum=mysqli_query($conn,$selectnum);
	$numpage=$getnum->num_rows;
	$total_page = ceil($numpage / $limit);
?>
<section class="top-post-area pt-10">
	<div class="container no-padding">
		<div class="row small-gutters">
			<div class="col-lg-8 top-post-left">
				<div class="feature-image-thumb relative">
					<div class="overlay overlay-bg"></div>
					<img style="height: 500px;" class="img-fluid" src="asset/admin/images/<?=$pickblog['avatar']?>" alt="">
				</div>
				<div class="top-post-details">
					<ul class="tags">
						<li><a href="#"><?=$pickblog['nametypeblog']?></a></li>
					</ul>
					<a href="index.php?module=blog&id=<?=$pickblog['id']?>">
						<h3><?=$pickblog['title']?></h3>
					</a>
					<ul class="meta">
						<li><a href="#"><span class="lnr lnr-user"></span><?=$pickblog['username']?></a></li>
						<li><a href="#"><span class="lnr lnr-calendar-full"></span><?=$pickblog['timecreate']?></a></li>
						<li><a href="#"><span class="lnr lnr-bubble"></span><?=$pickblog['num']?> Comments</a></li>
						<li><i class="far fa-eye"></i> <?=$pickblog['nview']?> Views</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4 top-post-right">
			<?php
                while ($pickrelate = mysqli_fetch_assoc($pickre)) {
            ?>
				<div class="single-top-post">
					<div class="feature-image-thumb relative">
						<div class="overlay overlay-bg"></div>
						<img class="img-fluid" src="asset/admin/images/<?=$pickrelate['avatar']?> " alt="">
					</div>
					<div class="top-post-details">
						<ul class="tags">
							<li><a href="#"><?=$pickrelate['nametypeblog']?></a></li>
						</ul>
						<a href="index.php?module=blog&id=<?=$pickrelate['id']?>">
							<h4><?=$pickrelate['title']?></h4>
						</a>
						<ul class="meta">
							<li><a href="#"><span class="lnr lnr-user"></span><?=$pickrelate['username']?></a></li>
							<li><a href="#"><span class="lnr lnr-calendar-full"></span><?=$pickrelate['timecreate']?></a></li>
							<li><a href="#"><span class="lnr lnr-bubble"></span><?=$pickrelate['num']?></a></li>
							<li><i class="far fa-eye"></i>  <?=$pickrelate['nview']?></li>
						</ul>
					</div>
				</div>
			<?php } ?>
			</div>
			<div class="col-lg-12">
				<div class="news-tracker-wrap">
					<h6><span>Breaking News:</span>   <a href="#">Astronomy Binoculars A Great Alternative</a></h6>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="latest-post-area pb-120">
	<div class="container no-padding">
		<div class="row">
			<div class="col-lg-8 post-list">
				<!-- Start latest-post Area -->
				<div class="latest-post-wrap">
					<div class="typelist">
					<h4 class="cat-title">Latest News</h4>
					<?php
		                while ($newblog = mysqli_fetch_assoc($newblogs)) {
		                	//var_dump($newblog);
		            ?>
		                <div class="single-latest-post row align-items-center">
						<div class="col-lg-5 post-left">
							<div class="feature-img relative">
								<div class="overlay overlay-bg"></div>
								<img class="img-fluid" src="asset/admin/images/<?=$newblog['avatar']?>" alt="">
							</div>
							<ul class="tags">
								<li><a href="#"><?=$newblog['nametypeblog']?></a></li>
							</ul>
						</div>
						<div class="col-lg-7 post-right">
							<a href="index.php?module=blog&id=<?=$newblog['id']?>">
								<h4><?=$newblog['title']?></h4>
							</a>
							<ul class="meta">
								<li><a href="#"><span class="lnr lnr-user"></span><?=$newblog['username']?></a></li>
								<li><a href="#"><span class="lnr lnr-calendar-full"></span><?=$newblog['timecreate']?></a></li>
								<li><a href="#"><span class="lnr lnr-bubble"></span><?=$newblog['num']?></a></li>
								<li><i class="far fa-eye"></i> <?=$newblog['nview']?></li>
							</ul>
							<p class="excert">
								<?=$newblog['dis']?>
							</p>
						</div>
					</div>
		            <?php
		            };
		            ?>
		            <br>
		        </div>
		            <ul class="pagination" style="margin-left: 224px;">
					  <li class="page-item"><a class="page-link " href="javascript:void(0)">Previous</a></li>
					  <?php 
					  	for($i=1;$i<=$total_page;$i++){
					  ?>
					  <li class="page-item"><a <?php if($i==1)echo" style='background:#a5b8fb'" ?>  class="page-link pagecl1" href="javascript:void(0)"><?=$i?></a></li>
					  <?php } ?>
					  <li class="page-item"><a  class="page-link " href="javascript:void(0)">Next</a></li>
					</ul>
				</div>
				<!-- End latest-post Area -->
				
				<!-- Start banner-ads Area -->
				<!-- <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
					<img class="img-fluid" src="asset/page/img/banner-ad.jpg" alt="">
				</div> -->
				<!-- End banner-ads Area -->
				<!-- Start popular-post Area -->
				<!-- <div class="popular-post-wrap">
					<h4 class="title">Popular Posts</h4>
					<div class="feature-post relative">
						<div class="feature-img relative">
							<div class="overlay overlay-bg"></div>
							<img class="img-fluid" src="asset/page/img/f1.jpg" alt="">
						</div>
						<div class="details">
							<ul class="tags">
								<li><a href="#">Food Habit</a></li>
							</ul>
							<a href="index.php?module=blog&id=">
								<h3>A Discount Toner Cartridge Is Better Than Ever.</h3>
							</a>
							<ul class="meta">
								<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
								<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
								<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
							</ul>
						</div>
					</div>
					<div class="row mt-20 medium-gutters">
						<div class="col-lg-6 single-popular-post">
							<div class="feature-img-wrap relative">
								<div class="feature-img relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="asset/page/img/f2.jpg" alt="">
								</div>
								<ul class="tags">
									<li><a href="#">Travel</a></li>
								</ul>
							</div>
							<div class="details">
								<a href="index.php?module=blog&id=">
									<h4>A Discount Toner Cartridge Is
									Better Than Ever.</h4>
								</a>
								<ul class="meta">
									<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
									<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
									<li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>
								</ul>
								<p class="excert">
									Lorem ipsum dolor sit amet, consecteturadip isicing elit, sed do eiusmod tempor incididunt ed do eius.
								</p>
							</div>
						</div>
						<div class="col-lg-6 single-popular-post">
							<div class="feature-img-wrap relative">
								<div class="feature-img relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="asset/page/img/f3.jpg" alt="">
								</div>
								<ul class="tags">
									<li><a href="#">Travel</a></li>
								</ul>
							</div>
							<div class="details">
								<a href="index.php?module=blog&id=">
									<h4>A Discount Toner Cartridge Is
									Better Than Ever.</h4>
								</a>
								<ul class="meta">
									<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
									<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
									<li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>
								</ul>
								<p class="excert">
									Lorem ipsum dolor sit amet, consecteturadip isicing elit, sed do eiusmod tempor incididunt ed do eius.
								</p>
							</div>
						</div>
					</div>
				</div> -->
				<!-- End popular-post Area -->
				<!-- Start relavent-story-post Area -->
				<div class="relavent-story-post-wrap mt-30">
					<h4 class="title">Random news</h4>
					<div class="relavent-story-list-wrap">
						<?php
			                while ($rablog = mysqli_fetch_assoc($ranblogs)) {
			            ?>
						<div class="single-relavent-post row align-items-center">
							<div class="col-lg-5 post-left">
								<div class="feature-img relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="asset/admin/images/<?=$rablog['avatar']?>" alt="">
								</div>
								<ul class="tags">
									<li><a href="#"><?=$rablog['nametypeblog']?></a></li>
								</ul>
							</div>
							<div class="col-lg-7 post-right">
								<a href="index.php?module=blog&id=<?=$rablog['id']?>">
									<h4><?=$rablog['title']?></h4>
								</a>
								<ul class="meta">
									<li><a href="#"><span class="lnr lnr-user"></span><?=$rablog['username']?></a></li>
									<li><a href="#"><span class="lnr lnr-calendar-full"></span><?=$rablog['timecreate']?></a></li>
									<li><a href="#"><span class="lnr lnr-bubble"></span><?=$rablog['num']?></a></li>
									<li><i class="far fa-eye"></i> <?=$rablog['nview']?></li>
								</ul>
								<p class="excert">
									<?=$rablog['dis']?>
								</p>
							</div>
						</div>
						<?php
						 } 
						?>
					</div>
				</div>
				<!-- End relavent-story-post Area -->
			</div>
			<div class="col-lg-4">
				<div class="sidebars-area">
<!-- 					<div class="single-sidebar-widget ads-widget">
						<img class="img-fluid" src="asset/page/img/sidebar-ads.jpg" alt="">
					</div> -->
					<!-- <div class="single-sidebar-widget newsletter-widget">
						<h6 class="title">Newsletter</h6>
						<p>
							Here, I focus on a range of items
							andfeatures that we use in life without
							giving them a second thought.
						</p>
						<div class="form-group d-flex flex-row">
							<div class="col-autos">
								<div class="input-group">
									<input class="form-control" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" type="text">
								</div>
							</div>
							<a href="#" class="bbtns">Subcribe</a>
						</div>
						<p>
							You can unsubscribe us at any time
						</p>
					</div> -->
					<div class="single-sidebar-widget most-popular-widget ">
						<h6 class="title">Most Popular</h6>
						<?php
			                while ($poblog = mysqli_fetch_assoc($poblogs)) {
			            ?>
						<div class="single-list flex-row d-flex">
							<div class="row ">
								<div class="col-md-5 ">
									<div class="thumb">
										<img width="100%" src="asset/admin/images/<?=$poblog['avatar']?>" alt="">
									</div>
								</div>
								<div class="col-md-7 ">
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