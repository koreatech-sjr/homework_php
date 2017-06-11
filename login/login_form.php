<? session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="../assets/css/main.css" />
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
          <li><a href="../login/login_form.php" class="active"><!--로그인--><p>Login</p></a></li>
          <li><a href="../member/member_form.php"><!--회원가입--><p>Join</p></a></li>
          <li><a href="../memo/memo.php"><p>1-Line</p></a></li>
          <li><a href="../good/list.php"><p>SALE</p></a></li>
          <li><a href="../concert/list.php"><p>Board</p></a></li>
          <li><a href="../download/list.php"><p>FILE</p></a></li>
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
          <li><a href="../good/list.php"><p>SALE</p></a></li>
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
      <section id="banner">
        <div class="inner">
          <div style="margin-right: auto;">
            <h1>로그인</h1>
          </div>
        	<div id="col2" style="margin-right: 1em;">
                <form  name="member_form" method="post" action="login.php">


        		<div id="login_form">
        		     <?php // TODO: 로그인 입력 메시지 ?>
        			 <div class="clear"></div>
        			 <div id="login2">
        				<div id="id_input_button">
        					<div id="id_pw_title">

        						<ul>ID
                      <div id="id_pw_input">
                        <input type="text" name="id" class="login_input" style="color: black">
                      </div>
                    </ul>
        						<ul>PASSWORD
                      <div id="id_pw_input">
                        <input type="password" name="pass" class="login_input" style="color: black">
                      </div>
                    </ul>
        						</ul>
        					</div>

        					<div id="login_button">
                    <ul class="actions">
  										<li>&nbsp &nbsp &nbsp
                        <input value="LOGIN" class="button" type="submit"></li>
  									</ul>
        					</div>
        				</div>
        				<div class="clear"></div>

        				<div id="login_line"></div>
        				<div id="join_button"><div class="">
        				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   아직 회원이 아니십니까?
        				     <div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        				       <a href="../member/member_form.php"><h3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;회원가입</h3></a></div>
        				     </div>

        			    </div>

        		    </div> <!-- end of form_login -->

        	    </form>
      	   </div> <!-- end of col2 -->
         </div> <!-- end of inner -->
       </section> <!-- end of bannner -->
     </section>
   </div> <!-- end of wrap -->
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
