<?php


class Group{
    private $name;
    private $avatar_path;
    private $id;
    private $balance;
    private $userCount;



    public function __construct(string $name, string $avatar_path, $id, $balance, $userCount)
    {
        $this->name = $name;
        $this->avatar_path = $avatar_path;
        $this->id = $id;
        $this->balance = $balance;
        $this->userCount = $userCount;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(){
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBalance(){
        return $this->balance/100;
    }

    public function getUserBalance(){
        return $this->balance/(100*$this->userCount);
    }

    public function getAvatarPath(): string
    {
        return $this->avatar_path;
    }

    public function setAvatarPath(string $avatar_path): void
    {
        $this->avatar_path = $avatar_path;
    }

}
