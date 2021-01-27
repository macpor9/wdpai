<?php


class User{
    private $login;
    private $password;
    private $avatar_path;
    private $description;
    private $userTypeId;
    private $userId;


    public function __construct(string $login,string $password, $userId, string $avatar_path = "default_avatar.png",   $userTypeId = 1, string $description = "")
    {
        $this->login = $login;
        $this->password = $password;
        $this->avatar_path = $avatar_path;
        $this->userTypeId = $userTypeId;
        $this->description = $description;
        $this->userId = $userId;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getUserTypeId(){
        return $this->userTypeId;
    }

    public function getUserId(){
        return $this->userId;
    }


    public function getPassword(): string
    {
        return $this->password;
    }


    public function getAvatarPath(): string
    {
        return $this->avatar_path;
    }


    public function getDescription(): string
    {
        return $this->description;
    }



}
