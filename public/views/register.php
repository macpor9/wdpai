<!DOCTYPE html>
<head>
    <?php
    require __DIR__."/../includes/head.php";
    ?>
    <script src = "public/js/passwordValidation.js" defer></script>
    <title>register</title>
</head>
<body>  
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="form-container register-container">
            <form class="register-form input-form" action="register" method="POST">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <label class="form-field">
                    <span class="field-name-form">login</span>
                    <input name="login" type="text">
                </label> 
                <label class="form-field">
                    <span class="field-name-form">password</span>
                    <input name="password" type="text">
                </label>
                <label class="form-field" id="rPassword">
                    <span class="field-name-form">repeat password</span>
                    <input name="repeat-password" type="text">
                </label>
                
                <div class="button-container">
                    <button class="menu-option menu-bar-button button" type="submit" ">Sign up</button>
                </div>
            </form>
        </div>
    </div>
</body>