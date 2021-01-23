<?php


class Group{
    private $name;
    private $avatar_path;




    public function __construct(string $name, string $avatar_path)
    {
        $this->name = $name;
        $this->avatar_path = $avatar_path;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
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
