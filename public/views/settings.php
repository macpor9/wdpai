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
                <i class="fas fa-cog menu-image"></i>
                <span class="header-text">
                    Settings
                </span>
            </div>
            <div class="content">
                <div class="form-container profile-container">
                    <div class="profile-form avatar-form">
                        <div class="avatar">
                            <img src="public/img/<?=$userAvatar?>">
                            <div class="change-avatar" action="changeAvatar" method="POST" ENCTYPE="multipart/form-data">
                                <button  class="button-image" onclick="showPopup('change-avatar-popup')">change avatar</button>
                            </div>
                        </div>
                        <form class="change-password-form" action="changePassword" method="POST">
                            <label class="form-field">
                                <span class="field-name">Old password</span>
                                <input class="field-value" name="oldPassword" type="password">
                            </label>
                            <label class="form-field">
                                <span class="field-name">New password</span>
                                <input class="field-value" name="password" type="password">
                            </label>
                            <label class="form-field">
                                <span class="field-name">Repeat password</span>
                                <input class="field-value" name="repeatPassword" type="password">
                            </label>
                            <button type="submit" class="menu-option menu-bar-button button">save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="popup-window" id="change-avatar-popup" >
    <div class="inner">
        <form action="changeAvatar" method="POST" ENCTYPE="multipart/form-data">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach ($messages as $message)
                        echo $message;
                }
                ?>
            </div>
            <input type="file" accept=".png,.jpg,.jpeg" name="file">
            <button class="button" type="submit">send</button>
        </form>
    </div>
</div>
</body>
