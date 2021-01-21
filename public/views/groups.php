<!DOCTYPE html>
<head>
    <?php
    require "head.php";
    ?>
    <title>groups</title>
</head>
<body>
<div class="container">
    <?php
    require "navigation.php";
    ?>
    <div class="right-panel">
        <div class="header">
            <div>

            <i class="fas fa-layer-group menu-image"></i>
            <span class="header-text">
                Groups
            </span>
            </div>
        </div>
        <div class="content">
            <div>
                <button class="button" id="add-group-button" onclick="showPopup('add-group-popup')">add group</button>
            </div>
            <div class="groups-content">
                <div class="groups-container">
                    <img src="public/img/groups/red.png">
                    <button class = "button-image" onclick="showPopup('view-group-popup')">groupname</button>
                </div>
                <div class="groups-container">
                    <img src="public/img/groups/blue.png">
                    <button class = "button-image" onclick="showPopup('view-group-popup')">grpname1</button>
                </div>
                <div class="groups-container">
                    <img src="public/img/groups/purple.png">
                    <button class = "button-image" onclick="showPopup('view-group-popup')">group2</button>
                </div>
                <div class="groups-container">
                    <img src="public/img/groups/black.png">
                    <button class = "button-image" onclick="showPopup('view-group-popup')">groupname3</button>
                </div>
                <div class="groups-container">
                    <img src="public/img/groups/brown.png">
                    <button class = "button-image" onclick="showPopup('view-group-popup')">grname4</button>
                </div>
                <div class="groups-container">
                    <img src="public/img/groups/grey.png">
                    <button class = "button-image" onclick="showPopup('view-group-popup')">groupnamesdaas5</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="popup-window" id="add-group-popup" >
    <div class="inner">
        <form action="addGroup" method="POST" ENCTYPE="multipart/form-data">
            <label class="form-field label-class">
                <span class="field-name">group name</span>
                <input name="group-name" type="text">
            </label>
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach ($messages as $message)
                        echo $message;
                }
                echo $groupName;
                ?>
            </div>
            <input type="file" accept=".png,.jpg,.jpeg" name="file">
            <button type="submit">send</button>
        </form>
    </div>
</div>
<div class="popup-window" id="view-group-popup" >
    <div class="inner">
        <div>
            <label class="label-class form-field">
                <span class="field-name">groupname</span>
                <span>grupa1</span>

            </label>
        </div>
        <div class="groups-container">
            <img src="public/img/groups/red.png">

        </div>
        <div>
            <input type="file" accept=".png,.jpg,.jpeg" name="file">
        </div>
            <button type="submit">send</button>
    </div>
</div>
</body>