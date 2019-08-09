<?php
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	require_once('../../codeapp/validate.php');
	include("../../codeapp/connect.php");
	if(isset($_POST['register'])){
		$mail=$_POST['mail'];
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$repassword=md5($_POST['repassword']);
		$avatar=$_FILES["avatar"]["name"];
		$validate=new Validate();
		$validation=$validate->check($_POST,array(
			'mail'=>array(
				'required'=>true,
				'unique'=>true
			),
			'username'=>array(
				'required'=>true,
				'min'=>5
			),
			'password'=>array(
				'required'=>true,
				'min'=>5
			),
			'repassword'=>array(
				'required'=>true,
				'matches'=>'password'
			),
			'avatar'=>array(
				'image'=>true
			)
		));
		if ($validate->passed())
		{
			$sqlinsert="INSERT INTO user (mail,username,`password`,avartar,role) VALUES('$mail','$username','$password','$avatar',0)";
			mysqli_query($conn,$sqlinsert)or die("loi cau lenh ".$sqlinsert);
			$_SESSION['success']='Bạn đã thêm đăng ký tài khoản thành công mời bạn đăng nhập';
			unset($_SESSION['error']);
			header("Location: http://testlocal.com/blog/login.php");
		}
		else
		{
			$_SESSION['error']=$validate->errors();
			unset($_SESSION['success']);
			header("Location: http://testlocal.com/blog/register.php");

		}
			
	}
	
	
 ?>
