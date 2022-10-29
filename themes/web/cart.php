<?php $this->layout("_theme",[ "products" => $products ]);

if (isset($_SESSION['cart']) && isset($_SESSION['cartItem'])) {
    foreach ($_SESSION['cartItem'] as $key => $value) {
        echo '<br><p>Nome: '.$value['name']. ' | Quantidade: '.$value['quantity']. ' | Preço: '.$value['price']*$value['quantity']. ' | Id: '.$value['id']. '</p>';
    } 
    echo '<br><p>Quantidade de itens no carrinho: '.$_SESSION['cart']['quantity']. ' | Valor total: R$ '.$_SESSION['cart']['total']. '</p><br>';
} else {
    echo '<br><p>Carrinho vazio!</p><br>';
}
?>
<hr>
<br>
<p>
<a href="<?=url("logout")?>" style="text-decoration: underline;">Limpar carrinho</a>
</p>
<br>
<?php
?>