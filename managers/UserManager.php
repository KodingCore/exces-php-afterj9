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
            $userInstance = new User($user->getEmail(), $user->getUsername(), $user->getPassword());
            array_push($usersTab, $userInstance);
        }
        return $usersTab;
    }

    function getUserByEmail(string $email) : User
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $parameters = [
            'email' => $email
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return new User($user["email"], $user["username"], $user["password"]);
    }

    function insertUser(User $user) : void
    {
        $query = $this->db->prepare("INSERT INTO users(username, email, password) VALUES(:username, :email, :password)");
        $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $parameters = [
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $password
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