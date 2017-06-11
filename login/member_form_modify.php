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

   function check_input()
   {
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
</head>
<?
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);

    $hp = explode("-", $row[hp]);
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
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
          <li><a href="../good/list.php"><p>SALE</p></a></li>
          <li><a href="../free/list.php"><p>Board</p></a></li>
          <li><a href="../download/list.php"><p>FILE</p></a></li>
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
          <li><a href="../login/member_form_modify.php" class="active"> <p>My</p></a></li>
          <li><a href="../memo/memo.php"> <p>1-Line</p> </span></a></li>
          <li><a href="../good/list.php"><p>SALE</p></a></li>
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

        <!-- Banner -->
          <section id="banner">
            <div class="inner">
            <div class="column" style="display: block; width: 900px; margin:0 auto; position:relative;">
              <form name="member_form" method="post" action="modify.php">
                <div class="field half first">
                  <h3>회원정보수정</h3>
                  <div class="form_join" style="color: #111111">
                  <div>
                    <input type="password" name="pass" placeholder="비밀번호를 입력해주세요(필수)">
                  </div>
                  <br>
                  <input type="password" name="pass_confirm" placeholder="비밀번호 확인(필수)">
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
                  <input type="text" maxlength="4" class="hp" name="hp2" placeholder="1234" style="float: left; width:30%; color: #111111;">
                  <div style="float: left; width:5%; color: #ffffff"><h2> - </h2></div>
                  <input type="text" maxlength="4" class="hp" name="hp3" placeholder="1234" style="float: left; width:30%; color: #111111">
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

  <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.poptrox.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
  </html>
