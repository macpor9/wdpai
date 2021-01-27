<?php 

require_once "AppController.php";

class DefaultController extends AppController {
    public function index(){
        $this->checkLogged(false);
        $this->render('login');
    }
    public function register(){
        $this->checkLogged(false);
        $this->render('register');
    }
    public function settings(){
        $this->checkLogged();
        $this->render('settings');
    }
    public function friends(){
        $this->checkLogged();
        $this->render('friends');
    }

    

}