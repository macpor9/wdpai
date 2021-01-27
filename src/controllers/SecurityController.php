<?php

require_once "AppController.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__."/../repository/UserRepository.php";
require_once __DIR__."/../repository/GroupRepository.php";

Class SecurityController extends AppController {


    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login(){
        $this->checkLogged(false);
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
            $this->render('login', ["messages" => ["User with this login does not exist"]]);
        }

        if($user->getPassword() !== hash("sha512",$password)){
            $this->render('login', ["messages" => ["Wrong password!"]]);
        }


        $_SESSION[SESSION_KEY_IS_LOGGED] = true;
        $_SESSION[SESSION_KEY_USER_LOGIN] = $user->getLogin();
        $_SESSION[SESSION_KEY_USER_TYPE] = $user->getUserTypeId();
        $_SESSION[SESSION_KEY_USER_ID] = $user->getUserId();
        $url = "http://".$_SERVER['HTTP_HOST'];
        header("Location: {$url}/profile");

    }

    public function changePassword(){
        if($this->isPost() and $_POST['password'] == $_POST['repeatPassword']){
            $this->userRepository->changePassword(hash('sha512',$_POST['password']),hash('sha512',$_POST['oldPassword']));
            $this->render('settings', ['messages' => $this->message]);
        }
        $this->render('settings', ['messages' => $this->message]);
    }

    public function register(){
        $this->checkLogged(false);

        if (!$this->isPost()) {
            $this->render('register');
        }

        $login = $_POST['login'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeat-password'];

        if($password != $repeatPassword)
            $this->render('register', ["messages" => ["Passwords are different!"]]);

        $user = new User($login,hash("sha512",$password), $_SESSION[SESSION_KEY_USER_ID]);
        $this->userRepository->register($user);

        $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);


    }

    public function logout(){
        $_SESSION[SESSION_KEY_IS_LOGGED] = false;

        session_unset();
        session_destroy();


        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }

    public function removeUser(){
        if(!$this->isPost()){
            $this->render('friends');
        }

        $login = $_POST['login'];
        $this->userRepository->removeUser($login);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/friends");
    }

    public function register_href(){
        $this->render('register');
}


}