<?
    function getInfo() {
      include "../lib/dbconn.php";

      $sql = "select * from free";
      $result = mysql_query($sql, $connect);

      $count = 0;

      while($row = mysql_fetch_array($result)) {
        $obj[$count] = (object)array('id' => $row[id], 'name' => $row[name], 'nick' => $row[nick],
        'subject' => $row[subject], 'content' => $row[content], 'regist_day' => $row[regist_day],
        'hit' => $row[hit], 'is_html' => $row[is_html], 'file_name_0' => $row[file_name_0],
        'file_name_1' => $row[file_name_1], 'file_name_2' => $row[file_name_2], 'file_name_3' => $row[file_name_3], 'file_name_4' => $row[file_name_4],
        'file_copied_0' => $row[file_copied_0], 'file_copied_1' => $row[file_copied_1], 'file_copied_2' => $row[file_copied_2],
        'file_copied_3' => $row[file_copied_3], 'file_copied_4' => $row[file_copied_4]);
        $count++;
      }

      for($i=0 ; $i<$count ; $i++) {
        echo $obj[$i]->id." ".$obj[$i]->nick." ".$obj[$i]->file_name."<br />";
      }

      mysql_close();

      return $obj;
    }

    getImage();
?>
