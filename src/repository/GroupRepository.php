<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Group.php';

class GroupRepository extends Repository{
    public function getGroup(int $id): ?Group{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM groups WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $group = $stmt->fetch(PDO::FETCH_ASSOC);

        if($group == false)
            return null;

        return new Group(
            $group['name'],
            $group['avatar_path'],
            $group['id']
        );
    }

    public function addGroup(Group $group):void {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO groups (name,avatar_path,id_assigned_by)
            VALUES (?,?,?)
        ');

        $id_assigned_by = $_SESSION[SESSION_KEY_USER_ID];
        $stmt->execute([
            $group->getName(),
            $group->getAvatarPath(),
            $id_assigned_by
        ]);
    }

    public function changeGroupAvatar($groupName,$fileName,$groupId){
        $stmt = $this->database->connect()->prepare('
            UPDATE groups SET avatar_path=:filename WHERE name=:groupName and id=:groupId
        ');

        $stmt->bindParam(':filename',$fileName,PDO::PARAM_STR);
        $stmt->bindParam(':groupName',$groupName,PDO::PARAM_STR);
        $stmt->bindValue(':groupId',$groupId);
//        $stmt->bindParam(':groupId',$groupId,PDO::PARAM_INT);
        $stmt->execute();

    }

    public function getGroups(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM groups;
        ');
        $stmt->execute();
        $groups = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($groups as $group) {
            $result[] = new Group(
                $group['name'],
                $group['avatar_path'],
                $group['id']
            );
        }

        return $result;
    }

    public function getUserGroups($idUser): array{
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM groups g 
                INNER JOIN user_groups ug on g.id=ug.id_group 
                INNER JOIN users u on :idUser=u.id

        ');

        $stmt->bindValue(':idUser',$idUser);

        $stmt->execute();
        $groups = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($groups);
        foreach ($groups as $group){
            $result[] = new Group(
                $group['name'],
                $group['avatar_path'],
                $group['id_group']
            );
        }

        return $result;
    }

    public function addMember($addLogin,$groupId){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO user_groups(id_user, id_group)
            VALUES (
                (SELECT id FROM users WHERE users.login=:addLogin),
                :groupId
            );
        ');

        $stmt->bindValue(':addLogin',$addLogin);
        $stmt->bindValue(':groupId',$groupId);
        $stmt->execute();
    }

}