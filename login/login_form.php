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
        <? include "../lib/top_login1.php"; ?>
    </nav>
    <section id="main">
      <section id="banner">
        <div class="inner">
          <h1> &nbsp 로그인</h1>
        	<div id="col2">
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
</body>
</html>
