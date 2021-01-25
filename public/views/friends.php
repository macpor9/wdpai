<!DOCTYPE html>
<head>
    <?php
    require __DIR__."/../includes/head.php";
    ?>
<!--    <script type="text/javascript" src ="public/js/searchUsers.js"></script>-->
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
                <div class="search-bar">
                    <input placeholder="User">
                </div>
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
                                    <span id="login"><?= $user->getLogin(); ?></span>
                                </label>
                                <button class="button" type="submit" ">remove user</button>
                            </div>
                    </form>
                    <?php  endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</body>

<template id = "user-template">
    <form class="user-container" action="removeUser" method="POST">
        <div class="img-container">
            <img class="img" src="">
        </div>
        <div class="user-data-container">
            <label class="label-class form-field">
                <span class="field-name">login</span>
                <input type="hidden" name='login' value="login"  />
                <span id="login"></span>
            </label>
            <button class="button" type="submit" ">remove user</button>
        </div>
    </form>
</template>