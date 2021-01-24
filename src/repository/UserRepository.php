<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository{
    public function getUser(string $login): ?User{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE login = :login
        ');
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false)
            return null;

        return new User(
            $user['login'],
            $user['password']
        );
    }

    public function getUsers(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users ;
        ');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            $result[] = new User(
                $user['login'],
                $user['password'],
                $user['avatar_path'],
            );
        }

        return $result;
    }


    public function register($user): void{
        $stmt = $this->database->connect()->prepare(
          "INSERT INTO users (login,password,description,avatar_path)
                 VALUES (?,?,?,?)
                 "
        );

        $stmt->execute([
            $user->getLogin(),
            $user->getPassword(),
            $user->getDescription(),
            $user->getAvatarPath()
        ]);
    }

    public function removeUser($login){
        $stmt = $this->database->connect()->prepare("
            DELETE FROM users WHERE (login = :login)
        ");

        $stmt->bindValue(':login',$login);


        $stmt->execute();
    }




}