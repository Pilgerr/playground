<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title><?=CONF_SITE_NAME?></title>
    <link rel="icon" href="<?=CONF_SITE_FAVICON?>">
    <link rel="stylesheet" href="<?=url("assets/web/css/");?>register-user.css">
</head>

<body>
    <div id="box">
        <img src="https://i.im.ge/2022/08/16/OOE4hC.logo-play.png" alt="Logo Play Ground">
        <form action="<?=url("cadastro-usuario");?>" method="post">
            <div class="words"> Email: </div> <br> <input type="email" name="register-email" class="input-data" id="register-email"
                placeholder="   Insira seu melhor email" 
                value="<?php if(isset($_POST['register-email'])) echo $_POST['register-email']; ?>">
            <br> <br>
            <div class="words"> Nome completo: </div> <br> <input type="text" name="register-name" class="input-data"
                placeholder="   Primeiro e último nome"
                value="<?php if(isset($_POST['register-name'])) echo $_POST['register-name']; ?>">
            <br> <br>
            <div class="words"> Número de telefone: </div> <br> <input oninput="phone(this)" t type="text"
                name="register-phoneNumber" class="input-data" placeholder="   DDD Número"
                value="<?php if(isset($_POST['register-phoneNumber'])) echo $_POST['register-phoneNumber']; 
                             else echo "+55 ()"?>">
            <br> <br>
            <div class="words"> Senha: </div> <br> <input type="password" name="register-password"
                id="register-password" class="input-data">

            <button id="btn-eye" type="button"><i class="fas fa-eye" id="eye" onclick="eye()"></i></button>

            <br><br>

            <div class="words"> Data de nascimento: </div> <br> <input type="date" name="register-dtBorn"
                class="input-data" placeholder="   Insira seu usuario"
                value="<?php if(isset($_POST['register-dtBorn'])) echo $_POST['register-dtBorn']; ?>">
            <br> <br>

            <div class="words"> CPF: </div> <br> <input oninput="cpf(this)" type="text" name="register-document"
                class="input-data" placeholder="   Insira seu CPF"
                value="<?php if(isset($_POST['register-document'])) echo $_POST['register-document']; ?>">
            <br> <br>

            <br>
            <input type="submit" value="Cadastrar" id="btn-register">
        </form>
    </div>
</body>
<script src="<?=url("assets/web/");?>scripts/register-user.js"></script>
</html>