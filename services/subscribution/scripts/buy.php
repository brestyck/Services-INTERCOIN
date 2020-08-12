<?php

$wallet_id_enc = base64_encode($_POST["wallet_id"]);
$money = htmlentities(file_get_contents("../../intercoin/wallets/{$wallet_id_enc}.walletdata"));
$sub_type = $_POST["type"];
if (file_exists("../../intercoin/wallets/{$wallet_id_enc}.walletdata") == FALSE){
    header("Location: ../../intercoin/error.html?from=../subscribution/htmls/buy.html");
} else{
    if ($sub_type == "basic"){
        $price = 4000;
        $end_time = (int)date("m") + (int)date("d") + (int)date("H") + 4;
    } elseif ($sub_type == "normal"){
        $price = 7000;
        $end_time = (int)date("m") + (int)date("d") + (int)date("H") + 6;
    } elseif ($sub_type == "pro"){
        $price = 10000;
        $end_time = (int)date("m") + (int)date("d") + (int)date("H") + 12;
    }
    if ($end_time > (int)date("m") + (int)date("d") + 23){
        $end_time = (int)date("m") + (int)date("d") + 23;
    }
    if ($price <= $money){
        $sub_file = fopen("../subs/{$wallet_id_enc}", "w");
        fputs($sub_file, $end_time);
        fclose($sub_file);
        $m_file = fopen("../../intercoin/wallets/{$wallet_id_enc}.walletdata", "w");
        fputs($m_file, (int)$money - (int)$price);
        fclose($m_file);
        echo "<script>location.href=\"../../index.html\"</script>";
    }
    else{
        echo "<script>location.href=\"../../intercoin/error.html?from=../subscribution/htmls/buy.html\"</script>";
    }
}
?>