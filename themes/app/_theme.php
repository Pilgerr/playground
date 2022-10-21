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
        <a class="logo" href="<?=url();?>"><img src="<?=url("assets/svg/");?>logo_play.svg" alt="Logo Play Ground" width="70px" height="70px"></a>
        <div class="mobile-menu">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
        <ul class="nav-list">
          <li><a href="<?=url();?>">Home</a></li>
          <li><a href="<?=url("sobre");?>">About</a></li>
          <li><a href="<?=url("contato");?>">Contact</a></li>
          <li><a href="<?=url("carrinho");?>">Cart</a></li>
          <li><a href="<?=url("entrar");?>">Login</a></li>
          <li><a href="<?=url("adm");?>">Adm</a></li>
        </ul>
      </nav>
    </header>
    <?= $this->section("content");?>
  <footer>
    <nav>
    <p>&copy; 2022 Company, Inc</p>
    <a class="logo" href="<?=url();?>"><img src="<?=url("assets/svg/");?>logo_play.svg" alt="Logo Play Ground" width="70px" height="70px"></a>
    <ul class="footer-list">
      <li><a href="<?=url();?>">Home</a></li>
      <li><a href="<?=url("sobre");?>">About</a></li>
      <li><a href="<?=url("contato");?>">Contact</a></li>
    </ul>
    </nav>
  </footer>
    <script src="assets/web/scripts/_theme.js"></script>
  </body>
</html>