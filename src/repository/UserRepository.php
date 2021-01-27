<?php

require_once 'Repository.php';
require_once __DIR__.'/../../const.php';
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
            $user['password'],
            $user['id'],
            $user['avatar_path'],
            $user["user_type"]
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
                $user['id'],
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

    public function changeAvatar($avatarPath){
        $stmt = $this->database->connect()->prepare("
            UPDATE users SET avatar_path = :avatar_path WHERE (login = :login)
        ");
        $stmt->bindParam(':avatar_path', $avatarPath, PDO::PARAM_STR);
        $stmt->bindValue(':login',$_SESSION[SESSION_KEY_USER_LOGIN]);
        $stmt->execute();
    }



    public function changePassword($newPassword, $oldPassword){
        $stmt = $this->database->connect()->prepare("
            UPDATE users SET password = :newPassword WHERE (login = :login and password = :oldPassword)
        ");

        $stmt->bindValue(':login',SESSION_KEY_USER_LOGIN);
        $stmt->bindParam(':newPassword',$newPassword,PDO::PARAM_STR);
        $stmt->bindParam(':oldPassword',$oldPassword,PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getAvatarPathByLogin($login){
        $stmt = $this->database->connect()->prepare("
            SELECT avatar_path FROM users WHERE login = :login
        ");

        $stmt->bindParam(":login",$login,PDO::PARAM_STR);
        $stmt->execute();
        $path = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($path == false)
            return null;

        return $path['avatar_path'];
    }


    public function getUserByLogin(string $searchLogin){
        $searchLogin = '%'.strtolower($searchLogin).'%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE LOWER(login) LIKE :searchLogin
        ');

        $stmt->bindParam(':searchLogin',$searchLogin, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}