<!DOCTYPE html>
<head>
    <?php
    require __DIR__."/../includes/head.php";
    ?>
    <title>login</title>
</head>
<body>  
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="form-container input-form">
            <div class = "messages">
                <?php
                if(isset($messages)){
                    foreach ($messages as $message)
                    echo $message;
                }
                    ?>
            </div>
            <form action="login" method="POST">
                <label class="form-field">
                    <span class="field-name-form">login</span>
                    <input name="login" type="text">
                </label> 
                <label class="form-field">
                    <span class="field-name-form">password</span>
                    <input name="password" type="password">
                </label>
    
                <div class="button-container">
                    <input class="menu-option menu-bar-button button" type="submit" value="Login">
                    <form action="registerHref" method="GET">
                        <input class="menu-option menu-bar-button button" type="submit" value="Sign up">
                    </form>
                </div>
                    
            </form>
        </div>
    </div>
</body>