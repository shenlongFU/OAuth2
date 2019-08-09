<?php 
	session_start();
	require_once('../../codeapp/validate.php');
	include("../../codeapp/connect.php");
	if(isset($_POST['login'])){
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$sqlus = "SELECT * FROM user WHERE mail='$email' AND password='$password'";
		$result = mysqli_query($conn,$sqlus) or die("Lỗi select $sqlus");
		if ($result->num_rows==0) {
			$_SESSION['errorlg']='Sai username hoặc password';
			header("Location: http://testlocal.com/blog/login.php");	
		}else{
			$user = mysqli_fetch_assoc($result);
			$_SESSION['user']=$user['id'];
			if ($user['role']==1) {
				header("Location: http://testlocal.com/blog/admin.php");	
			}else{
				header("Location: http://testlocal.com/blog/index.php");	
			}
		}		
	}
 ?>	
