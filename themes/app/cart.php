<?php 

if (!empty($_COOKIE['cartProducts'])) {
    echo "Seu carrinho:" . $_COOKIE['cartProducts'];
} else {
    echo "Seu carrinho: Zerado, adicione produtos!";
}

?>