<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title><?= CONF_SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?=url("assets/web/");?>css/cart.css">
    <link rel="icon" href="<?=CONF_SITE_FAVICON?>">
</head>

<body class="body-cart">

    <div class="div-search">
        <form action="" method="get">
            <input type="text" placeholder="   Pesquise seu item" class="input-filter" name="busca"
                value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>">
            <button class="btn-filter" type="submit"><img src="https://i.im.ge/2022/09/16/1OPBhM.filter.png"
                    alt="Filtro" width="20px" height="20px" id="img-filter"></button>
        </form>
    </div>
    <main class="main-cart">
        <?php
         if (!isset($_GET['busca']) || empty($_GET['busca'])) {
            if (!empty($products)) {
                foreach ($products as $product){
                    if ($product->available == "on") {
        ?>
        <div class="products">
            <img src="<?=$product->image?>" alt="<?=$product->name?>" width="100px" height="100px"
                class="img-product"><br>
            <h6 class="price-product">R$ <?=$product->price?></h6>
            <div class="div-red-product">
                <h6><a href="<?=url("produtos/{$product->id}");?>"><?=$product->name?></a></h6>
            </div>
        </div>
        <?php 
        }
        }
        }
        elseif (empty($products)) {
        ?>
        <h1 class="h1-error">Nenhum produto disponível!</h1>
        <?php 
            }
        } else {
            if (!empty($products)) {
                foreach ($products as $product){
                    if ($product->available == "on" && $product->name == $_GET['busca']) {
        ?>
        <div class="products">
            <img src="<?=$product->image?>" alt="<?=$product->name?>" width="100px" height="100px"
                class="img-product"><br>
            <h6 class="price-product">R$ <?=$product->price?></h6>
            <div class="div-red-product">
                <h6><a href="<?=url("produtos/{$product->id}");?>"><?=$product->name?></a></h6>
            </div>
        </div>
        <?php
        } 
        }
        }
        elseif (empty($products)) {
            ?>
            <h1 class="h1-error">Nenhum produto encontrado!</h1>
            <?php 
        }
        }
        ?>
    </main>
</body>

</html>