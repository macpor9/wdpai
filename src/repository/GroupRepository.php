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
            $group['avatar_path']
        );
    }

    public function addGroup(Group $group):void {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO groups (name,avatar_path,id_assigned_by)
            VALUES (?,?,?)
        ');

        $id_assigned_by = 6;
        $stmt->execute([
            $group->getName(),
            $group->getAvatarPath(),
            $id_assigned_by
        ]);
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
                $group['avatar_path']
            );
        }

        return $result;
    }

}