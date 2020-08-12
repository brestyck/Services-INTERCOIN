<?php

$wallet_id = $_POST["wallet_id"];
$wallet_id_enc = base64_encode($wallet_id);
if (file_exists("../actives/{$wallet_id_enc}.transaction") == TRUE){
    $actions = htmlentities(file_get_contents("../actives/{$wallet_id_enc}.transaction"));

    header("Location: ../htmls/view-actives.html?amount={$actions}");
}
else{
    echo "<script>location.href=\"../htmls/view-actives.html?amount=0\"</script>";
}
?>