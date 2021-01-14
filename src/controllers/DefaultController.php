<?php 

require_once "AppController.php";

class DefaultController extends AppController {
    public function index(){
        //TODO display login.html
        $this->render('login');
    }
    public function register(){
        //TODO display login.html
        $this->render('register');
    }
    public function settings(){
        //TODO display login.html
        $this->render('settings');
    }
    public function profile(){
        //TODO display login.html
        $this->render('profile');
    }
    public function groups(){
        //TODO display login.html
        $this->render('groups');
    }
    public function friends(){
        //TODO display login.html
        $this->render('friends');
    }
    

}