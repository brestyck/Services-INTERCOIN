<?php

$from = $_POST["your_wallet"];
$sum = $_POST["sum"];
$to = $_POST["recipient"];
$from_enc = base64_encode($from);
$to_enc = base64_encode($to);
if ($sum < 0){echo "<script>location.href=\"../error.html?from=lcab/index.html\"</script>";}
else{
    if (file_exists("../wallets/{$from_enc}.walletdata") == FALSE){header("Location: ../error.html?from=lcab/index.html");}
    if (file_exists("../wallets/{$to_enc}.walletdata") == FALSE){header("Location: ../error.html?from=lcab/index.html");}
    else{
        $from_amount = (int)htmlentities(file_get_contents("../wallets/{$from_enc}.walletdata"));
        $to_amount = (int)htmlentities(file_get_contents("../wallets/{$to_enc}.walletdata"));
        if ($sum > $from_amount){echo "<script>location.href=\"../error.html?from=lcab/index.html\"</script>";}
        else{
            $tfile = base64_encode("marlinspike");
            $old_tax = htmlentities(file_get_contents("../wallets/{$tfile}.walletdata"));
            $from_amount_new = $from_amount - (int)$sum;
            $to_amount_new = $to_amount + (int)$sum;

            $tax_file = fopen("../wallets/{$tfile}.walletdata", "w") or die("taxes weren't paid!!!");
            $fd = fopen("../wallets/{$from_enc}.walletdata", 'w') or die("не удалось создать файл");
            $fe = fopen("../wallets/{$to_enc}.walletdata", 'w') or die("не удалось создать файл");
            fputs($tax_file, $old_tax + ($sum * 0.01));
            fputs($fd, $from_amount_new);
            fputs($fe, $to_amount_new - ($sum * 0.01));
            fclose($fd);
            fclose($tax_file);
            fclose($fe);
            echo "<script>location.href=\"index.html?wallet_id={$from}&money={$from_amount_new}\"</script>";
        }
    }
}
?>