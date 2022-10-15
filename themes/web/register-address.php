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
    <link rel="stylesheet" href="<?=url("assets/web/");?>css/register-address.css">
</head>

<body>
    <div id="box">
        <img src="https://i.im.ge/2022/08/16/OOE4hC.logo-play.png" alt=" Logo Play Ground ">
        <form action="<?=url("cadastro-endereco");?>" method="post">
            <div class="words"> Rua: </div> <br> <input type="text" name="register-street" class="input-data"
                placeholder="   Insira o nome da sua rua"
                value="<?php if(isset($_POST['register-street'])) echo $_POST['register-street']; ?>">
            <br> <br>
            <div class="words"> Número: </div> <br> <input type="number" name="register-number" class="input-data"
                placeholder="   Insira o número da sua rua"
                value="<?php if(isset($_POST['register-number'])) echo $_POST['register-number']; ?>">
            <br> <br>
            <div class="words"> Complemento: </div> <br> <input type="text" name="register-complement"
                class="input-data" placeholder="   Casa? Apartamento?"
                value="<?php if(isset($_POST['register-complement'])) echo $_POST['register-complement']; ?>">
            <br> <br>
            <div class="words"> Cidade: </div> <br> <input type="text" name="register-city" class="input-data"
                placeholder="   Insira sua cidade"
                value="<?php if(isset($_POST['register-city'])) echo $_POST['register-city']; ?>">
            <br> <br>
            <div class="words"> Estado: </div> <br> <select name="register-state" class="input-data"
            value="<?php if(isset($_POST['register-state'])) echo $_POST['register-state']; ?>">
                <option value=""></option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>
            <br> <br>
            <div class="words"> CEP: </div> <br> <input oninput="cep(this)" type="text" name="register-zipCode"
                class="input-data"
                value="<?php if(isset($_POST['register-zipCode'])) echo $_POST['register-zipCode']; ?>">
            <br> <br>

            <br>
            <input type="submit" value="Cadastrar" id="btn-register">
        </form>
    </div>
</body>
<script src="<?=url("assets/web/");?>scripts/register-address.js"></script>

</html>