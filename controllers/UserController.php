<?php

class UserController
{
    private PDO $db;

    public function __construct()
    {
        $dbName = "if0_42155221_sport_2000";
        $port = 3306;
        $username = "if0_42155221";
        $password = "k1a6KJh54pvOEj";
        try {
            $this->setDb(new PDO("mysql:host=sql301.infinityfree.com;dbname=$dbName;port=$port;charset=utf8mb4", $username, $password));
        } catch (PDOException $error) {
            echo "<p style='color: red'>{$error->getMessage()}</p>";
        }
    }

    public function getDb(): PDO
    {
        return $this->db;
    }

    public function setDb(PDO $db): self
    {
        $this->db = $db;
        return $this;
    }

    public function create(User $user)
    {
        $req = $this->getDb()->prepare("INSERT INTO `users` (email, password) VALUES (?, ?)");
        $req->execute([$user->getEmail(), password_hash($user->getPassword(), PASSWORD_DEFAULT)]);
    }

    public function getByEmail(string $email): User
    {
        $req = $this->getDb()->prepare("SELECT * FROM `users` WHERE email = ?");
        $req->execute([$email]);
        $data = $req->fetch();
        return new User($data);
    }
}
