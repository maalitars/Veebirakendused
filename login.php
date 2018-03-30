<form class="form">
    <div class="text">
        <?php echo $lang['sisene_filmimaailma']?>
    </div>
        <input type="text" name="user" placeholder='<?php echo $lang['kasutajanimi']?>'>
        <input type="password" name="password" placeholder='<?php echo $lang['salasõna']?>'>
        <div class ="button" onclick='location.href="pages/esileht.php"'>
            <t name = "login"><?php echo $lang['logi_sisse']?></t>
        </div>
        <div class ="button" id="reg" onclick='location.href="register.php"'>
            <t name="register"><?php echo $lang['registreeru']?></t>
        </div>
    <div class ="buttonen" onclick='location.href="?lang=english"'>
    </div>
    <div class ="buttonet" onclick='location.href="?lang=estonian"'>
    </div>

</form>