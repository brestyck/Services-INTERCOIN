<?php
$wallet_id = $_POST["wallet_id"];
$wallet_id_enc = base64_encode($wallet_id);
if (file_exists("wallets/{$wallet_id_enc}.walletdata") == TRUE) 
{
    $money = htmlentities(file_get_contents("wallets/{$wallet_id_enc}.walletdata"));
    header("Location:lcab/index.html?wallet_id={$wallet_id}&money={$money}");
}
if (file_exists("wallets/{$wallet_id_enc}.walletdata") == FALSE)
{ 
    echo "<script>location.href=\"error.html?from=index.html\"</script>";
}
?>