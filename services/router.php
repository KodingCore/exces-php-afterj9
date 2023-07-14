<?php

function checkRoute(string $route)
{
    $userController = new UserController();
    $categoryController = new CategoryController();

    if(isset($_SESSION["user"]))
    {
        require 'views/users/connected/_header.phtml';
        if($route === "cactegories")
        {
            $categoryController->displayAllCategories();
        }
        else if($route === "expenses")
        {
            // require "views/".$route."/".$route.".phtml";
        }
    }
    else
    {
        require 'views/users/guest/_header.phtml';
        if($route === "login")
        {
            $userController->login();
        }
        else if($route === "register")
        {
            $userController->register();
        }else{
            $userController->login();
        }
    }

    if(isset($_SESSION["user"]))
    {
        require 'views/users/connected/_footer.phtml';
    }
    else{
        require 'views/users/guest/_footer.phtml';
    }
    
}