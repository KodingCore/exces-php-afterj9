<?php
class CategoryController extends AbstractController{
    function index()
    {
        $categoryManager = new CategoryManager();
        $categoriesTab = $categoryManager->getAllCategories();
        $this->render('views/categories/categories.phtml', ["userId" => $_SESSION["user_id"], "categories" => $categoriesTab]);
    }

    function addCategory()
    {
        $categoryManager = new CategoryManager();
        if(isset($_POST["name"]))
        {
            $categorie = new Category($_POST["name"]);
            $categoryManager->insertCategory($categorie);
            $this->render('views/categories/categories.phtml', ["userId" => $_SESSION["user_id"]]);
        }else{
            $this->render('views/categories/add-category.phtml', ["userId" => $_SESSION["user_id"]]);
        }
        
        
        
    }
}

?>