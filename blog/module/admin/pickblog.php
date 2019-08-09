<?php 
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$sql = "UPDATE blog set pick=0";
		mysqli_query($conn,$sql) or die("Lỗi update");
		$sqluppick = "UPDATE blog set pick=1 WHERE id=$id";
		mysqli_query($conn,$sqluppick) or die("Lỗi update");
	}
	header("Location: http://testlocal.com/blog/admin.php?module=listblog");

?>