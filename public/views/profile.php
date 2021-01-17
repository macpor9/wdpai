<!DOCTYPE html>
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/fa-icons.min.css">
    <script src = "public/js/bar.js"></script>
    <title>settings</title>
</head>
<body>  
    <div class="container">
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
               
                <i class="fas fa-user-friends menu-image"></i>
                <a class="menu-option menu-bar-button button" href="/friends">Friends</a>

                <i class="fas fa-cog menu-image"></i>
                <a class="menu-option menu-bar-button button" href="/settings">Settings</a>

                <i class="fas fa-sign-out-alt menu-image"></i>
                <a class="menu-option menu-bar-button button" href="/index">Logout</a>
            </div>
        </div>
        <div class="right-panel">
            <div class="header">
                <i class="fas fa-user-circle menu-image"></i>
                <span class="header-text">
                    Profile
                </span>
            </div>
                
            <div class="content">
                <div class="form-container profile-container">
                    <form class="profile">
                        <div class="avatar">
                            <img src="public/img/avatar.svg">
                        </div> 
                        <label>
                            <div>Nick</div>
                            <span>Jacek</span>
                        </label>
                        <label>
                            <div>Opis</div>
                            <span>opis</span>
                        </label>
                        <label>
                            <div>Grupa</div>
                            <span>Dom 1; Dom 2</span>
                        </label> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>