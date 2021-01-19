<?php

require_once "AppController.php";
require_once __DIR__."/../models/User.php";

Class SecurityController extends AppController {
    public function login(){
        $user = new User("login","password","name","surname");

        if(!$this->isPost()){
            return $this->render('login');
        }

        $login = $_POST["login"];
        $password = $_POST["password"];

        if($user->getLogin() !== $login){
            return $this->render('login', ["messages" => ["User with this login does not exist"]]);
        }
        if($user->getPassword() !== $password){
            return $this->render('login', ["messages" => ["Wrong password!"]]);
        }
//        return $this->render('profile');

        $url = "http://".$_SERVER['HTTP_HOST'];
        header("Location: {$url}/profile");

    }
}