<?php

$wallet_id = $_POST["wallet_id"];
$amount = $_POST["amount"];
$wallet_id_enc = base64_encode($wallet_id);
$money = (int)htmlentities(file_get_contents("../../intercoin/wallets/{$wallet_id_enc}.walletdata"));
$price = (int)htmlentities(file_get_contents("../actives/exchange_cource.exdata"));
$total_price = $price * (int)$amount;
if (file_exists("../../subscribution/subs/{$wallet_id_enc}")){
    $till_time = (int)htmlentities(file_get_contents("../../subscribution/subs/{$wallet_id_enc}"));
    if (((int)date("m") + (int)date("d") + (int)date("H")) < $till_time){
        if ($money >= $total_price){
            if (file_exists("../actives/{$wallet_id_enc}.transaction") == FALSE){
                shell_exec("py buy_script.py {$wallet_id_enc} {$amount}");
                echo "<script>location.href=\"../index.php\"</script>";
            }
            if (file_exists("../actives/{$wallet_id_enc}.transaction") == TRUE){
                $amount_had = htmlentities(file_get_contents("../actives/{$wallet_id_enc}.transaction"));
                $totalamount = $amount_had + $amount;
                shell_exec("py buy_script.py {$wallet_id_enc} {$totalamount}");
                echo "<script>location.href=\"../index.php\"</script>";
            }
        }
        else{header("Location: ../../intercoin/error.html?from=../stonks/htmls/buy.html");}
    }
    else{
        echo "<script>location.href=\"../../subscribution/htmls/unable_to_enter.html\"</script>";
    }
}
else{
    echo "<script>location.href=\"../../subscribution/htmls/unable_to_enter.html\"</script>";
}
?>