<!DOCTYPE html>
<head>
    <?php
    require __DIR__."/../includes/head.php";
    ?>
    <title>groups</title>
</head>
<body>
<div class="container">
    <?php
    require __DIR__."/../includes/navigation.php";
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
                <?php
                    $number = 0;
                    foreach ($groups as $group):
                ?>
                <div class="groups-container">
                    <img src="public/img/<?= $group->getAvatarPath(); ?>">
                    <button class = "button-image" onclick=showPopup("view-group-popup<?=$number?>")><?= $group->getName(); ?></button>
                    <label class="label-class form-field">
                        <span class="field-name">group balance</span>
                        <span><?= $group->getBalance(); ?></span>
                    </label>
                    <label class="label-class form-field">
                        <span class="field-name">your balance</span>
                        <span><?= $group->getUserBalance(); ?></span>
                    </label>
                </div>
                <div class="popup-window" id="view-group-popup<?=$number?>" >
                    <div class="inner">
                        <form class="form" method="post" enctype="multipart/form-data" action="saveData">
                        <div>
                            <label class="label-class form-field">
                                <span class="field-name">groupname</span>
                                <span><?= $group->getName(); ?></span>
                            </label>
                            <div class="label-class form-field" method="post" action="addMember">
                                <span class="field-name">add user</span>
                                <input name="addLogin" type="text" placeholder="name">
                            </div>
                            <div class="label-class form-field" method="post" action="addMember">
                                <span class="field-name">set balance</span>
                                <input name="balance" type="number" placeholder="0gr">
                            </div>
                        </div>
                        <div class="groups-container">
                            <img src="public/img/<?= $group->getAvatarPath(); ?>">
                        </div>
                        <div >
                            <input type="hidden" value="<?=$group->getName(); ?>" name="group-name">
                            <input type="hidden" value="<?=$group->getId(); ?>" name="group-id">
                            <input type="file" accept=".png,.jpg,.jpeg" name="file">
                            <button class="button" type="submit">send</button>
                        </div>
                        </form>
                    </div>
                </div>
                <?php $number++; endforeach; ?>
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
<!--                --><?php
//                if(isset($messages)){
//                    foreach ($messages as $message)
//                        echo $message;
//                }
//                echo $groupName;
//                ?>
            </div>
            <input class="" type="file" accept=".png,.jpg,.jpeg" name="file">
            <button class=" button" type="submit">send</button>
        </form>
    </div>
</div>

</body>