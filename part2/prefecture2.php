<?php
  $PrefectureList = ["서울특별시","부산광역시","대구광역시","울산광역시",
                    "광주광역시","대전광역시","인천광역시","세종특별자치도"];
  $html = "<SELECT name=\"prefecture\" >\n";
  for($i = 0; $i < count($PrefectureList); $i++){
    $html .= "<OPTION value=\"%i\">$PrefectureList[$i]</OPTION>\n";
  }
  $html .= "</SELECT>\n";
  print $html

?>
