<?
  if(!$userid)
{
?>
    <ul>
      <li><a href="../index.php" class="active"><!--홈--><span class="icon fa-home"></span></a></li>
      <li><a href="../login/login_form.php"><!--로그인--><span class="icon fa-user"></span></a></li>
      <li><a href="../member/member_form.php"><!--회원가입--><span class="icon fa-user-plus"></span></a></li>
      <li><a href="../memo/memo.php"><span class="icon fa-home"></span></a></li>
      <li><a href="../free/list.php"><span class="icon fa-dollar"></span></a></li>
      <li><a href="../concert/list.php"><span class="icon fa-home"></span></a></li>
      <li><a href="../download/list.php"><span class="icon fa-home"></span></a></li>
      <li><a href="../greet/list.php"><span class="icon fa-home"></span></a></li>
      <li><a href="../qna/list.php"><span class="icon fa-home"></span></a></li>
<?
}
else
{

  ?>
    <ul>
      <li><a href="../index.php" class="active"><!--홈--><span class="icon fa-home"></span></a></li>
      <li><a href="../login/logout.php"><!--로그아웃--><span class="icon fa-unlock-alt"></span></a></li>
      <li><a href="../login/member_form_modify.php"><!--정보수정--><span class="icon fa-user-secret"></span></a></li>
      <li><a href="../memo/memo.php"><span class="icon fa-home"></span></a></li>
      <li><a href="../free/list.php"><span class="icon fa-dollar"></span></a></li>
      <li><a href="../concert/list.php"><span class="icon fa-home"></span></a></li>
      <li><a href="../download/list.php"><span class="icon fa-home"></span></a></li>
      <li><a href="../greet/list.php"><span class="icon fa-home"></span></a></li>
      <li><a href="../qna/list.php"><span class="icon fa-home"></span></a></li>
  <?
}
?>
</ul>
