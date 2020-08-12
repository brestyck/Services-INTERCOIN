<?php
$username = $_POST["fname"];
$anonym = $_POST["anon"];
$reason = $_POST["reason"];
$guilty = $_POST["guilty"];
$contact = $_POST["contact"];
$matter = $_POST["matter"];
$fd = fopen("report.txt", 'w') or die("не удалось создать файл");
$str = "USER: $username\nAnonym: $anonym\nReason: $reason\nGuilty: $guilty\nContact: $contact\nMatter: $matter";
fwrite($fd, $str);
fclose($fd);
header("Location: thankyou.html");
?>