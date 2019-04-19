<?php

// connect to database
mysql_connect("localhost","rjzinger","rubyred");
mysql_select_db("rjzinger");

// if first time calling this php file, use first pic
// else use value entered from form
$fileId = 1; 
if(isset($_POST['img_fileId'])) $fileId = $_POST['img_fileId'];
// ----- display list of files available by fileId -----
$query = "SELECT fileId, name, size, type FROM upload";
$result  = mysql_query ($query);

// display list
while ($row = mysql_fetch_assoc($result)) 
{
  echo "<p>" . $row['fileId'] . ' ' . $row['name'] . 
    ' ' . $row['size'] . ' ' . $row['type'] . "</p>";
}
echo "<form method='post' action='fileDownload.php' >";
echo "<input name='img_fileId' type='text'>";
echo "<input type='submit' value='Submit'>";
echo "</form>";
$query = "SELECT name, size, content, type 
  FROM upload WHERE fileId=$fileId";
$result  = mysql_query ($query);
$name    = mysql_result($result, 0, "name");
$size    = mysql_result($result, 0, "size");
$type    = mysql_result($result, 0, "type");
$content = mysql_result($result, 0, "content");
// Header( "Content-type: $type");
// print $content;
echo "<img height='auto' wfileIdth='50%'
  src='data:image/jpeg;base64," 
  . base64_encode($content) . "'>";

?>