<?php


class User{
    private $login;
    private $password;
    private $avatar_path;
    private $description;


    public function __construct(string $login,string $password, string $avatar_path = "default_avatar.png", string $description = "")
    {
        $this->login = $login;
        $this->password = $password;
        $this->avatar_path = $avatar_path;
        $this->description = $description;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getAvatarPath(): string
    {
        return $this->avatar_path;
    }

    public function setAvatarPath(string $avatar_path): void
    {
        $this->avatar_path = $avatar_path;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


}
