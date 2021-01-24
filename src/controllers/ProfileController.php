<?php

require_once 'AppController.php';
require_once __DIR__."/../repository/UserRepository.php";


class ProfileController extends AppController {

    public function profile(){
        $this->render('profile');
    }

    public function settings(){
        $this->render('settings');
    }

    private $messages = [];
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $userRepository;

    public function __construct(){
        parent::__construct();
        $this->userRepository = new UserRepository();
    }


    public function changeAvatar1()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );



//            return $this->render('settings', ['messages' => $this->message]);
        }
        return $this->render('settings', ['messages' => $this->message]);
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

    public function friends(){
        $friends = $this->userRepository->getUsers();
        $this->render('friends',['friends' => $friends]);
    }


}