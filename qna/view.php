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
    $item_date    = $row[regist_day];
   $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
   $item_content = $row[content];
   $is_html      = $row[is_html];

   if ($is_html!="y")
   {
      $item_content = str_replace(" ", "&nbsp;", $item_content);
      $item_content = str_replace("\n", "<br>", $item_content);
   }

   $new_hit = $item_hit + 1;
   $sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
   mysql_query($sql, $connect);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../assets/css/main.css" />
<script>
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
            <li><a href="../good/list.php"><p>SALE</p></a></li>
            <li><a href="../free/list.php"><p>Board</p></a></li>
            <li><a href="../download/list.php"><p>FILE</p></a></li>
            <li><a href="../anony/list.php"><p>Anony</p></a></li>
            <li><a href="../qna/list.php" class="active"><p>QNA</p></a></li>
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
            <li><a href="../free/list.php"><p>Board</p></span></a></li>
            <li><a href="../download/list.php"><p>FILE</p></a></li>
            <li><a href="../anony/list.php"><p>Anony</p></a></li>
            <li><a href="../qna/list.php" class="active"><p>QNA</p></span></a></li>
      <?
   }
   ?>
   </ul>
   </nav>
   <section id="main">
      <header id="header">
         <div>Snapshot <span>by TEMPLATED</span></div>
      </header>
      <section style="margin-bottom: 30px">

      <div class="inner">
         <div id="content">

         <div id="col2">
            <h3>질문과답변</h3>
            <div id="view_comment"> &nbsp;</div>
            <!-- 질문 타이틀 작성자/ 조회수/ 시간 -->
            <div id="view_title">
               <div id="view_title1"><h4>질문제목 : <?= $item_subject ?></h4>   </div><div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>
                                     | <?= $item_date ?> </div>
            </div>
            <br>
            <!-- 질문내용 -->
            <h4>질문내용</h4><br>
            <div id="view_content" style="width:96%;
            min-height:300px;
            padding:15px;
            overflow:hidden;
            line-height:150%;
            border-bottom:solid 1px #cccccc;">
               <?= $item_content ?>
            </div>
            <br>
            <div id="view_button" style="float: right;">
                  <a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png"></a>&nbsp;
      <?
         if($userid && ($userid==$item_id) )
         {
      ?>
                  <a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>"><img src="../img/modify.png"></a>&nbsp;
                  <a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')"><img src="../img/delete.png"></a>&nbsp;
      <?
         }
      ?>
      <?
         if($userid)
         {
      ?>
                  <a href="write_form.php?table=<?=$table?>&mode=response&num=<?=$num?>&page=<?=$page?>"><img src="../img/response.png"></a>&nbsp;
                  <a href="write_form.php?table=<?=$table?>"><img src="../img/write.png"></a>
      <?
         }
      ?>
            </div>
            <div class="clear"></div>

         </div> <!-- end of col2 -->
        </div> <!-- end of content -->
      </div>

   </section>
   <footer id="footer">
      <div class="copyright">
         &copy; Untitled Design: <a href="https://templated.co/">TEMPLATED</a>. Images: <a href="https://unsplash.com/">Unsplash</a>.
      </div>
   </footer>
   </section>

</div> <!-- end of wrap -->

</body>
</html>
