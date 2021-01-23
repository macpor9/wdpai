<!DOCTYPE html>
<head>
    <?php
    require "head.php";
    ?>
    <title>settings</title>
</head>
<body>
    <div class="container">
        <?php
        require "navigation.php";
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
                            <img src="public/img/avatar.svg">
                            <div class="change-avatar" action="changeAvatar" method="POST" ENCTYPE="multipart/form-data">


<!--                                <input name="Change Avatar" type="file">-->
                                <button  class="button-image" onclick="showPopup('change-avatar-popup')">change avatar</button>
                            </div>


                        </div>


                        <form>
                            <label class="form-field">
                                <span class="field-name">Old password</span>
                                <input class="field-value" name="Old password" type="password">
                            </label>
                            <label class="form-field">
                                <span class="field-name">New password</span>
                                <input class="field-value" name="New password" type="password">
                            </label>
                            <label class="form-field">
                                <span class="field-name">Repeat password</span>
                                <input class="field-value" name="Repeat password" type="password">
                            </label>
                            <span class="menu-option menu-bar-button button" >save</span>
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
