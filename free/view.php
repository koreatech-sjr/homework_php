<?
	session_start();
	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);

	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  $item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];
	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}

	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i])
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			if ($image_width[$i] > 785)
				$image_width[$i] = 785;
		}
		else
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}
	$new_hit = $item_hit + 1;
	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);

	$sql2 = "select hp from member where id='$item_id'";
	$result = mysql_query($sql2, $connect);
	// //밑에 줄 오류
	$row2 = mysql_fetch_array($result);
	$item_hp = $row2[hp];
	// mysql_close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../assets/css/main.css" />
<script>
	function check_input()
	{
		if (!document.ripple_form.ripple_content.value)
		{
			alert("내용을 입력하세요!");
			document.ripple_form.ripple_content.focus();
			return;
		}
		document.ripple_form.submit();
    }

    function del(href)
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>
</head>

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
				<li><a href="../free/list.php" class="active"><p>SALE</p></a></li>
				<li><a href="../concert/list.php"><p>Board</p></a></li>
				<li><a href="../download/list.php" ><p>FILE</p></a></li>
				<li><a href="../greet/list.php"><p>Anony</p></a></li>
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
				<li><a href="../free/list.php" class="active"><p>SALE</p></a></li>
				<li><a href="../concert/list.php"><p>Board</p></span></a></li>
				<li><a href="../download/list.php"><p>FILE</p></a></li>
				<li><a href="../greet/list.php"><p>Anony</p></a></li>
				<li><a href="../qna/list.php"><p>QNA</p></span></a></li>
		<?
	}
	?>
	</ul>
	</nav>
	<section id="main">
		<header id="header">
			<div>Snapshot <span>by TEMPLATED</span></div>
		</header>
						<!-- Contact -->
							<section id="contact">
								<!-- Social -->
									<div class="social column">
										<ul class="icons">
											<li><h3>글 제목</h3></li>
											<li><h5>조회수 :
												<?=$item_hit + 1?>
										</h5></li>
										</ul>
										<div style="max-width: 100%; height: 400px; overflow: hidden;">
											<img src="./data/2017_06_03_23_28_28_0.jpg" alt="LOADING" style="width: auto; height: 400px; margin-left: -30px;">
										</div>
										<br>
										<h5>내용</h5>
										<ul class="icons">
											<li><h5>작성자 닉네임 : <?=$item_nick?></h5></li>
											<li><h5>작성자 연락처 : <?=$item_hp?></h5></li>
										</ul>
									</div>

								<!-- Form -->
									<div class="column">
									<div id="ripple">
										<?
											    $sql = "select * from free_ripple where parent='$item_num'";
											    $ripple_result = mysql_query($sql);

												while ($row_ripple = mysql_fetch_array($ripple_result))
												{
													$ripple_num     = $row_ripple[num];
													$ripple_id      = $row_ripple[id];
													$ripple_nick    = $row_ripple[nick];
													$ripple_content = str_replace("\n", "<br>", $row_ripple[content]);
													$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
													$ripple_date    = $row_ripple[regist_day];
										?>
													<div id="ripple_content"><?=$ripple_content?></div>
													<div id="ripple_writer_title">
													<ul>
													<li id="writer_title1">닉네임 :  <?=$ripple_nick?></li>
													<li id="writer_title2">작성 시간 :  <?=$ripple_date?></li>
													<?
													if($userid=="admin" || $userid==$ripple_id)
																echo "<li id='writer_title3'><a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>[삭제]</a></li>";
																?>
													</ul>
													</div>

										<?
												}
										?>
									<form  name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>">
									<div id="ripple_box">
										<br>
										<div id="ripple_box1"><h5>댓글쓰기</h5></div>
										<div id="ripple_box2"><textarea rows="5" cols="65" name="ripple_content"></textarea>
										</div>
											<br>
										 <center><div id="ripple_box3"><a href="#"><input class="button" value="댓글 달기" onclick="check_input()"></button></a></div></center>
									</div>
									</form>
								</div> <!-- end of ripple -->

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
