<?php

require_once 'AppController.php';
require_once __DIR__."/../repository/GroupRepository.php";

class GroupController extends AppController{
    public function settings(){
        $this->render('groups');
    }

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/img/';

    private $messages = [];
    private $groupRepository;

    public function __construct(){
        parent::__construct();
        $this->groupRepository = new GroupRepository();
    }


    public function addGroup()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $group = new Group($_POST['group-name'],$_FILES['file']['name'],$_POST['group-id'],0,0);
            $this->groupRepository->addGroup($group);


            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/groups");
        }


        $this->render('groups', ['messages' => $this->message]);
    }

    public function changeGroupAvatar(){

        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $groupName = $_POST['group-name'];
            $fileName = $_FILES['file']['name'];
            $groupId = $_POST['group-id'];
            $this->groupRepository->changeGroupAvatar($groupName, $fileName, $groupId);
            $groups = $this->groupRepository->getGroups();

            $this->render('groups',['groups' => $groups]);
        }

        $this->render('groups',['groups' => $groups]);
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

    public function saveData(){
        $groups = $this->groupRepository->getGroups();
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $groupName = $_POST['group-name'];
            $fileName = $_FILES['file']['name'];
            $groupId = $_POST['group-id'];
            $this->groupRepository->changeGroupAvatar($groupName, $fileName, $groupId);

        }

        $groups = $this->groupRepository->getUserGroups($_SESSION[SESSION_KEY_USER_ID]);
        if($this->isPost() && $_POST['addLogin']){
            $this->groupRepository->addMember($_POST['addLogin'],$_POST['group-id']);
        }

        if($this->isPost() && $_POST['balance']){
            $this->groupRepository->setBalance($_POST['balance'],$_POST['group-id']);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/groups");
    }

    public function addMember(){
        $groups = $this->groupRepository->getUserGroups($_SESSION[SESSION_KEY_USER_ID]);
        if($this->isPost()){
            $this->groupRepository->addMember($_POST['addLogin'],$_POST['group-id']);
        }
        $this->render('groups',['groups' => $groups]);
    }


    public function groups(){
        $groups = $this->groupRepository->getUserGroups($_SESSION[SESSION_KEY_USER_ID]);
        $this->render('groups',['groups' => $groups]);

    }


}