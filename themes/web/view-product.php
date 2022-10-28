<?php $this->layout("_theme",[ "products" => $products ])?>
<link rel="stylesheet" href="<?=url("assets/web/");?>css/view-product.css">

<body class="body-view">
    <main class="main-view">
        <?php
            foreach ($products as $product){
        ?>
        <div class="products">
            <img src="<?=$product->image?>" alt="<?=$product->name?>" width="200px" height="200px" class="img-product">
        </div>
        <div class="info-products">
            <h1 class="titles-product"><?=$product->name?></h1>
            <h4 class="titles-product"><?=$product->description?></h4>
            <h2 class="titles-product">R$ <?=$product->price?></h2>
            <form action="<?=url("app/carrinho")?>" method="post">
            <a href="<?=url("app/carrinho")?>" class="a-buy">
                <svg viewBox="0 0 32 24" aria-labelledby="pdpBasketIcon pdpBasketDesc" width="25" height="15"
                    fill="#fff" class="src__BasketUI-sc-1cpjf6b-0 hynVVk" class="svg-buy">
                    <path fill="inherit"
                        d="M0 0l.5 2.2h4l4.3 15.6h18.8L32 2.2h-2.6l-3.8 13.1H10.7L6.3 0H0zm13.9 19.5c-1.2 0-2.2 1-2.2 2.2 0 1.2 1 2.2 2.2 2.2 1.2 0 2.2-1 2.2-2.2 0-1.2-1-2.2-2.2-2.2zm8.4 0c-1.2 0-2.2 1-2.2 2.2 0 1.2 1 2.2 2.2 2.2 1.2 0 2.2-1 2.2-2.2 0-1.2-1-2.2-2.2-2.2z">
                    </path>
                </svg>
                <span class="span-buy">Comprar</span>
            </a>
            </form>
        </div>
        <?php
            }
        ?>
    </main>
</body>