<?
	session_start();
?>
<?
	include "./lib/dbconn.php";

	$sql = "select * from free order by num desc";
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
						<li><a href="./free/list.php"><p>SALE</p></a></li>
						<li><a href="./concert/list.php"><p>Board</p></a></li>
						<li><a href="./download/list.php"><p>FILE</p></span></a></li>
						<li><a href="./greet/list.php"><p>Anony</p></a></li>
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
					<li><a href="./free/list.php"><p>SALE</p></a></li>
					<li><a href="./concert/list.php"><p>Board</p></a></li>
					<li><a href="./download/list.php"><p>FILE</p></a></li>
					<li><a href="./greet/list.php"><p>Anony</p></a></li>
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

														$str = "<div style='margin-top: 0px;' class='media all people'>"."<a  href='/free/view.php?table=$table&page=$page&num=".$item_num."'><img src='/free/data/".$item_file_copied_0."' alt='' title='This right here is a caption.' /></a>
														</div>";
														echo $str;
												}
									?>
								</div>
								<footer>
									<a href="./free/list.php" class="button big">전체보기</a>
								</footer>

							</div>

							<footer id="footer">
								<div class="copyright">
									&copy; Untitled Design: <a href="https://templated.co/">TEMPLATED</a>. Images: <a href="https://unsplash.com/">Unsplash</a>.
								</div>
							</footer>
					</section>
				<!--

					<section id="contact">

							<div class="social column">
								<h3>About Me</h3>
								<p>Mus sed interdum nunc dictum rutrum scelerisque erat a parturient condimentum potenti dapibus vestibulum condimentum per tristique porta. Torquent a ut consectetur a vel ullamcorper a commodo a mattis ipsum class quam sed eros vestibulum quisque a eu nulla scelerisque a elementum vestibulum.</p>
								<p>Aliquet dolor ultricies sem rhoncus dolor ullamcorper pharetra dis condimentum ullamcorper rutrum vehicula id nisi vel aptent orci litora hendrerit penatibus erat ad sit. In a semper velit eleifend a viverra adipiscing a phasellus urna praesent parturient integer ultrices montes parturient suscipit posuere quis aenean. Parturient euismod ultricies commodo arcu elementum suspendisse id dictumst at ut vestibulum conubia quisque a himenaeos dictum proin dis purus integer mollis parturient eros scelerisque dis libero parturient magnis.</p>
								<h3>Follow Me</h3>
								<ul class="icons">
									<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
								</ul>
							</div>


							<div class="column">
								<h3>Get in Touch</h3>
								<form action="#" method="post">
									<div class="field half first">
										<label for="name">Name</label>
										<input name="name" id="name" type="text" placeholder="Name">
									</div>
									<div class="field half">
										<label for="email">Email</label>
										<input name="email" id="email" type="email" placeholder="Email">
									</div>
									<div class="field">
										<label for="message">Message</label>
										<textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
									</div>
									<ul class="actions">
										<li><input value="Send Message" class="button" type="submit"></li>
									</ul>
								</form>
							</div>

					</section>
				-->
				<!-- Footer -->

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
