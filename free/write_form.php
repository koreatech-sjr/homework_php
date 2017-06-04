<?
	session_start();
	include "../lib/dbconn.php";

	if ($mode=="modify")
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);
		$row = mysql_fetch_array($result);

		$item_subject     = $row[subject];
		$item_content     = $row[content];
		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../assets/css/main.css" />
		<script>
			function check_input() {
				if (!document.board_form.subject.value) {
					alert("제목을 입력하세요1");
					document.board_form.subject.focus();
					return;
				}

				if (!document.board_form.content.value) {
					alert("내용을 입력하세요!");
					document.board_form.content.focus();
					return;
				}
				document.board_form.submit();
			}
		</script>
	</head>

	<body>
		<div class="page-wrap">
			<nav id="nav">
				<? include "../lib/top_login1.php"; ?>
			</nav>

			<section id="main">
				<header id="header">
					<div>Snapshot <span>by TEMPLATED</span></div>
				</header>
				<section>
					<div class="inner">
						<header>
							<h2>매물등록</h2>
						</header>
						<div class="clear"></div>
						<?
							if($mode=="modify")
							{
						?>
							<form name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data">
								<?
									}
									else
									{
								?>
									<form name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data">
										<?
											}
										?>
											<div id="write_form">
												<div class="write_line"></div>
												<div id="write_row1">
													<div class="col1">
														<h3> 작성자 :  <?=$usernick?></h3></div>
												</div>
												<div class="write_line"></div>
												<div id="write_row2">
													<div class="col1">
														<h5>제목</h5> </div>
													<div class="col2"><input type="text" name="subject" value="<?=$item_subject?>"></div>
												</div>
												<div class="write_line"></div>
												<div class="clear"><br></div>
												<div>
													<div style="float: left; width: 67%;">
														<div id="write_row3">
															<div class="col1">
																<h5>내용</h5> </div>
															<div class="col2"><textarea rows="7" cols="79" name="content"><?=$item_content?></textarea></div>
														</div>
													</div>
													<center>
													<div style="float: left; width: 33%";>

															<div class="write_line"></div>
															<center>
															<div id="write_row4"><br><br>

																<div class="col1"> <h4>이미지파일1 : <input type="file" name="upfile[]"></div><br></h4>


															</div>
														</center>
															<div class="clear"></div>
															<? 	if ($mode=="modify" && $item_file_0)
																{
															?>
															<div class="delete_ok">
																<?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
															<div class="clear"></div>
															<?
																}
															?>
															<div class="write_line"></div>
															<div id="write_row5">
																	<div class="col1"><h4>이미지파일2 : <input type="file" name="upfile[]"></div><br></h4>
															</div>
															<? 	if ($mode=="modify" && $item_file_1)
																{
															?>
															<div class="delete_ok">
																<?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1"> 삭제</div>																<div class="clear"></div>
																<?
																	}
																?>
															<div class="write_line"></div>
															<div class="clear"></div>
															<div id="write_row6">
															<div class="col1"> <h4>이미지파일3 : <input type="file" name="upfile[]"></div><br></h4>
														</div>
													<? 	if ($mode=="modify" && $item_file_2)
														{
													?>
													<div class="delete_ok">
														<?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제</div>
													<div class="clear"></div>
													<?
														}
													?>
													<div class="write_line"></div>
													<div class="clear"></div>
												</div>
											</center>

										</div>
									</form>
									<div>
										<br>
										<br>
										<center>
									<div id="write_button"><a href="#"><input class="button" value="작성" onclick="check_input()"></a>&nbsp;
									</div>
								</center>

								</div>
								</div>
									<!-- end of write-form -->
							<footer id="footer">
								<div class="copyright">
									&copy; Untitled Design: <a href="https://templated.co/">TEMPLATED</a>. Images: <a href="https://unsplash.com/">Unsplash</a>.
								</div>
							</footer>
					</div>
					<!-- end of inner -->
				</section>
				<!-- end of section -->
			</section>
			<!-- end of main -->
		</div>
		<!-- end of page-wrap -->
	</body>
</html>
