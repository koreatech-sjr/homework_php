<?
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
					<li><a href="../login/login_form.php"><!--로그인--><p>Login</p></a></li>
					<li><a href="../member/member_form.php"><!--회원가입--><p>Join</p></a></li>
					<li><a href="../memo/memo.php" class="active"><p>1-Line</p></a></li>
					<li><a href="../free/list.php"><p>SALE</p></a></li>
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
					<li><a href="../memo/memo.php" class="active"> <p>1-Line</p> </span></a></li>
					<li><a href="../free/list.php"><p>SALE</p></a></li>
					<li><a href="../concert/list.php"><p>Board</p></span></a></li>
					<li><a href="../download/list.php"><p>FILE</p></a></li>
					<li><a href="../greet/list.php"><p>Anony</p></a></li>
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

							<?
							if(!$userid)
								{
									?>
                  <h1>Recommendation!!</h1>
							    <p>저희 홈페이지에 대해 건의사항을 남겨주세요!</p>
							<?
							}
							else
							{
							?>
                <h1>Recommendation!!</h1>
								<p><?=$usernick?>(Lev<?=$userlevel?>) 님 저희 홈페이지에 대해 건의사항을 남겨주세요!</p>
							<?
							}
							?>
							<ul class="actions">
								<li><a href="#1" class="button alt scrolly big">건의하기</a></li>
							</ul>
						</div>
					</section>

				<!-- Gallery -->
					<section id="1">

						<!-- Photo Galleries -->
							<div class="inner">
								<header class="special">
									<h2>한줄 게시판</h2>
								</header>
                <div id="disqus_thread"></div>
                <script>

                /**
                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                /*
                var disqus_config = function () {
                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                */
                (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://phptermproject.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
                })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
              </div>
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
					<footer id="footer">
						<div class="copyright">
							&copy; Untitled Design: <a href="https://templated.co/">TEMPLATED</a>. Images: <a href="https://unsplash.com/">Unsplash</a>.
						</div>
					</footer>
			</section>
	</div>

	<!-- Scripts -->
		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/jquery.poptrox.min.js"></script>
		<script src="../assets/js/jquery.scrolly.min.js"></script>
		<script src="../assets/js/skel.min.js"></script>
		<script src="../assets/js/util.js"></script>
		<script src="../assets/js/main.js"></script>




</body>
</html>
