<?php 
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$limit=4;
		$sql = "SELECT blog.`id`,blog.`nview`,blog.`avatar`,blog.`content`,blog.`dis`,user.`username`,typeblog.`nametypeblog`,blog.`timecreate`,blog.`title`,blog.`num` FROM blog,typeblog,user where blog.id_type_blog=typeblog.id AND blog.id_user=user.id AND blog.id_type_blog=$id  ORDER BY blog.timecreate DESC limit $limit";
		$getblog = mysqli_query($conn,$sql) or die("Lỗi select");
		$selectnum="SELECT * FROM blog WHERE id_type_blog=$id";
		$getnum=mysqli_query($conn,$selectnum);
		$numpage=$getnum->num_rows;
		$total_page = ceil($numpage / $limit);
	}
	/**
	 * popular
	 */
	$sqlpo = "SELECT blog.`id`,blog.`nview`,blog.`avatar`,blog.`content`,blog.`dis`,user.`username`,typeblog.`nametypeblog`,blog.`timecreate`,blog.`title`,blog.`num` FROM blog,typeblog,user where blog.id_type_blog=typeblog.id AND blog.id_user=user.id   ORDER BY blog.nview DESC limit 5";
	$poblogs = mysqli_query($conn,$sqlpo) or die("Lỗi select");
 ?>
 <section class="latest-post-area pb-120">
	<div class="container no-padding">
		<div class="row">
			<div class="col-lg-8 post-list">
				<!-- Start latest-post Area -->
				<div class=" latest-post-wrap">
					<div class="typelist">
					<h4 class="cat-title">List news</h4>
					<?php
		                while ($blog = mysqli_fetch_assoc($getblog)) {
		                	//var_dump($blog);
		            ?>
		                <div class="single-latest-post row align-items-center">
						<div class="col-lg-5 post-left">
							<div class="feature-img relative">
								<div class="overlay overlay-bg"></div>
								<img class="img-fluid" src="asset/admin/images/<?=$blog['avatar']?>" alt="">
							</div>
							<ul class="tags">
								<li><a href="#"><?=$blog['nametypeblog']?></a></li>
							</ul>
						</div>
						<div class="col-lg-7 post-right">
							<a href="index.php?module=blog&id=<?=$blog['id']?>">
								<h4><?=$blog['title']?></h4>
							</a>
							<ul class="meta">
								<li><a href="#"><span class="lnr lnr-user"></span><?=$blog['username']?></a></li>
								<li><a href="#"><span class="lnr lnr-calendar-full"></span><?=$blog['timecreate']?></a></li>
								<li><a href="#"><span class="lnr lnr-bubble"></span><?=$blog['num']?></a></li>
								<li><i class="far fa-eye"></i> <?=$blog['nview']?></li>
							</ul>
							<p class="excert">
								<?=$blog['dis']?>
							</p>
						</div>
					</div>
		            <?php
		            };
		            ?>
		         </div>
			         <br>
		            <br>
		            <ul class="pagination" style="margin-left: 234px;">
					  <li class="page-item"><a class="page-link " href="javascript:void(0)">Previous</a></li>
					  <?php 
					  	for($i=1;$i<=$total_page;$i++){
					  ?>
					  <li class="page-item"><a <?php if($i==1)echo" style='background:#a5b8fb'" ?>  class="page-link pagecl" href="javascript:void(0)"><?=$i?></a></li>
					  <?php } ?>
					  <li class="page-item"><a  class="page-link " href="javascript:void(0)">Next</a></li>
					</ul>
				</div>
				
				
			</div>
			<div class="col-lg-4">
				<div class="sidebars-area">
					<div class="typeblog single-sidebar-widget most-popular-widget ">
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