<?php

function checkRoute(string $route)
{
    $userController = new UserController();
    $categoryController = new CategoryController();

    
        if($route === "cactegories")
        {
            $categoryController->index();
        }
        else if($route === "add-category")
        {
            $categoryController->addCategory();
        }
        else if($route === "expenses")
        {
            // require "views/".$route."/".$route.".phtml";
        }else if($route === "login")
        {
            $userController->login();
        }
        else if($route === "register")
        {
            $userController->register();
        }else if($route === "account"){

        }else{
            $userController->login();
        }

}