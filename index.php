<?php

require "Routing.php";

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('','DefaultController');
Routing::get('register','DefaultController');
Routing::get('profile','DefaultController');
Routing::get('friends','DefaultController');
Routing::get('groups','DefaultController');
Routing::get('addGroup','GroupController');

Routing::get('settings','ProfileController');
Routing::post('login','SecurityController');
Routing::post('changeAvatar','ProfileController');

Routing::post('changeGroupAvatar','GroupController');




Routing::run($path);
