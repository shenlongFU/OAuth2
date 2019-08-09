<?php 
	ob_start();
	session_start();
	include("codeapp/connect.php");
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Magazine</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<link href="asset/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="asset/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="asset/admin/css/sb-admin.css" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="asset/page/css/linearicons.css">
		<link rel="stylesheet" href="asset/page/css/font-awesome.min.css">
		<link rel="stylesheet" href="asset/page/css/bootstrap.css">
		<link rel="stylesheet" href="asset/page/css/magnific-popup.css">
		<link rel="stylesheet" href="asset/page/css/nice-select.css">
		<link rel="stylesheet" href="asset/page/css/animate.min.css">
		<link rel="stylesheet" href="asset/page/css/owl.carousel.css">
		<link rel="stylesheet" href="asset/page/css/jquery-ui.css">
		<link rel="stylesheet" href="asset/page/css/main.css">
	</head>
	<body>
	<?php 
		include('layout/page/header.php');
	 ?>	
		<div class="site-main-container">
			<!-- Start top-post Area -->
			<!-- <section class="top-post-area pt-10">
				<div class="container no-padding">
					<div class="row small-gutters">
						<div class="col-lg-8 top-post-left">
							<div class="feature-image-thumb relative">
								<div class="overlay overlay-bg"></div>
								<img class="img-fluid" src="asset/page/img/top-post1.jpg" alt="">
							</div>
							<div class="top-post-details">
								<ul class="tags">
									<li><a href="#">Food Habit</a></li>
								</ul>
								<a href="image-post.html">
									<h3>A Discount Toner Cartridge Is Better Than Ever.</h3>
								</a>
								<ul class="meta">
									<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
									<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
									<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4 top-post-right">
							<div class="single-top-post">
								<div class="feature-image-thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="asset/page/img/top-post2.jpg" alt="">
								</div>
								<div class="top-post-details">
									<ul class="tags">
										<li><a href="#">Food Habit</a></li>
									</ul>
									<a href="image-post.html">
										<h4>A Discount Toner Cartridge Is Better Than Ever.</h4>
									</a>
									<ul class="meta">
										<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
										<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
										<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
									</ul>
								</div>
							</div>
							<div class="single-top-post mt-10">
								<div class="feature-image-thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="asset/page/img/top-post3.jpg" alt="">
								</div>
								<div class="top-post-details">
									<ul class="tags">
										<li><a href="#">Food Habit</a></li>
									</ul>
									<a href="image-post.html">
										<h4>A Discount Toner Cartridge Is Better</h4>
									</a>
									<ul class="meta">
										<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
										<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
										<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="news-tracker-wrap">
								<h6><span>Breaking News:</span>   <a href="#">Astronomy Binoculars A Great Alternative</a></h6>
							</div>
						</div>
					</div>
				</div>
			</section> -->
			<!-- End top-post Area -->
			<!-- Start latest-post Area -->
			<?php  
				if(isset($_GET["module"])){
					$module = $_GET["module"];
					$file = "module/page/".$module.".php"; 
					if(file_exists($file)){
						include($file);
					}
					else{
						echo "k có module này";
					}
				}
				else{
					if (isset($_GET["Search-box"])) {
						include('module/page/search.php');
					}else{
						include("module/page/getblog.php");
					}
				}
				
			?>
			<!-- End latest-post Area -->
		</div>
		
		<!-- start footer Area -->
		<footer class="footer-area section-gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 single-footer-widget">
						<h4>Top Products</h4>
						<ul>
							<li><a href="#">Managed Website</a></li>
							<li><a href="#">Manage Reputation</a></li>
							<li><a href="#">Power Tools</a></li>
							<li><a href="#">Marketing Service</a></li>
						</ul>
					</div>
					<div class="col-lg-2 col-md-6 single-footer-widget">
						<h4>Quick Links</h4>
						<ul>
							<li><a href="#">Jobs</a></li>
							<li><a href="#">Brand Assets</a></li>
							<li><a href="#">Investor Relations</a></li>
							<li><a href="#">Terms of Service</a></li>
						</ul>
					</div>
					<div class="col-lg-2 col-md-6 single-footer-widget">
						<h4>Features</h4>
						<ul>
							<li><a href="#">Jobs</a></li>
							<li><a href="#">Brand Assets</a></li>
							<li><a href="#">Investor Relations</a></li>
							<li><a href="#">Terms of Service</a></li>
						</ul>
					</div>
					<div class="col-lg-2 col-md-6 single-footer-widget">
						<h4>Resources</h4>
						<ul>
							<li><a href="#">Guides</a></li>
							<li><a href="#">Research</a></li>
							<li><a href="#">Experts</a></li>
							<li><a href="#">Agencies</a></li>
						</ul>
					</div>
					<div class="col-lg-3 col-md-6 single-footer-widget">
						<h4>Instragram Feed</h4>
						<ul class="instafeed d-flex flex-wrap">
							<li><img src="asset/page/img/i1.jpg" alt=""></li>
							<li><img src="asset/page/img/i2.jpg" alt=""></li>
							<li><img src="asset/page/img/i3.jpg" alt=""></li>
							<li><img src="asset/page/img/i4.jpg" alt=""></li>
							<li><img src="asset/page/img/i5.jpg" alt=""></li>
							<li><img src="asset/page/img/i6.jpg" alt=""></li>
							<li><img src="asset/page/img/i7.jpg" alt=""></li>
							<li><img src="asset/page/img/i8.jpg" alt=""></li>
						</ul>
					</div>
				</div>
				<div class="footer-bottom row align-items-center">
					<p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					<div class="col-lg-4 col-md-12 footer-social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
					</div>
				</div>
			</div>
		</footer>
		<!-- End footer Area -->
		<script src="asset/page/js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="asset/page/js/vendor/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
		<script src="asset/page/js/easing.min.js"></script>
		<script src="asset/page/js/hoverIntent.js"></script>
		<script src="asset/page/js/superfish.min.js"></script>
		<script src="asset/page/js/jquery.ajaxchimp.min.js"></script>
		<script src="asset/page/js/jquery.magnific-popup.min.js"></script>
		<script src="asset/page/js/mn-accordion.js"></script>
		<!-- <script src="asset/page/js/jquery-ui.js"></script> -->
		<script src="asset/page/js/jquery.nice-select.min.js"></script>
		<script src="asset/page/js/owl.carousel.min.js"></script>
		<script src="asset/page/js/mail-script.js"></script>
		<script src="asset/page/js/main.js"></script>
		<script type="text/javascript">
			$( document ).ready(function() {
				$(".pagecl").click(function() {
					var numpage=$(this).html();
					var thispage=$(this);
					$.ajax({
			            url : "module/ajax/pagination.php",
			            type : "post",
			            dataType:"text",
			            data : {
			            	idtype : '<?=$id?>',
			            	numpage : numpage
			            },
			            success : function (result){
			                $('.typelist').html(result);
			                $(".pagecl").css('background','#fff');
			                thispage.css('background','#a5b8fb');
			            }
			        });
					
				});
				$(".pagecl1").click(function() {
					var numpage=$(this).html();
					var thispage=$(this);
					$.ajax({
			            url : "module/ajax/paginationnew.php",
			            type : "post",
			            dataType:"text",
			            data : {
			            	numpage : numpage
			            },
			            success : function (result){
			                $('.typelist').html(result);
			                $(".pagecl1").css('background','#fff');
			                thispage.css('background','#a5b8fb');
			            }
			        });
					
				});
				$(".pagecl2").click(function() {
					var numpage=$(this).html();
					var thispage=$(this);
					$.ajax({
			            url : "module/ajax/paginationsearch.php",
			            type : "post",
			            dataType:"text",
			            data : {
			            	key:'<?=$_GET['Search-box']?>',
			            	numpage : numpage
			            },
			            success : function (result){
			                $('.typelist').html(result);
			                $(".pagecl2").css('background','#fff');
			                thispage.css('background','#a5b8fb');
			            }
			        });
					
				});
			});
		</script>
		<script type="text/javascript">
			function get(){
			$.ajax({
		            url : "module/ajax/comment.php",
		            type : "post",
		            dataType:"text",
		            data : {
		                number : '<?=$id?>'
		            },
		            success : function (result){
		                $('.comment').html(result);
		                $(".btrep").click(function() {
							var d1=$(this).parent();
							var d2=d1.parent();
							var d3=d2.find('textarea');
							var idcom=d3.attr('idrepcom');
							if(d3.val()!=''){
								$.ajax({
						            url : "module/ajax/comment.php",
						            type : "post",
						            dataType:"text",
						            data : {
						            	number : '<?=$id?>',
						            	idcom : idcom,
						                rep : d3.val()
						            },
						            success : function (result){
						                $('.comment').html(result);
						                get();
						                d3.val("");
						                $(".btn-reply").click(function() {
											var a=$(this).parent();
											var a2=a.parent();
											var a3=a2.parent();
											var a4=a3.parent();
											var a5=a4.find('.rep');
											if (a5.css('display')==='none') a5.css('display','block');
											else a5.css('display','none');
									    });
						            }
						        });
							}		        
					    });
		                $(".btn-reply").click(function() {
							var a=$(this).parent();
							var a2=a.parent();
							var a3=a2.parent();
							var a4=a3.parent();
							var a5=a4.find('.rep');
							if (a5.css('display')==='none') a5.css('display','block');
							else a5.css('display','none');
					    });
		            }
		        });
			$(".btcomment").click(function() {
				var com=$('.upcomment1').val();
				if(com!=''){
					$.ajax({
			            url : "module/ajax/comment.php",
			            type : "post",
			            dataType:"text",
			            data : {
			            	number : '<?=$id?>',
			                data : $('.upcomment1').val()
			            },
			            success : function (result){
			                $('.comment').html(result);
			                $('.upcomment1').val("");
			                get();
			                $(".btrep").click(function() {
								var d1=$(this).parent();
								var d2=d1.parent();
								var d3=d2.find('textarea');
								var idcom=d3.attr('idrepcom');
								if(d3.val()!=''){
									$.ajax({
							            url : "module/ajax/comment.php",
							            type : "post",
							            dataType:"text",
							            data : {
							            	number : '<?=$id?>',
							            	idcom : idcom,
							                rep : d3.val()
							            },
							            success : function (result){
							                $('.comment').html(result);
							                get();
							                $(".btn-reply").click(function() {
												var a=$(this).parent();
												var a2=a.parent();
												var a3=a2.parent();
												var a4=a3.parent();
												var a5=a4.find('.rep');
												if (a5.css('display')==='none') a5.css('display','block');
												else a5.css('display','none');
										    });
							                d3.val("");
							            }
							        });
								}		        
						    });
			                $(".btn-reply").click(function() {
								var a=$(this).parent();
								var a2=a.parent();
								var a3=a2.parent();
								var a4=a3.parent();
								var a5=a4.find('.rep');
								if (a5.css('display')==='none') a5.css('display','block');
								else a5.css('display','none');
						    });
			            }
			        });
				}		        
		    });
		};
		get();
		
		</script>

	</body>
</html>