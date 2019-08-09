<?php 
	include("../../codeapp/connect.php");
	/**
	 * comment
	 */
	session_start();
	$idd=$_POST['number'];
	$idcom=$_POST['idcom'];
	$sqlslc = "SELECT * FROM comment where id_blog=$idd ";
	$sl = mysqli_query($conn,$sqlslc) or die("Lỗi select");
	$num=$sl->num_rows;
	$upnum=$num+1;
	if (isset($_POST["data"])) {
		$com=$_POST["data"];
		$time=date('Y/m/d - H:i:s', time());
		$user=$_SESSION['user'];
		if($com!=''){
			$sqlinsert="INSERT INTO comment (id_user,id_blog,content,`time`) VALUES('$user','$idd','$com','$time')";
				mysqli_query($conn,$sqlinsert)or die("loi cau lenh ".$sqlinsert);
		}
		$sqlud="UPDATE blog set num='$upnum' WHERE id='$idd'";
		mysqli_query($conn,$sqlud)or die("loi cau lenh ".$sqlud);
	}
	if (isset($_POST["rep"])) {
		$re=$_POST["rep"];
		$timere=date('Y/m/d - H:i:s', time());
		$user=$_SESSION['user'];
		if($re!=''){
			$sqlinsertre="INSERT INTO `repcomment`(id_user,id_comment,content,`time`) VALUES('$user','$idcom','$re','$timere')";
				mysqli_query($conn,$sqlinsertre)or die("loi cau lenh ".$sqlinsertre);
		}
		$sqlud="UPDATE blog set num='$upnum' WHERE id='$idd'";
		mysqli_query($conn,$sqlud)or die("loi cau lenh ".$sqlud);
	}
	$sqlcom = "SELECT comment.id,comment.time,comment.content,user.avartar,user.username FROM comment,user where id_blog=$idd AND comment.id_user=user.id ORDER BY `time` DESC limit 5";
	$slcom = mysqli_query($conn,$sqlcom) or die("Lỗi select");	
 ?>
<div class="comment-sec-area">
	<div class="container">
		<div class="row flex-column">
			<h6>5/<?=$num?> Comments</h6>
			<?php
                while ($com = mysqli_fetch_assoc($slcom)) {
                	$idcom=$com['id'];
					$sqlre = "SELECT repcomment.time,repcomment.content,user.username,user.avartar FROM repcomment,user,comment where comment.id=repcomment.id_comment AND id_comment=$idcom AND comment.id_user=user.id ORDER BY repcomment.time DESC";
					$slre = mysqli_query($conn,$sqlre) or die("Lỗi select $sqlre");
            ?>
            <div class="div">
			<div class="comment-list">
				<div class="single-comment justify-content-between d-flex">
					<div class="user justify-content-between d-flex">
						<div class="thumb">
							<img style="width: 60px;" src="asset/page/upload/<?=$com['avartar']?>" alt="">
						</div>
						<div class="desc">
							<h5><a href="#"><?=$com['username']?></a></h5>
							<p class="date"><?=$com['time']?></p>
							<p class="comment">
								<?=$com['content']?>
							</p>
						</div>
					</div>
					<div class="reply-btn">
						<p class="btn-reply text-uppercase"><?=$slre->num_rows?> reply</p>
					</div>
				</div>
			</div>
			<div class="rep" style="display: none">
			<?php 
                while ($rep = mysqli_fetch_assoc($slre)) {
			?>
				<div class="comment-list " style="padding-left: 120px;">
					<div class="single-comment justify-content-between d-flex">
						<div class="user justify-content-between d-flex">
							<div class="thumb">
								<img style="width: 50px;" src="asset/page/upload/<?=$rep['avartar']?>" alt="">
							</div>
							<div class="desc">
								<h5><a href="#"><?=$rep['username']?></a></h5>
								<p class="date"><?=$rep['time']?></p>
								<p class="comment">
									<?=$rep['content']?>
								</p>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if (isset($_SESSION['user'])) {
			?>
			<div class="repcomment5 single-comment justify-content-between d-flex">
				<div class="form-group" style="margin-left: 116px;">
					<textarea name="repcomment" class="repcomment form-control" rows="2" idrepcom="<?=$com['id']?>" cols="50"></textarea>
				</div>
			  	<div style="margin: 15px 0px 0px 20px;">
					<p name='btrepcomment' class="btrep btn btn-primary">Rep</p>
				</div>
			</div>
			<?php } ?>
			</div>
			</div>
			<?php	}?>	
		</div>
	</div>
</div>
<script type="text/javascript">
	// $(".btrep").click(function() {
	// 	var d1=$(this).parent();
	// 	var d2=d1.parent();
	// 	var d3=d2.find('textarea');
	// 	var idcom=d3.attr('idrepcom');
	// 	if(d3.val()!=''){
	// 		$.ajax({
	//             url : "module/ajax/comment.php",
	//             type : "post",
	//             dataType:"text",
	//             data : {
	//             	number : '<?=$idd?>',
	//             	idcom : idcom,
	//                 rep : d3.val()
	//             },
	//             success : function (result){
	//                 $('.comment').html(result);
	//                 d3.val("");
	//             }
	//         });
	// 	}		        
 //    });
</script>