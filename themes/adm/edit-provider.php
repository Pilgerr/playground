<?php $this->layout("_theme"); ?>
<link rel="stylesheet" href="<?=url("assets/adm/");?>css/edit-provider.css">
<main>
    <?php
            foreach ($providers as $provider){
        ?>
    <div class="providers">
        <ul class="list-providers">
            <div class="content">
            <form action="<?=url("adm/edicao-fornecedor");?>" method="post">

            <input class="input-register" type="number" name="edit-id" value="<?=$provider->id?>" readonly>
            <input class="input-register" type="text" name="edit-name" value="<?=$provider->name?>">
            <input class="input-register" type="text" name="edit-phoneNumber" value="<?=$provider->phoneNumber?>">
            <input class="input-register" type="text" name="edit-linkInstagram" value="<?=$provider->linkInstagram?>">
            <input class="input-register" type="text" name="edit-typeProduct" value="<?=$provider->typeProduct?>">
            <input class="input-edit" type="submit" value="Salvar alteração">
            </div>
            </form>
        </ul>
    </div>
    <?php
            }
        ?>
</main>