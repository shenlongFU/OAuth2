<?php 
	$sqltype = "SELECT * FROM typeblog";
	$result = mysqli_query($conn,$sqltype) or die("Lỗi select");
?>

<h1>Add Blog</h1>
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
<form action="action/admin/addblog.php" method="POST">
	<div class="form-group">
	<label for="title">Title Blog</label>
	<input type="text" class="form-control" id="title" name='titleblog' placeholder="Title blog">
	</div>
	<div class="form-group">
		<label for="title">Type Blog</label>
		<select class="form-control" name='typeblog'>
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?= $row[id]?>"><?= $row[nametypeblog]?></option>
            <?php
            };
            ?>
        </select>
	</div>
	<div class="form-group">
		<label for="title">Describe Blog</label>
		<textarea name="describe" class="form-control" rows="3" cols="80"></textarea>
	</div>
	<div class="form-group">
		<label for="title">Content Blog</label>
		<textarea name="contentblog" id="noidung" rows="10" cols="10">Content of blog</textarea>
	</div>
	<div class="form-group">
		<label for="title">Avatar Blog</label>
		<input type="file" name='avatarblog'>
	</div>
  <button type="submit" name='addblog' class="btn btn-primary">Submit</button>
</form>