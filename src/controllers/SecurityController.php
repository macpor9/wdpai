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

    public function register(){

        if (!$this->isPost()) {
            return $this->render('register');
        }

        $login = $_POST['login'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeat-password'];

        if($password != $repeatPassword)
            $this->render('register', ["messages" => ["Passwords are different!"]]);

        $user = new User($login,$password);
        $this->userRepository->register($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);


    }


}