<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <title><?= CONF_SITE_NAME; ?></title>
  <link rel="stylesheet" href="<?=url("assets/web/");?>css/_theme.css">
  <link rel="icon" href="<?=CONF_SITE_FAVICON?>">
</head>

<body>
  <header>
    <nav>
      <a class="logo" href="<?=url("app");?>"><img src="<?=url("assets/svg/");?>logo_play.svg" alt="Logo Play Ground"
          width="70px" height="70px"></a>
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <ul class="nav-list">
        <li><a href="<?=url("app");?>">Home</a></li>
        <li><a href="<?=url("sobre");?>">Sobre</a></li>
        <li><a href="<?=url("contato");?>">Contato</a></li>
          <?php if ($_SESSION['user']['adm'] == true) {
          ?>
        <li><a href="<?=url("adm");?>">Adm</a></li>
                <?php
                  }
                    ?>          
        <li>
          <div class="dropdown">
            <a href="<?=url("app");?>">
              <img src="https://i.im.ge/2022/10/21/2NeiaL.user-icon.png" alt="Ícone Usuario">
            </a>
            <div class="dropdown-content">
              <a href="<?=url("perfil");?>">
                Olá <?php if (isset($_SESSION['user']['name'])) {
                    echo $_SESSION['user']['name']."!";
                  } elseif (isset($_COOKIE['userName'])) {
                    echo $_COOKIE["userName"]."!";
                  }
                  ?>
              </a>
              <a href="<?=url("app/perfil");?>">Perfil</a>
              <a href="<?=url("app/logout");?>">Sair</a>
            </div>
          </div>
        </li>
        <li>
          <div class="dropdown">
            <a href="<?=url();?>">
              <img src="https://i.im.ge/2022/10/21/2NeUBc.cart-icon.png" alt="Ícone Carrinho de Compras">
            </a>
            <div class="dropdown-content">
              <a href="<?=url("produtos");?>"> Produtos </a>
              <a href="<?=url("carrinho");?>">Carrinho: <?php if (isset($_SESSION['cart'])) {
                    echo $_SESSION['cart']['quantity'];
                  } else {
                    echo "0";
                  }
                  ?></a>
            </div>
          </div>
        </li>
      </ul>
    </nav>
  </header>
  <?= $this->section("content");?>
  <footer>
    <nav>
      <p>&copy; 2022 Company, Inc</p>
      <a class="logo" href="<?=url("app");?>"><img src="<?=url("assets/svg/");?>logo_play.svg" alt="Logo Play Ground"
          width="70px" height="70px"></a>
      <ul class="footer-list">
        <li><a href="<?=url("app");?>">Home</a></li>
        <li><a href="<?=url("sobre");?>">Sobre</a></li>
        <li><a href="<?=url("contato");?>">Contato</a></li>
      </ul>
    </nav>
  </footer>
  <script src="assets/web/scripts/_theme.js"></script>
</body>

</html>