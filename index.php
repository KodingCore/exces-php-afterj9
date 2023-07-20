<?php
require 'services/router.php';

require 'models/Category.php';
require 'models/Expense.php';
require 'models/User.php';

require 'managers/AbstractManager.php';
require 'managers/CategoryManager.php';
require 'managers/ExpenseManager.php';
require 'managers/UserManager.php';

require 'controllers/AbstractController.php';
require 'controllers/CategoryController.php';
require 'controllers/ExpenseController.php';
require 'controllers/UserController.php';

session_start();
$_SESSION['user'] = null;
if(isset($_GET["route"]))
{
    $route = $_GET["route"];
    checkRoute($route);
}
else
{
    checkRoute("");
}

?>