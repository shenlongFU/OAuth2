<?php 
	include("../../codeapp/connect.php");
	if(isset($_POST["key"])){
		$key = $_POST["key"];
		$numblog=4;
		$start=($_POST['numpage']-1)*$numblog;
		$sql = "SELECT blog.`id`,blog.`nview`,blog.`avatar`,blog.`content`,blog.`dis`,user.`username`,typeblog.`nametypeblog`,blog.`timecreate`,blog.`title`,blog.`num` FROM blog,typeblog,user where blog.id_type_blog=typeblog.id AND blog.id_user=user.id AND (LOWER (blog.title) LIKE '%$key%' OR LOWER (blog.content) LIKE '%$key%' OR LOWER (typeblog.nametypeblog) LIKE '%$key%')  ORDER BY blog.timecreate DESC limit $start,$numblog";
		$getblog = mysqli_query($conn,$sql) or die("Lỗi select $sql");

	}
	
 ?>
<h4 class="cat-title">List search</h4>
<?php
    while ($blog = mysqli_fetch_assoc($getblog)) {
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
