<?php
/**
 * validate
 */
class Validate 
{
	private $_passed=false,
			$_errors=array(),
			$_db=null;
	/**
	 * set connect database
	 */
	function __construct()
	{
		$servername="172.28.128.4";
		$username ="root";
		$password ="";
		$dbname="blog";
		$conn = mysqli_connect($servername, $username, $password, $dbname) or die("loi");
		mysqli_set_charset($conn,"utf8");
		$this->_db=$conn;	
	}

	/**
	 * check validate of $_post
	 */
	public function check($source,$items=array())
	{
		foreach ($items as $item => $rules) 
		{
			foreach ($rules as $rule => $rule_value) 
			{
				$value= $source[$item];

				if ($rule==='required'&& empty($value)) 
				{
					$this->addError("{$item} is required");
				}
				elseif (true)
				{
					switch ($rule)
					{
						case 'min':
							if (strlen($value)<$rule_value)
							{
								$this->addError("{$item} phải ít nhất {$rule_value}");
							}
							break;
						case 'max':
							if (strlen($value)>$rule_value)
							{
								$this->addError("{$item} không được quá {$rule_value}");
							}
							break;
						case 'matches':
							if ($value!=$source[$rule_value])
							{
								$this->addError("{$rule_value} Phải khớp với {$item}");
							}
							break;
						case 'image':
							if(isset($_FILES["avatar"])){
								if($_FILES["avatar"]["type"] =="image/jpeg" ||$_FILES["avatar"]["type"] =="image/jpg" || $_FILES["avatar"]["type"] =="image/png" || $_FILES["avatar"]["type"] =="image/gif"){
									if($_FILES["avatar"]["error"]==0){
										if($_FILES["avatar"]["size"] < 1024*1024*5){
											$tmpFile = $_FILES["avatar"]["tmp_name"];
											$fileUrl = "../../asset/page/upload/".$_FILES["avatar"]["name"];
											if (move_uploaded_file($tmpFile,$fileUrl)){
								                
								            }else{
								            	$this->addError("Tải tập tin thất bại");
								            }								
										}else{
											$this->addError("file ảnh quá to");
										}
									}else{
										$this->addError("Lỗi file ảnh");
									}
								}else{
									$this->addError("file ảnh không đúng định dạng hoặc chưa up file ảnh");
								}
							}
							break;
						case 'unique':
							$sql="SELECT * FROM user WHERE $item='$value'";
							$result = mysqli_query($this->_db,$sql) or die("Lỗi select $sql");
							if ($result->num_rows!=0) {
								$this->addError("Email đăng ký đã tồn tại");
							}							
						break;
					}
				}
 			}
		}
		if (empty($this->errors()))
		{
			$this->_passed=true;	
		}
		return $this;
	}
	private function addError($error)
	{
		$this->_errors[]=$error;
	}
	public function errors()
	{
		return $this->_errors;
	}
	public function passed()
	{
		return $this->_passed;
	}
}
?>