<?php
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	require_once('../../codeapp/validate.php');
	include("../../codeapp/connect.php");
	if(isset($_POST['addblog'])){
		$title=$_POST['titleblog'];
		$type=$_POST['typeblog'];
		$content=$_POST['contentblog'];
		$avatar=$_POST['avatarblog'];
		$dis=$_POST['describe'];
		$iduser=$_SESSION['user'];
		$view=0;
		$time=date('Y/m/d - H:i:s', time());
		$validate=new Validate();
		$validation=$validate->check($_POST,array(
			'titleblog'=>array(
				'required'=>true
			),
			'contentblog'=>array(
				'required'=>true
			),
			'avatarblog'=>array(
				'required'=>true
			),
			'describe'=>array(
				'required'=>true
			)
		));
		if ($validate->passed())
		{
			$sqlinsert="INSERT INTO blog (title,avatar,content,nview,id_user,id_type_blog,dis,timecreate,num) VALUES('$title','$avatar','$content',$view,$iduser,$type,'$dis','$time',0)";
			mysqli_query($conn,$sqlinsert)or die("loi cau lenh ".$sqlinsert);
			$_SESSION['success']='Bạn đã thêm blog thành công';
			unset($_SESSION['error']);
			header("Location: http://testlocal.com/blog/admin.php?module=listblog");
		}
		else
		{
			$_SESSION['error']=$validate->errors();
			unset($_SESSION['success']);
			header("Location: http://testlocal.com/blog/admin.php?module=addblog");

		}
			
	}
	
	
 ?>
