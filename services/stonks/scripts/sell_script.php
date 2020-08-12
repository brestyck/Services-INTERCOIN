<?php

$wallet_id = $_POST["wallet_id"];
$amount = $_POST["amount"];
$price = (int)htmlentities(file_get_contents("../actives/exchange_cource.exdata"));
$wallet_id_enc = base64_encode($wallet_id);
$money = (int)htmlentities(file_get_contents("../../intercoin/wallets/{$wallet_id_enc}.walletdata"));
$total_price = $price * $amount;
$old_amount = htmlentities(file_get_contents("../actives/{$wallet_id_enc}.transaction"));

if($amount > $old_amount){echo "<script>location.href=\"../../intercoin/error.html?from=../stonks/htmls/sell.html\"</script>";}

else{
shell_exec("py sell_script.py {$wallet_id_enc} {$amount}");
header("Location: ../index.php");
}

?>