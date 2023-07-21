<?php
class UserController extends AbstractController{

    function login() : void
    {
        
        if(isset($_POST["email"], $_POST["password"]))
        {
            $password = $_POST["password"];
            $userManager = new UserManager();
            $user = $userManager->getUserByEmail($_POST["email"]);
            if($user){
                $hash = $user->getPassword();
                
                if(password_verify($password, $hash))
                {
                    $_SESSION["user_id"] = $user->getId();
                    $this->render('views/categories/categories.phtml', ["userId" => $_SESSION["user_id"]]);
                }
                else
                {
                    $this->render('views/users/login.phtml', []);
                }
            }
            else
            {
                $this->render('views/users/login.phtml', ["message" => "Utilisateur non enrégistré"]);
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
            $email = $_POST["email"];

            $username = $_POST["username"];
            
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];
            if($password === $confirm_password)
            {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $userManager = new UserManager();
                $newUser = new User($username, $email, $password);

                $response = $userManager->checkInfosExists($newUser);

                if($response != "")
                {
                    $this->render('views/users/register.phtml', ["message" => $response]);
                }
                else
                {
                    $userManager->insertUser($newUser);
                    $this->render('views/users/login.phtml', []);
                }
                
                
            }
            else
            {
                $this->render('views/users/register.phtml', ["message" => "Les password sont différents"]);
            }
        }
        else
        {
            $this->render('views/users/register.phtml', []);
        }
    }
}

?>