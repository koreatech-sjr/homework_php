<?
	session_start();
	$table = "qna";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../assets/css/main.css" />
<style media="screen">
		select {
			 width: 100px; /* 원하는 너비설정 */
			 padding: .4em .2em; /* 여백으로 높이 설정 */
			 font-family: inherit; /* 폰트 상속 */
			 background: url(https://farm1.staticflickr.com/379/19928272501_4ef877c265_t.jpg) no-repeat 95% 50%; /* 네이티브 화살표 대체 */ border: 1px solid #999; border-radius: 0px; /* iOS 둥근모서리 제거 */
			 -webkit-appearance: none; /* 네이티브 외형 감추기 */
			 -moz-appearance: none;
			 appearance: none;
		 }
</style>
<style type="text/css">
a:link {text-decoration: none; color: #333333;}
a:visited {text-decoration: none; color: #333333;}
a:active {text-decoration: none; color: #333333;}
a:hover {text-decoration: underline; color: red;}
</style>
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

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by group_num desc, ord asc";
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
		<? include "../lib/top_login1.php"; ?>
	</nav>
	<section id="main">
		<section id="banner">
			<div class="inner">
				<h1>질문게시판</h1>
				<?
				if(!$userid)
					{
						?>
				<p>우측하단의 채팅창이 온라인상태일 때 글을남기시면 바로 답변해드립니다!</p>
				<?
				}
				else
				{
				?>
					<p><?=$usernick?>(Lev<?=$userlevel?>) 님 우측하단의 채팅창이 온라인상태일 때 글을남기시면 바로 답변해드립니다!</p>
				<?
				}
				?>
				<ul class="actions">
					<li><a href="write_form.php?table=<?=$table?>" class="button alt scrolly big">바로질문하기</a></li>
				</ul>
			</div>
		</section>
		<section>
			<div class="inner">
				<div id="content">

					<div id="col2">



						<div id="title" style="width: 100%;">
							<div style="float: left; width: 15%;">
								<h3>QNA</h3>
							</div>
						</div>

							<div id="list_search1" style="float: left; width:70%;">총
								<?= $total_record ?> 개의 게시물이 있습니다. </div>



						<div class="clear"></div>

						<div id="list_top_title">
							<table border="" style="width: 100%;">
								<tbody>
									<tr style="width: 100%;">
										<td style="width: 10%;">번호</td>
										<td style="width: 45%;">제목</td>
										<td style="width: 15%;">글쓴이</td>
										<td style="width: 20%;">등록일</td>
										<td style="width: 10%;">조회</td>
									</tr>


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

								<tr style="width: 100%;">
									<td>
										<?= $number ?>
									</td>
									<td>
										<a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
											<?= $item_subject ?>
										</a>
									</td>
									<td>
										<?= $item_nick ?>
									</td>
									<td>
										<?= $item_date ?>
									</td>
									<td>
										<?= $item_hit ?>
									</td>
									<?
 $number--;
}
?>



								</tr>
								</tbody>
								</table>
								<center>
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
		echo "<a href='list.php?table=$table&page=$i'> $i </a>";
	}
 }
?>
												&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
												<br><br>
										</div>
										<div id="button">
											<a href="list.php?table=<?=$table?>&page=<?=$page?>"><input type="button" name="목록" value="글목록"></a>
											&nbsp;
											<?
if($userid)
{
?>
												<a href="write_form.php?table=<?=$table?>"><input type="button" name="글쓰기" value="글쓰기"></a>

												<?
}
?>
										</div>
									</div>
									<br>
									<!-- end of page_button -->
									<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search">
									<div id="list_search" style="width: 100%;">


										<div id="list_search3" style="float: left; width: 13%;">
											<select name="find">
																	<option value='subject'>제목</option>
																	<option value='content'>내용</option>
																	<option value='nick'>별명</option>
																	<option value='name'>이름</option>
											</select></div>
										<div id="list_search4" style="float: left; width: 60%;"><input type="text" name="search"></div>
										<div id="list_search5" style="float: left; width: 10%;"><input type="image" src="../img/list_search_button.gif"></div>
									</div>
									</form>
								</center>


						</div>
						<!-- end of list content -->

						<div class="clear"></div>

					</div>
					<!-- end of col2 -->

				</div>
			</div>
		</section>
		<footer id="footer">
			<div class="copyright">
				&copy; Untitled Design: <a href="https://templated.co/">TEMPLATED</a>. Images: <a href="https://unsplash.com/">Unsplash</a>.
			</div>
		</footer>
	</section>

</div> <!-- end of wrap -->


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/588aff2e63b0fb7e39a73d2b/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
