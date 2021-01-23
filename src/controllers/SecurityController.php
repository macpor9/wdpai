<?php

require_once "AppController.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__."/../repository/UserRepository.php";
require_once __DIR__."/../repository/GroupRepository.php";

Class SecurityController extends AppController {
    public function login(){


        $userRepository = new UserRepository();

        if(!$this->isPost()){
            return $this->render('login');
        }

        $login = $_POST["login"];
        $password = $_POST["password"];
        $user = $userRepository->getUser($login);

        if(!$user)
            $this->render('login', ["messages" => ["User does not exist"]]);

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