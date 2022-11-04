<?php $this->layout("_theme"); ?>
<link rel="stylesheet" href="<?=url("assets/app/");?>css/edit-profile.css">
<main>
    <div class="profile">
        <ul class="list-profile">
            <div class="content">
            <form method="post" id="formProfile">

            <input class="input-register" type="number" name="edit-id" value="<?=$userLoged->id?>" readonly>
            <input class="input-register" type="email" name="edit-email" value="<?=$userLoged->email?>">
            <input class="input-register" type="text" name="edit-name" value="<?=$userLoged->name?>">
            <input class="input-register" type="text" name="edit-phoneNumber" value="<?=$userLoged->phoneNumber?>">
            <input class="input-register" type="text" name="edit-dtBorn" value="<?=$userLoged->dtBorn?>">
            <input class="input-register" type="text" name="edit-document" value="<?=$userLoged->document?>">
            <input class="input-register" type="file" name="edit-photo">
            <br><br><br>
            <input class="input-edit" type="submit" value="Salvar alteração">
            <?php
            if(!empty($userLoged->photo)):
                ?>
                <img src="<?= url($userLoged->photo); ?>" class="#" id="photoShow" alt="Foto Perfil">
            <?php
            endif;
            ?>
            </div>
            </form>
        </ul>
    </div>
</form>
</main>
<script type="text/javascript" async>
    const form = document.querySelector("#formProfile");
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
            if(user.type === "alert-success") {
                photoShow.setAttribute("src",user.photo);
            }
            // message.textContent = user.message;
            // message.classList.remove("alert-primary", "alert-danger");
            // message.classList.add(`${user.type}`);
        }
    });
</script>