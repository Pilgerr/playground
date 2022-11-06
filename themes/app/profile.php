<?php $this->layout("_theme"); ?>
<link rel="stylesheet" href="<?=url("assets/app/");?>css/edit-profile.css">
<main class="main-profile">
    <div class="container-profile">
        <ul class="list-profile">
            <div class="content">
            <form method="post" id="formProfile">

            <?php
            if(!empty($userLoged->photo)){
                ?>
                <img src="<?= url($userLoged->photo); ?>" class="#" id="photoShow" alt="Foto Perfil"><br>
            <?php
            } else {
            ?>
                <img src="https://i.im.ge/2022/11/05/2vkLGY.without-photo.png" class="#" id="photoShow" alt="Foto Perfil"><br>
            <?php
            }
            ?>
            <input class="input-register" type="number" name="edit-id" value="<?=$userLoged->id?>" readonly>
            <input class="input-register" type="email" name="edit-email" value="<?=$userLoged->email?>">
            <input class="input-register" type="text" name="edit-name" value="<?=$userLoged->name?>">
            <input class="input-register" type="text" name="edit-phoneNumber" value="<?=$userLoged->phoneNumber?>">
            <input class="input-register" type="text" name="edit-dtBorn" value="<?=$userLoged->dtBorn?>">
            <input class="input-register" type="text" name="edit-document" value="<?=$userLoged->document?>">
            <input class="input-register" type="file" name="edit-photo">
            <br><br><br>
            <input class="input-edit" type="submit" value="Salvar alteração" id="input-edit">
            </div>
            </form>
        </ul>
    </div>
</form>
</main>
<script type="text/javascript" async>
    const form = document.querySelector("#formProfile");
    const input_edit = document.querySelector("#input-edit");
    form.addEventListener("submit", async (e) => {
        e.preventDefault(); //nao faz reload 
        const dataUser = new FormData(form); 
        const data = await fetch("<?= url("app/perfil");?>",{
            method: "POST",
            body: dataUser,
        });
        const user = await data.text();
        console.log(user);
        if(user) {
            if(user.type === "input-edit-success") {
                photoShow.setAttribute("src",user.photo);
            }

            input_edit.classList.remove("input-edit");
            //input_edit.classList.add(`${user.type}`);
            input_edit.classList.add("input-edit-sucess");
            input_edit.value = "Alterações realizadas!";
        }
    });
</script>