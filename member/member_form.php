<?
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../assets/css/main.css" />
<link href="../css/member.css" rel="stylesheet" type="text/css" media="all">
<script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value !=
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";

      document.member_form.id.focus();

      return;
   }
</script>
<style media="screen">
	input::-webkit-input-placeholder { color:#111111 }
</style>
</head>

<body>
	<div class="page-wrap">

		<!-- nav -->
			<nav id="nav">
					<? include "../lib/top_login1.php"; ?>
			</nav>
		<!-- Main -->
			<section id="main">
				<!-- Banner -->
					<section id="banner">
						<div class="inner">
						<div class="column" style="display: block; width: 900px; margin:0 auto; position:relative;">
							<form name="member_form" method="post" action="insert.php">
								<div class="field half first">
									<h3>회원가입</h3>
									<div class="form_join" style="color: #111111">
									<div id="id1" style="float: left; width:80%;">
										<input type="text" name="id" placeholder="ID를 입력해주세요" style="width: 240pt">
									</div>
									<div id="id2" style="float: left; width:20%;">
										<a href="#">
											<img src="../img/check_id.gif" onclick="check_id()">
										</a>
										<br><br>
									</div>
									<div>
										<input type="password" name="pass" placeholder="비밀번호를 입력해주세요">
									</div>
									<br>
									<input type="password" name="pass_confirm" placeholder="비밀번호를 다시 입력해주세요">
									<br>
									<input type="text" name="name"  placeholder="이름을 입력해주세요">
									<br>
									<input type="text" name="nick"  placeholder="닉네임을 입력해주세요">
									<br>
									<select class="hp" name="hp1" style="float: left; width:30%; color: #111111">
		             		<option value='010' style="color: #111111;">010</option>
		             		<option value='011' style="color: #111111;">011</option>
		             		<option value='016' style="color: #111111;">016</option>
		             		<option value='017' style="color: #111111;">017</option>
		             		<option value='018' style="color: #111111;">018</option>
		             		<option value='019' style="color: #111111;">019</option>
            			</select>
									<div style="float: left; width:5%; color: #ffffff"><h2> - </h2></div>
									<input type="text" maxlength="4" class="hp" name="hp2" style="float: left; width:30%; color: #111111;">
									<div style="float: left; width:5%; color: #ffffff"><h2> - </h2></div>
									<input type="text" maxlength="4" class="hp" name="hp3" style="float: left; width:30%; color: #111111">
									<input type="text" id="email1" name="email1" placeholder="kadamon2007@gmail.com">
									</div>
								</div>
								<div id="button">
									<a href="#"><img src="../img/button_save.gif"  onclick="check_input()"></a>&nbsp;&nbsp;
								  <a href="#"><img src="../img/button_reset.gif" onclick="reset_form()"></a>
								</div>
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

</script>
<!-- Scripts -->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/jquery.poptrox.min.js"></script>
	<script src="../assets/js/jquery.scrolly.min.js"></script>
	<script src="../assets/js/skel.min.js"></script>
	<script src="../assets/js/util.js"></script>
	<script src="../assets/js/main.js"></script>
<!--End of Tawk.to Script-->
</body>
</html>
