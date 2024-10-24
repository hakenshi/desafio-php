<?php

namespace App\models;
require "Database.php";

class User
{
    public function getAllUsers()
    {
        $db = new Database();
        $statement = $db->connection->prepare("SELECT * FROM users");
        $statement->execute();
        return $statement->fetchAll();
    }

    public function getUser(int $user_id)
    {
        $db = new Database();
        $statement = $db->connection->prepare("SELECT * FROM users WHERE in_user = ?");
        $statement->execute([$user_id]);
        return $statement->fetchObject();
    }

    /**
     * @throws \Exception
     */
    public function authUser($data)
    {
        $db = new Database();
        try {
            $statement = $db->connection->prepare("SELECT * FROM users WHERE email_user = ?");
            $statement->execute([$data->email_user]);
            $user = $statement->fetch();
            if (!$user) {
                throw new \Exception("Usuário não encontrado");
            }
            if (!password_verify($data->password_user, $user["password_user"])) {
                throw new \Exception("Email ou senha incorretos");
            }
            return $user;
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function create($data)
    {
        $db = new Database();
        try {
            $statement = $db->connection->prepare("INSERT INTO users (name_user, email_user, password_user, title_user, code_user) VALUES (?, ?, ?, ?, ?)");
            $statement->execute([$data->name_user, $data->email_user, $data->password_user, $data->title_user, $data->code_user]);
            return (new User())->getUser($db->connection->lastInsertId());
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

}