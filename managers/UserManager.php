<?php
class UserManager extends AbstractManager{
    function getAllUsers() : array
    {
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        $usersTab = [];
        foreach($users as $user)
        {
            $userInstance = new User($user["id"], $user["username"], $user["email"], $user["password"]);
            array_push($usersTab, $userInstance);
        }
        return $usersTab;
    }

    function checkInfosExists(User $userTest) : string
    {
        $message = "";

        $query = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $parameters = [
            "email" => $userTest->getEmail()
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user)
        {
            return "Email déjà utilisé";
        }
        $query = $this->db->prepare('SELECT * FROM users WHERE username = :username');
        $parameters = [
            "username" => $userTest->getUsername()
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user)
        {
            return "Username déjà utilisé";
        }

        return "";
    }

    function getUserByEmail(string $email) : ? User
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $parameters = [
            'email' => $email
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user)
        {
            $userInstance = new User($user["username"], $user["email"], $user["password"]);
            $userInstance->setId($user["id"]);
            return $userInstance;
        }
        else{
            return null;
        }
        
    }

    function insertUser(User $user) : void
    {
        $query = $this->db->prepare("INSERT INTO users(username, email, password) VALUES(:username, :email, :password)");
        $parameters = [
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword()
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
    }

    function deleteUser(User $user) : void
    {
        $query = $this->db->prepare("
            DELETE FROM `users`
            WHERE id = :id
        ");
        $parameters = [
            'id' => $user->getId()
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
    }
}

?>