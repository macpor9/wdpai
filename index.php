<?php

require "Routing.php";

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('','DefaultController');
Routing::get('register','SecurityController');
Routing::get('profile','ProfileController');
Routing::get('friends','ProfileController');
Routing::get('groups','GroupController');
Routing::get('addGroup','GroupController');

Routing::get('settings','ProfileController');
Routing::post('login','SecurityController');
Routing::post('changeAvatar','ProfileController');

Routing::post('changeGroupAvatar','GroupController');
Routing::post('addGroup','GroupController');




Routing::run($path);
