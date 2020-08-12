<?php

$wallet_id = $_POST["wallet_id_new"];
$wallet_id_enc = base64_encode($wallet_id);
$fd = fopen("../wallets/{$wallet_id_enc}.walletdata", 'w') or die("не удалось создать файл");
fputs($fd, "0");
fclose($fd);
header("Location: ../index.html");

?>