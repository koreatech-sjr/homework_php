<?
	session_start();
?>
<?
	include "./lib/dbconn.php";

	$sql = "select * from good order by num desc";
	$result = mysql_query($sql, $connect);
	$total_record = mysql_num_rows($result);
	$scale = 8;
	$start = 0;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="assets/css/main.css" />
<style media="screen">
	p {
		font-size: medium;
	}
	</style>
</head>

<body>
	<div class="page-wrap">

		<!-- nav -->
		<nav id="nav">
			<?
			if(!$userid)
				{
					?>
					<ul style="width=55px;">
						<li><a href="./index.php" class="active"><!--홈--><p>HOME</p></a></li>
						<li><a href="./login/login_form.php"><!--로그인--><p>Login</p></a></li>
						<li><a href="./member/member_form.php"><!--회원가입--><p>Join</p></a></li>
						<li><a href="./memo/memo.php"><p>1-Line</p></a></li>
						<li><a href="./good/list.php"><p>SALE</p></a></li>
						<li><a href="./free/list.php"><p>Board</p></a></li>
						<li><a href="./download/list.php"><p>FILE</p></span></a></li>
						<li><a href="./anony/list.php"><p>Anony</p></a></li>
						<li><a href="./qna/list.php"><p>QNA</p></span></a></li>
				<?
				}
				else
				{
				?>
				<ul style="width=55px;">
					<li><a href="./index.php" class="active"><p>HOME</p></a></li>
					<li><a href="./login/logout.php"><p>LogOut</p></span></a></li>
					<li><a href="./login/member_form_modify.php"> <p>My</p></a></li>
					<li><a href="./memo/memo.php"> <p>1-Line</p> </span></a></li>
					<li><a href="./good/list.php"><p>SALE</p></a></li>
					<li><a href="./free/list.php"><p>Board</p></a></li>
					<li><a href="./download/list.php"><p>FILE</p></a></li>
					<li><a href="./anony/list.php"><p>Anony</p></a></li>
					<li><a href="./qna/list.php"><p>QNA</p></a></li>
				<?
				}
				?>
			</ul>
		</nav>

		<!-- Main -->
			<section id="main">

				<!-- Banner -->
					<section id="banner">

						<div class="inner">
							<h1>중고나라</h1>
							<?
							if(!$userid)
								{
									?>
							<p>중고나라 페이지 한줄 설명</p>
							<?
							}
							else
							{
							?>
								<p><?=$usernick?>(Lev<?=$userlevel?>) 님 중고나라에 오신 것을 환영합니다.</p>
							<?
							}
							?>
							<ul class="actions">
								<li><a href="#galleries" class="button alt scrolly big">바로보기</a></li>
							</ul>
						</div>
					</section>

				<!-- Gallery -->
					<section id="galleries">
						<div class="gallery">
							<header class="special">
								<h2>What's NEW?</h2>
								<br>
							</header>

						<!-- Photo Galleries -->
								<div class="content">
									<?
												for($i=$start; $i<$start+$scale && $i < $total_record; $i++){
													mysql_data_seek($result, $i);
													$row = mysql_fetch_array($result);

													$item_num = $row[num];
													$item_file_copied_0 = $row[file_copied_0];

														$str = "<div style='margin-top: 0px;' class='media'>"
														."<a href='/good/view.php?table=$table&page=$page&num="
														.$item_num."'><img src='./good/data/".$item_file_copied_0."'
														alt='' title='This right here is a caption.' /></a>
														</div>";
														echo $str;
												}
									?>
								</div>
								<footer>
									<a href="./good/list.php" class="button big">전체보기</a>
								</footer>

							</div>
							<div id="banner" style="background-image: url(/assets/css/2.jpg);">
								<div class="inner">
									<h1>중고나라</h1>
									<?
									if(!$userid)
										{
											?>

									<?
									}
									else
									{
									?>
										<p><?=$usernick?>(Lev<?=$userlevel?>) 님 중고나라를 평가해주세요.</p>
									<?
									}
									?>
									<ul class="actions">
										<li><a target="_blank" href="./survey/survey.php" class="button alt scrolly big">평가하기</a></li>
									</ul>
								</div>
							</div>
							<section>
								<div class="inner">
								<style>
										#map {
										 height: 400px;
										 width: 80%;
										}
								 </style>
								 <center><h3>KOREATECH 위치</h3></center><br>
								 <center><div id="map"></div></center>
								 <script>
									 function initMap() {
										 var uluru = {lat: 36.763767, lng: 127.281854};
										 var map = new google.maps.Map(document.getElementById('map'), {
											 zoom: 15,
											 center: uluru
										 });
										 var marker = new google.maps.Marker({
											 position: uluru,
											 map: map
										 });
									 }
								 </script>
								 <script async defer
								 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYyp3fmyrcnwwhzB7NV3YPZ9LdTjug4sY&callback=initMap">
								 </script>
								 <br>
								 <br>
								</div>
							</section>
							<footer id="footer">
								<div class="copyright">
									&copy; Untitled Design: <a href="https://templated.co/">TEMPLATED</a>. Images: <a href="https://unsplash.com/">Unsplash</a>.
								</div>
							</footer>
					</section>
			</section>


	</div>
	<!-- Scripts -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="responsiveslides.min.js"></script>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.poptrox.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>




</body>
</html>
