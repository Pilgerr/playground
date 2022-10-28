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
    <link rel="stylesheet" href="<?=url("assets/web/");?>css/login.css">
</head>

<body>
    <div id="box">
        <img src="https://i.im.ge/2022/08/16/OOE4hC.logo-play.png" alt=" Logo Play Ground ">
        <form action="<?=url("login")?>" method="post">
            <div class="words"> Email: </div> <br> <input type="text" name="login-email"
                placeholder="   Insira seu email" id="email"
                value="<?php if(isset($_COOKIE['user']['email'])) echo $_COOKIE['user']['email']; ?>">
            <br> <br>
            <div class="words"> Senha: </div> <br> <input type="password" name="login-password" id="password">

            <button type="button"><i class="fas fa-eye" id="eye" onclick="eye()"></i></button>

            <br><br>
            <input type="checkbox" name="login-remember" value="false">
            <span> Lembrar meu usuário </span>
            <br><br><br><br>

            <input type="submit" id="send" name="submit" value="Logar">

        </form>
    </div>
</body>
<script src="<?=url("assets/web/");?>scripts/login.js"></script>

</html>