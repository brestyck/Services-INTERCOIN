<?php

echo "<style>body { background: #2F4F4F; }</style>";

$fd = fopen("report.txt", 'r') or die("не удалось открыть файл");
while(!feof($fd))
{
    $str = htmlentities(fgets($fd));
    echo "<h3><font color='Goldenrod'>$str</font></h3>";
}
fclose($fd);

echo "<a href='http://192.168.1.8'><font color='Yellow'>BACK!</font></a>";
?>