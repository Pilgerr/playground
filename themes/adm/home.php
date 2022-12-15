<?php $this->layout("_theme"); ?>
<link rel="stylesheet" href="<?=url("assets/adm/");?>css/home.css">

<div class="header-home">
    <h1>Dashboards</h1>
    <br>
    <p>Acompanhe resultados importantes do dia a dia de seu e-commerce!</p>
    <br>
    <a href="<?=url("adm/gerar-pdf")?>" style="color:rgb(133, 196, 255);text-decoration:underline;">Baixar relatório</a>
    <br><br>
    <hr>
    <br>
</div>
<div class="dashs">
    <h4 id="total-h4">Total de Vendas</h4>
    <h1 id="total-h1"><?=$sales?></h1>
    <form action="<?=url("adm/cadastro-venda");?>" method="post">
        <h4 id="register-h4"> Cadastro de Venda</h4>
        <br>
        <input class="input-register" type="text" placeholder="     total da compra" name="register-total">
        <input class="input-register" type="text" placeholder="              id usuario" name="register-idUser">
        <br>
        <input class="input-submit" type="submit" value="Cadastrar">
    </form>
</div>