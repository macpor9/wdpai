<!DOCTYPE html>
<head>
    <?php
    require __DIR__."/../includes/head.php";
    ?>
    <title>settings</title>
</head>
<body>  
    <div class="container">
        <?php
            require __DIR__."/../includes/navigation.php";
        ?>
        <div class="right-panel">
            <div class="header">
                <i class="fas fa-user-circle menu-image"></i>
                <span class="header-text">
                    Profile
                </span>
            </div>
                
            <div class="content">
                <div class="form-container profile-container">
                    <div class="profile">
                        <div class="avatar">
                            <img src="public/img/<?=$userAvatar?>">
                        </div>
                        <label class="label-class form-field">
                            <span class="field-name">Nick</span>
                            <span><?=$userLogin ?></span>
                        </label>
                        <label class="label-class form-field">
                            <span class="field-name">Opis</span>
                            <span>opis</span>
                        </label>
                        <label class="label-class form-field">
                            <span class="field-name">Grupa</span>
                            <span>Dom 1; Dom 2</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>