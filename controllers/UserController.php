<?php
class UserController extends AbstractController{

    function login() : void
    {
        
        if(isset($_POST["email"], $_POST["password"]))
        {
            $userManager = new UserManager();
            $user = $userManager->getUserByEmail($_POST["email"]);
            $isValid = password_verify($_POST["password"], $user->getPassword());
            if($isValid)
            {
                $this->render('views/categories/categories.phtml', ["user" => $user]);
            }else{
                $this->render('views/users/login.phtml', []);
            }
        }
        else
        {
            $this->render('views/users/login.phtml', []);
        }
        
    }

    function register()
    {
        if(isset($_POST['username'], $_POST["email"], $_POST["password"], $_POST["confirm_password"]))
        {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];
            if($password === $confirm_password)
            {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $userManager = new UserManager();
                $newUser = new User($email, $username, $password);
                $userManager->insertUser($newUser);
                $this->render('views/users/login.phtml', []);
            }
            else
            {
                $this->render('views/users/register.phtml', []);
            }
        }
        else
        {
            $this->render('views/users/register.phtml', []);
        }
    }
}

?>