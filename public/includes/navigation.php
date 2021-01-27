<div class="mobile-bar">
    <i class="fas fa-bars" onclick="onClickMenuBarIcon()"></i>
</div>
<div class="bar" ID="mainNav" >
    <div class="logo-bar">
        <img src="public/img/logo.svg">
    </div>
    <div class="menu-bar1">
        <i class="fas fa-user-circle menu-image"></i>
        <a class="menu-option menu-bar-button button" href="/profile">Profile</a>

        <i class="fas fa-layer-group menu-image"></i>
        <a class="menu-option menu-bar-button button" href="/groups">Groups</a>

        <?php if($_SESSION[SESSION_KEY_USER_TYPE] == 2) : ?>
        <i class="fas fa-user-friends menu-image"></i>
        <a class="menu-option menu-bar-button button" href="/friends">Friends</a>
        <?php endif; ?>

        <i class="fas fa-cog menu-image"></i>
        <a class="menu-option menu-bar-button button" href="/settings">Settings</a>

        <i class="fas fa-sign-out-alt menu-image"></i>
        <a class="menu-option menu-bar-button button" href="logout">Logout</a>
    </div>
</div>