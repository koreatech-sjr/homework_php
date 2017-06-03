<?
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="../assets/css/main.css" />
<link href="../css/greet.css" rel="stylesheet" type="text/css" media="all">
</head>
<?
	include "../lib/dbconn.php";

	$scale=10;			// 한 화면에 표시되는 글 수

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

		$sql = "select * from greet where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from greet order by num desc";
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

		<!-- Nav -->
			<nav id="nav">
					<? include "../lib/top_login1.php"; ?>
			</nav>

		<!-- Main -->
			<section id="main">

				<!-- Header -->
					<header id="header">
						<div>Snapshot <span>by TEMPLATED</span></div>
					</header>

				<!-- Gallery -->
					<section id="galleries">

						<!-- Photo Galleries -->
							<div class="gallery">

								<!-- Filters -->
									<header>
										<h1>Gallery</h1>
										<ul class="tabs">
											<li><a href="#" data-tag="all" class="button active">All</a></li>
											<li><a href="#" data-tag="people" class="button">People</a></li>
											<li><a href="#" data-tag="place" class="button">Places</a></li>
											<li><a href="#" data-tag="thing" class="button">Things</a></li>
										</ul>
									</header>

									<div class="content">
										<form  name="board_form" method="post" action="list.php?mode=search">
										<div id="list_search">
											<div id="list_search1">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다.  </div>
											<div id="list_search2"><img src="../img/select_search.gif"></div>
											<div id="list_search3">
												<select name="find">
								                    <option value='subject'>제목</option>
								                    <option value='content'>내용</option>
								                    <option value='nick'>별명</option>
								                    <option value='name'>이름</option>
												</select></div>
											<div id="list_search4"><input type="text" name="search"></div>
											<div id="list_search5"><input type="image" src="../img/list_search_button.gif"></div>
										</div>
										</form>

										<div class="clear"></div>

										<div id="list_top_title">
											<ul>
												<li id="list_title1"><img src="../img/list_title1.gif"></li>
												<li id="list_title2"><img src="../img/list_title2.gif"></li>
												<li id="list_title3"><img src="../img/list_title3.gif"></li>
												<li id="list_title4"><img src="../img/list_title4.gif"></li>
												<li id="list_title5"><img src="../img/list_title5.gif"></li>
											</ul>
										</div>

										<div id="list_content">
											<?
											   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
											   {
											      mysql_data_seek($result, $i);
											      // 가져올 레코드로 위치(포인터) 이동
											      $row = mysql_fetch_array($result);
											      // 하나의 레코드 가져오기

												  $item_num     = $row[num];
												  $item_id      = $row[id];
												  $item_name    = $row[name];
											  	$item_nick    = $row[nick];
												  $item_hit     = $row[hit];

										      $item_date    = $row[regist_day];
												  $item_date = substr($item_date, 0, 10);

												  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

											?>
														<div id="list_item">
															<div id="list_item1"><?= $number ?></div>
															<div id="list_item2"><a href="view.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a></div>
															<div id="list_item3"><?= $item_nick ?></div>
															<div id="list_item4"><?= $item_date ?></div>
															<div id="list_item5"><?= $item_hit ?></div>
														</div>
											<?
											   	   $number--;
											   }
											?>
												<br>
														<div id="page_button">
															<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp;
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
														echo "<a href='list.php?page=$i'> $i </a>";
													}
											   }
											?>
														&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
															</div>
															<div id="button">
																<a href="list.php?page=<?=$page?>"><img src="../img/list.png"></a>&nbsp;
											<?
												if($userid)
												{
											?>
													<a href="write_form.php"><img src="../img/write.png"></a>
											<?
												}
											?>
									</div>
							</div>
					</section>

				<!-- Contact -->
					<section id="contact">
						<!-- Social -->
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

						<!-- Form -->
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
