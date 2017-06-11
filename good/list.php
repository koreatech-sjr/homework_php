<?
	session_start();
	$table = "good";
	$ripple = "good_ripple";
?>
<?
		  include "../lib/dbconn.php";

		  $sql = "select * from good";
		  $result = mysql_query($sql, $connect);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<link href="../assets/css/slider.css" rel="stylesheet" />


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../assets/css/main.css" />
</head>

<?
	include "../lib/dbconn.php";
	$scale=8;			// 한 화면에 표시되는 글 수

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}
		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);
	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산
	if ($total_record % $scale == 0)
		$total_page = floor($total_record/$scale);
	else
		$total_page = floor($total_record/$scale) + 1;

	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화

	// 표시할 페이지($page)에 따라 $start 계산
	$start = ($page - 1) * $scale;
	$number = $total_record - $start;
?>

<body>
	<div class="page-wrap">

		<!-- nav -->
		<nav id="nav">
		<style media="screen">
		p {
			font-size: medium;
		}
		</style>
		<?
			if(!$userid)
		{
		?>
				<ul style="width=54px; ">
					<li><a href="../index3.php"><!--홈--><p>HOME</p></a></li>
					<li><a href="../login/login_form.php"><!--로그인--><p>Login</p></a></li>
					<li><a href="../member/member_form.php"><!--회원가입--><p>Join</p></a></li>
					<li><a href="../memo/memo.php"><p>1-Line</p></a></li>
					<li><a href="../good/list.php" class="active"><p>SALE</p></a></li>
					<li><a href="../free/list.php"><p>Board</p></a></li>
					<li><a href="../download/list.php" ><p>FILE</p></a></li>
					<li><a href="../anony/list.php"><p>Anony</p></a></li>
					<li><a href="../qna/list.php"><p>QNA</p></a></li>
		<?
		}
		else
		{

			?>
				<ul style="width=54px; ">
					<li><a href="../index3.php"><p>HOME</p></a></li>
					<li><a href="../login/logout.php"><p>LogOut</p></span></a></li>
					<li><a href="../login/member_form_modify.php"> <p>My</p></a></li>
					<li><a href="../memo/memo.php"> <p>1-Line</p> </span></a></li>
					<li><a href="../good/list.php" class="active"><p>SALE</p></a></li>
					<li><a href="../free/list.php"><p>Board</p></span></a></li>
					<li><a href="../download/list.php"><p>FILE</p></a></li>
					<li><a href="../anony/list.php"><p>Anony</p></a></li>
					<li><a href="../qna/list.php"><p>QNA</p></span></a></li>
			<?
		}
		?>
		</ul>
		</nav>

		<!-- Main -->
			<section id="main">
					<section>
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<!--페이지-->
							<ol class="carousel-indicators">
								<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								<li data-target="#myCarousel" data-slide-to="1"></li>
								<li data-target="#myCarousel" data-slide-to="2"></li>
							</ol>
							<!--페이지-->
							<div class="carousel-inner">

							</div>
							<div class="carousel-inner">
								<!--슬라이드1-->
								<div class="item active">
									<img src="http://www.blueb.co.kr/SRC2/_image/w01.jpg" style="width:100%" alt="First slide">
									<div class="container">
										<div class="carousel-caption">
											<h1>중고의 새로운 혁명</h1>
											<p>안녕하세요</p>
										</div>
									</div>
								</div>
								<!--슬라이드1-->

								<!--슬라이드2-->
								<div class="item">
									<img src="http://www.blueb.co.kr/SRC2/_image/w02.jpg" style="width:100%" data-src="" alt="Second slide">
									<div class="container">
										<div class="carousel-caption">
											<h1>헌것 같은 새것 같은</h1>
											<p>당신을 위한</p>
										</div>
									</div>
								</div>
								<!--슬라이드2-->

								<!--슬라이드3-->
								<div class="item">
									<img src="http://www.blueb.co.kr/SRC2/_image/w03.jpg" style="width:100%" data-src="" alt="Third slide">
									<div class="container">
										<div class="carousel-caption">
											<h1>당신만의 유물</h1>
											<p>제품이 기다리고 있습니다</p>
										</div>
									</div>
								</div>
								<!--슬라이드3-->
							</div>

							<!--이전, 다음 버튼-->
							<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
							<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
						</div>

					</section>

				<!-- Gallery -->
					<section id="galleries">

						<!-- Photo Galleries -->
							<div class="gallery">

								<!-- Filters -->
									<header>
										<h1>물품들</h1>

									</header>

									<div class="content">
										<?
													for($i=$start; $i<$start+$scale && $i < $total_record; $i++){
														mysql_data_seek($result, $i);
														$row = mysql_fetch_array($result);

														$item_num = $row[num];
														$item_file_copied_0 = $row[file_copied_0];

															$str = "<div style='margin-top: 0px;' class='media all people'>"."<a href='view.php?table=$table&page=$page&num=".$item_num."'><img src='./data/".$item_file_copied_0."' alt='' title='This right here is a caption.' /></a>
															</div>";
															echo $str;
													}
										?>
									</div>
							</div>
							<!-- page button -->

										<div style="text-align: center;" >
											<div id="page_num"> ◀ prev &nbsp;&nbsp;&nbsp;&nbsp;
												<?
												   // 게시판 목록 하단에 페이지 링크 번호 출력
												   for ($i=1; $i<=$total_page; $i++)
												   {
														if ($page == $i)     // 현재 페이지 번호 링크 안함
														{
															echo "<b> $i </b>";
														}
														else
														{
															echo "<a href='list.php?table=$table&page=$i'> $i </a>";
														}
												   }
												?>
															&nbsp;&nbsp;&nbsp;&nbsp;next ▶
														</div><br>
																<div id="button">
																	<a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png"></a>&nbsp;
												<?
													if($userid)
													{
												?>
														<a href="write_form.php?table=<?=$table?>"><img src="../img/write.png"></a>
												<?
													}
												?>
											</div>
											<br>
										</div>
										<!-- end  page button -->
					</section>


				<!-- Footer -->
					<footer id="footer">
						<div class="copyright">
							&copy; Untitled Design: <a href="https://templated.co/">TEMPLATED</a>. Images: <a href="https://unsplash.com/">Unsplash</a>.
						</div>
					</footer>
			</section>
	</div>


<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.poptrox.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>
