<!DOCTYPE html>
<head>
    <?php
    require __DIR__."/../includes/head.php";
    ?>
    <title>friends</title>
</head>
<body>  
    <div class="container">
        <?php
        require __DIR__."/../includes/navigation.php";
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
                    <form class="user-container" action="removeUser" method="POST">
                            <div class="img-container">
                                <img class="img" src="public/img/<?= $user->getAvatarPath(); ?>">
                            </div>
                            <div class="user-data-container">
                                <label class="label-class form-field">
                                    <span class="field-name">login</span>
                                    <input type="hidden" name='login' value="<?= $user->getLogin(); ?>"  />
                                    <span><?= $user->getLogin(); ?></span>
                                </label>
                                <button class="button" type="submit" ">remove user</button>
                            </div>
                            <div>

                            </div>

                    </form>
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