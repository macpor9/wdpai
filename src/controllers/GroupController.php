<?php

require_once 'AppController.php';

class GroupController extends AppController{
    public function settings(){
        $this->render('groups');
    }

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];

    public function changeGroupAvatar()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );



//            return $this->render('settings', ['messages' => $this->message]);
        }
//        return $this->render('groups', ['messages' => $this->message]);
    }

    public function addGroup(){
        $this->changeGroupAvatar();
        $groupName = $_POST['groupName'];
        $url = "http://".$_SERVER['HTTP_HOST'];
        header("Location: {$url}/groups");
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