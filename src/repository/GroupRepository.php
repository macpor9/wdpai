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
            $group['group_avatar_path'],
            $group['id'],
            $group['balance'],
            $group['userCount']
        );
    }

    public function addGroup(Group $group):void {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO groups (name,group_avatar_path,id_assigned_by)
            VALUES (?,?,?)
        ');

        $id_assigned_by = $_SESSION[SESSION_KEY_USER_ID];
        $stmt->execute([
            $group->getName(),
            $group->getAvatarPath(),
            $id_assigned_by
        ]);



        $stmt = $this->database->connect()->prepare('
            INSERT INTO user_groups(id_group, id_user)
            VALUES (
                (SELECT MAX(id) FROM groups),
                :idAssignedBy
            );
        ');

        $stmt->bindValue(":idAssignedBy", $_SESSION[SESSION_KEY_USER_ID]);
        $stmt->execute();

    }

    public function changeGroupAvatar($groupName,$fileName,$groupId){
        $stmt = $this->database->connect()->prepare('
            UPDATE groups SET group_avatar_path=:filename WHERE name=:groupName and id=:groupId
        ');

        $stmt->bindParam(':filename',$fileName,PDO::PARAM_STR);
        $stmt->bindParam(':groupName',$groupName,PDO::PARAM_STR);
        $stmt->bindValue(':groupId',$groupId);
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
                $group['group_avatar_path'],
                $group['id'],
                $group['balance'],
                $group['userCount']
            );
        }

        return $result;
    }

    public function getUserGroups($idUser): array{
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM groups g 
                INNER JOIN user_groups ug on g.id=ug.id_group WHERE :idUser = ug.id_user

        ');

        $stmt->bindValue(':idUser',$idUser);

        $stmt->execute();
        $groups = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($groups as $group){
            $result[] = new Group(
                $group['name'],
                $group['group_avatar_path'],
                $group['id'],
                $group['balance'],
                $group['userCount']
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


        $stmt = $this->database->connect()->prepare('
            DELETE FROM user_groups T1
            USING   user_groups T2
            WHERE   T1.ctid < T2.ctid
            AND T1.id_group  = T2.id_group
            AND T1.id_user = T2.id_user
        ');
        $stmt->execute();

        $stmt = $this->database->connect()->prepare('
            UPDATE groups SET "userCount"= (SELECT COUNT(id_group) FROM user_groups WHERE id_group= :groupId)
        ');
        $stmt->bindValue(':groupId',$groupId);
        $stmt->execute();

    }

    public function setBalance($balance, $groupId){
        $stmt = $this->database->connect()->prepare('
            UPDATE groups SET balance=:balance WHERE id=:groupId
        ');

        $stmt->bindParam(':balance',$balance);
        $stmt->bindParam(':groupId',$groupId);
        $stmt->execute();
    }

}