<!DOCTYPE html>
<head>
    <?php
    require "head.php";
    ?>
    <title>friends</title>
</head>
<body>  
    <div class="container">
        <?php
        require "navigation.php";
        ?>
        <div class="right-panel">
            <div class="header">
                <i class="fas fa-user-friends menu-image"></i>
                <span class="header-text">
                    Friends
                </span>
            </div>
            <div class="content">
<!--                <div class="friends-content">-->
                <div class="user-list-container">
                    <?php
                    foreach ($friends as $user):
                    ?>
                    <div class="user-container">
                            <div class="img-container">
                                <img class="img" src="public/img/<?= $user->getAvatarPath(); ?>">
                            </div>
                            <div class="user-data-container">
                                <?= $user->getLogin(); ?>
                                <?= $user->getPassword(); ?>
                                <?= $user->getDescription(); ?>
                            </div>

                    </div>
                    <?php  endforeach; ?>
                </div>
<!--                    <div class="friend-container">-->
<!--                        <img src="public/img/friends/1.svg">-->
<!--                        <a class="text">nickname</a>-->
<!--                    </div>-->
<!--                    <div class="friend-container">-->
<!--                        <img src="public/img/friends/2.svg">-->
<!--                    </div>-->
<!--                    <div class="friend-container">-->
<!--                        <img src="public/img/friends/3.svg">-->
<!--                    </div>-->
<!--                    <div class="friend-container">-->
<!--                        <img src="public/img/friends/4.svg">-->
<!--                    </div>-->
<!--                    <div class="friend-container">-->
<!--                        <img src="public/img/friends/5.svg">-->
<!--                    </div>-->
<!--                    <div class="friend-container">-->
<!--                        <img src="public/img/friends/6.svg">-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</body>