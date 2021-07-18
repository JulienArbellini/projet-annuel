<h1 class = "title_profile"> <U><b>Mon profil</b></U></h1>

<section class="presentation">
    <div class="container-img">
        <?php 
            if(file_exists("../framework/img/".$_SESSION['id']."/".$_SESSION['avatar']) && isset($_SESSION['avatar'])) {
        ?>
            <img src="<?= "../framework/img/".$_SESSION['id']."/".$_SESSION['avatar'];?>" width="120" class="sz-image"/>
        <?php    
            }else {
        ?>
            <img src="../framework/img/default-avatar.jpg" width="120" class="sz-image"/>
        <?php
            }
        ?>
        <span class='avatar'>
            <form method='post' enctype='multipart/form-data'>
                <label for='file' style='margin-bottom: 0; margin-top: 5px; margin-left:20px; display: inline-flex;'>
                    <input id='file' type='file' name='file' class='' required>
                    <input type='submit' name='avatar' value='Charger'>
                </label>
            </form>
        </span>
	</div>
    
    <?php if(!empty($formErrors)):?>
				<?php foreach($formErrors as $error):?>
					<div class='error'>
						<li><?= $error ;?>
				<?php endforeach;?>
				</div>
			<?php endif;?>
				
    <?php App\Core\Form::showFormProfile($form);?>  
    
</section>