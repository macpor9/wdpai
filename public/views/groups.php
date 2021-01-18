<!DOCTYPE html>
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/fa-icons.min.css">
    <title>groups</title>
</head>
<body>  
    <div class="container">
        <div class="bar">
            <div class="logo-bar">
               <img src="public/img/logo.svg">
            </div>
            <div class="menu-bar1">
                <i class="fas fa-user-circle menu-image"></i>
                <a class="menu-option menu-bar-button button" href="file:///G:/studia/Aplikacje%20Internetowe/docker/public/views/profile.html">Profile</a>
                
                <i class="fas fa-layer-group menu-image"></i>
                <a class="menu-option menu-bar-button button" href="file:///G:/studia/Aplikacje%20Internetowe/docker/public/views/groups.html">Groups</a>
               
                <i class="fas fa-user-friends menu-image"></i>
                <a class="menu-option menu-bar-button button" href="file:///G:/studia/Aplikacje%20Internetowe/docker/public/views/friends.html">Friends</a>

                <i class="fas fa-cog menu-image"></i>
                <a class="menu-option menu-bar-button button" href="file:///G:/studia/Aplikacje%20Internetowe/docker/public/views/settings.html">Settings</a>  

                <i class="fas fa-sign-out-alt menu-image"></i>
                <a class="menu-option menu-bar-button button" href="#">Logout</a>
            </div>
        </div>
        <div class="right-panel">
            <div class="header">
                <i class="fas fa-layer-group menu-image"></i>
                <span class="header-text">
                    Groups
                </span>
            </div>
                
            <div class="content">
                <div class="form-container profile-container">
                    <form class="profile-form">
                        <div class="avatar">
                            <img src="public/img/avatar.svg">
                            <div class="change-avatar">change avatar</div>
                        </div> 
                        <label>
                            <div>Old password</div>
                            <input name="Old password" type="password">
                        </label>
                        <label>
                            <div>New password</div>
                            <input name="New password" type="password">
                        </label>
                        <label>
                            <div>Repeat password</div>
                            <input name="Repeat password" type="password">
                        </label> 
                        <a class="menu-option menu-bar-button button">change password</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>