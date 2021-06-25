<h1 class = "title_profile"> <U><b>Mon profil</b></U></h1>

<section class="presentation">
    <div class="container-description">
        Image
    </div>
    <?php foreach($data as $key => $value) { ?>
    <div class="container-description">
        <div class ="name">
            <div class="center">
                <label class="control-label" for="firstname">Votre prénom</label>
                <input id="firstname" type="text" class="input-profile" name="firstname" placeholder="Modifiez votre prénom" value="<?= $value['firstname']; ?>">
            </div>
            <div class = "center">
                <label class="control-label" for="lastname">Votre nom</label>
                <input id="lastname" type="text" class="input-profile" name="lastname" placeholder="Modifiez votre nom" value="<?= $value['lastname']; ?>">
            </div>
            <div class = "center">
                <label class="control-label" for="username">Votre pseudo</label>
                <input id="username" type="text" class="input-profile" name="username"placeholder="Modifiez votre pseudo" value="<?= $value['pseudo']; ?>">
            </div>
            <div class = "center">
                <p class="line"></p> 
            </div>
            <button type="submit" class="button-profile">Enregistrer</button>
        </div>
    </div>
    <div class="container-description">
        <div class ="description">
            <div class = "center">
                <label class="control-label" for="email">Votre e-mail (non modifiable)</label>
                <input id="email" type="email" class="input-profile" name="email" disabled="disabled" value="<?= $value['email']; ?>">
            </div>
            <div class = "center">
                <label class="control-label" for="password_profile">Votre mot de passe</label>
                <input id="password_profile" type="password" class="input-profile" name="password"placeholder="Modifiez votre mot de passe" autocomplete="new-password">
            </div>
            <div class = "center">
                <label class="control-label" for="words">Quelques mots sur vous</label>
                <textarea id="words" name="words" class="textarea-profile" placeholder="Décrivez vous en quelques mots"></textarea>
            </div>       
        </div>
    </div>
    <?php } ?>
</section>