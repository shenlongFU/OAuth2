<?php
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		session_start();
		require_once('../../codeapp/validate.php');
		include("../../codeapp/connect.php");
		if(isset($_POST['editblog'])){
			$title=$_POST['titleblog'];
			$type=$_POST['typeblog'];
			$content=$_POST['contentblog'];
			if ($_POST['avatarblog']=='') {
				$avatar=$_SESSION['avatar'];
			}else{
				$avatar=$_POST['avatarblog'];	
			}
			$dis=$_POST['describe'];
			$iduser=$_SESSION['user'];
			$view=0;
			$time=date('Y-m-d', time());
			$validate=new Validate();
			$validation=$validate->check($_POST,array(
				'titleblog'=>array(
					'required'=>true
				),
				'contentblog'=>array(
					'required'=>true
				),
				'describe'=>array(
					'required'=>true
				)
			));
			if ($validate->passed())
			{
				$sqlud="UPDATE blog set dis='$dis',title='$title',id_user='$iduser',id_type_blog='$type',content='$content',avatar='$avatar' WHERE id='$id'";
				//var_dump($sqlud);
				mysqli_query($conn,$sqlud)or die("loi cau lenh ".$sqlud);
				$_SESSION['success']='Bạn đã sửa blog thành công';
				unset($_SESSION['error']);
				//echo "$sqlud";
				header("Location: http://testlocal.com/blog/admin.php?module=listBlog");	

			}
			else
			{
				$_SESSION['error']=$validate->errors();
				unset($_SESSION['success']);
				header("Location: http://testlocal.com/blog/admin.php?module=editBlog&id=$id");	

			}
		}
	}

	
 ?>
