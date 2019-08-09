<?php 
	$sqltype = "SELECT * FROM typeblog";
	$result = mysqli_query($conn,$sqltype) or die("Lỗi select");
	if(isset($_GET["id"])){
		$id=$_GET['id'];
	$sqlblog = "SELECT * FROM blog WHERE id=$id";
	$result2 = mysqli_query($conn,$sqlblog) or die("Lỗi select");
	$blog= mysqli_fetch_assoc($result2);
	$_SESSION['avatar']=$blog['avatar'];		
	}
?>

<h1>Edit Blog</h1>
<?php 
	if (isset($_SESSION['error'])){
		foreach ($_SESSION['error'] as  $error){
 ?>
 	<h4 style="color: red;"><?=$error?></h4>
 <?php
		}
	}
	unset($_SESSION['error']);
 ?>
<form action="action/admin/editblog.php?abc&id=<?=$blog['id']?>" method="POST">
	<div class="form-group">
	<label for="title">Title Blog</label>
	<input type="text" class="form-control" id="title" name='titleblog' placeholder="Title blog" value="<?=$blog['title']?>">
	</div>
	<div class="form-group">
		<label for="title">Type Blog</label>
		<select class="form-control" name='typeblog'>
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?= $row['id']?>" <?php if($row['id']==$blog['id_type_blog']){echo "selected";}?> ><?= $row['nametypeblog']?></option>
            <?php
            };
            ?>
        </select>
	</div>
	<div class="form-group">
		<label for="title">Describe Blog</label>
		<textarea name="describe" class="form-control" rows="3" cols="80"><?=$blog['dis']?></textarea>
	</div>
	<div class="form-group">
		<label for="title">Content Blog</label>
		<textarea name="contentblog" id="noidung" rows="10" cols="10"><?=$blog['content']?></textarea>
	</div>
	<div class="form-group">
		<label for="title">Avatar Blog</label>
		<input type="file" name='avatarblog' value="<?=$blog['avatar']?>">
	</div>
  <button type="submit" name='editblog' class="btn btn-primary">Submit</button>
</form>