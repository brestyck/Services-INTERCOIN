<?php

$name = $_POST["addr"];
$flname = $_POST["flname"];
$note = $_POST["note"];

$fd = fopen("u{$flname}", 'w') or die("не удалось создать файл");
fwrite($fd, $name);
fclose($fd);

$fd = fopen("{$flname}", 'w') or die("не удалось создать файл");
fwrite($fd, $note);
fclose($fd);

header("Location: thankyou.html");
?>