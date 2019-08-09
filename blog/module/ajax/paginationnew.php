<?php 
	include("../../codeapp/connect.php");
	$numblog=5;
	$start=($_POST['numpage']-1)*$numblog;
	$sqlnew = "SELECT blog.`id`,blog.`nview`,blog.`avatar`,blog.`content`,blog.`dis`,user.`username`,typeblog.`nametypeblog`,blog.`timecreate`,blog.`title`,blog.`num` FROM blog,typeblog,user where blog.id_type_blog=typeblog.id AND blog.id_user=user.id  ORDER BY timecreate DESC limit $start,$numblog";
	$newblogs = mysqli_query($conn,$sqlnew) or die("Lỗi select $sqlnew");

 ?>
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