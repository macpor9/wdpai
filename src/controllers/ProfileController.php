<?php

require_once 'AppController.php';
require_once __DIR__."/../repository/UserRepository.php";


class ProfileController extends AppController {

    private $messages = [];
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/img/';

    private $userRepository;

    public function __construct(){
        parent::__construct();
        $this->userRepository = new UserRepository();
    }
    public function profile(){
        $this->checkLogged();

        $userLogin = $_SESSION[SESSION_KEY_USER_LOGIN];
        $user = (new UserRepository())->getUser($userLogin);
        $this->render('profile', [
            'userLogin'=> $user->getLogin(),
            'userAvatar'=>$user->getAvatarPath()
        ]);
    }

    public function settings(){
        $this->checkLogged();
        $userLogin = $_SESSION[SESSION_KEY_USER_LOGIN];
        $user = (new UserRepository())->getUser($userLogin);
        $this->render('settings', [
            'userLogin'=> $user->getLogin(),
            'userAvatar'=>$user->getAvatarPath()
        ]);
    }



    public function changeAvatar()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );
            $this->userRepository->changeAvatar($_FILES['file']['name']);

        }
        $this->settings();

    }


    public function friends(){
        $this->checkLogged();
        if($_SESSION[SESSION_KEY_USER_TYPE] != 2){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/profile");
        }

        $friends = $this->userRepository->getUsers();
        $this->render('friends',['friends' => $friends]);
    }

    public function search(){
        if(isset($_SERVER["CONTENT_TYPE"])){
            $contentType = trim($_SERVER["CONTENT_TYPE"]);
        }else
            $contentType =  '';

        if($contentType === "application/json"){
            $content = file_get_contents("php://input");
            $decoded = json_decode($content,true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->userRepository->getUserByLogin($decoded['searchLogin']));
            die();
        }

    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}