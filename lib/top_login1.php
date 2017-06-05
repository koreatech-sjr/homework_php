<style media="screen">
p {
  font-size: medium;
}
</style>
<?
  if(!$userid)
{
?>

    <ul style="width=55px; ">
      <li><a href="../index.php" class="active"><!--홈--><p>HOME</p></a></li>
      <li><a href="../login/login_form.php"><!--로그인--><p>Login</p></a></li>
      <li><a href="../member/member_form.php"><!--회원가입--><p>Join</p></a></li>
      <li><a href="../memo/memo.php"><p>1-Line</p></a></li>
      <li><a href="../free/list.php"><p>SALE</p></a></li>
      <li><a href="../concert/list.php"><span class="icon fa-home"></span></a></li>
      <li><a href="../download/list.php"><span class="icon fa-home"></span></a></li>
      <li><a href="../greet/list.php"><span class="icon fa-home"></span></a></li>
      <li><a href="../qna/list.php"><span class="icon fa-home"></span></a></li>
<?
}
else
{

  ?>
    <ul style="font-size: medium;">
      <li><a href="../index.php" class="active"><p>HOME</p></a></li>
      <li><a href="../login/logout.php"><p>LogOut</p></span></a></li>
      <li><a href="../login/member_form_modify.php"> <p>My</p></a></li>
      <li><a href="../memo/memo.php"> <p>1-Line</p> </span></a></li>
      <li><a href="../free/list.php"><p>SALE</p></a></li>
      <li><a href="../concert/list.php"><span class="icon fa-home"></span></a></li>
      <li><a href="../download/list.php"><span class="icon fa-home"></span></a></li>
      <li><a href="../greet/list.php"><span class="icon fa-home"></span></a></li>
      <li><a href="../qna/list.php"><span class="icon fa-home"></span></a></li>
  <?
}
?>
</ul>
