<?php 
	if(isset($_GET["id"])){
		$id=$_GET['id'];
	$sqlblog = "SELECT * FROM blog WHERE id=$id";
	$result2 = mysqli_query($conn,$sqlblog) or die("Lỗi select");
	$blog= mysqli_fetch_assoc($result2);		
	}	
?>
<a href="admin.php?module=listblog" class="btn btn-success"><- Back</a>
<br>
<div class="content_blog">
	<?=$blog['content']?>
</div>