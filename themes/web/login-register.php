<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title><?=CONF_SITE_NAME?></title>
    <link rel="icon" href="<?=CONF_SITE_FAVICON?>">
    <link rel="stylesheet" href="<?=url("assets/web/");?>css/login-register.css">
</head>

<body>
    <div id="box">
        <a href="<?=url();?>"><img src="https://i.im.ge/2022/08/16/OOE4hC.logo-play.png" alt=" Logo Play Ground "> </a>

        <div id="login">
            <a href="<?=url("login");?>">Login</a>
        </div>
        <div id="register">
            <a href="<?=url("cadastro-usuario");?>">Cadastre-se</a>
        </div>
    </div>
</body>

</html>