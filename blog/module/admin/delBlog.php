<?php  
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$sqlDel = "DELETE FROM blog WHERE id=$id";
		$result = mysqli_query($conn,$sqlDel) or die("Lỗi truy vấn ".$sqlDel);
		header("location:admin.php?module=listBlog");
	}
?>