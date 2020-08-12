<?php

$price = htmlentities(file_get_contents("actives/exchange_cource.exdata"));

header("Location: htmls/enter.html?price={$price}");

?>