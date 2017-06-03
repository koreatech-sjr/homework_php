<?
    function getImage() {
      include "../lib/dbconn.php";

      $sql = "select * from free";
      $result = mysql_query($sql, $connect);

      $count = 0;

      while($row = mysql_fetch_array($result)) {
        $obj[$count] = (object)array('id' => $row[id], 'nick' => $row[nick], 'file_name' => $row[file_name_0]);
        $count++;
      }

      // for($i=0 ; $i<$count ; $i++) {
      //   echo $obj[$i]->id." ".$obj[$i]->nick." ".$obj[$i]->file_name."<br />";
      // }

      mysql_close();
    }

    getImage();
?>
