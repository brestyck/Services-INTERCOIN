<?php
$username = $_GET["username"];

$a = htmlentities(file_get_contents("ua.txt"));
$b = htmlentities(file_get_contents("ub.txt"));
$c = htmlentities(file_get_contents("uc.txt"));
echo "<head><meta name=\"viewport\" content=\"height=device-height,width=600,user-scalable=yes\"></head>";
echo "<h1><font color='Goldenrod'>Ответ на ваш запрос</font></h1>";
echo "<h3>Если ничего не отображается проверьте корректность введенных данных</h3>";
echo "<style>body { background: #2F4F4F; }</style>";
if ($username == $a) {
$fd = fopen("a.txt", 'r') or die("не удалось открыть файл");
while(!feof($fd))
{
    $str = htmlentities(fgets($fd));
    echo "<h2><font color='FireBrick'>$str</font></h2>";
}
fclose($fd);
}
if ($username == $b) {
$fd = fopen("b.txt", 'r') or die("не удалось открыть файл");
while(!feof($fd))
{
    $str = htmlentities(fgets($fd));
    echo "<h2><font color='FireBrick'>$str</font></h2>";
}
fclose($fd);
}
if ($username == $c) {
$fd = fopen("c.txt", 'r') or die("не удалось открыть файл");
while(!feof($fd))
{
    $str = htmlentities(fgets($fd));
    echo "<h2><font color='FireBrick'>$str</font></h2>";
}
fclose($fd);
}
?>