<?php
class CategoryController extends AbstractController{
    function index()
    {
        $categoryManager = new CategoryManager();
        $categoriesTab = $categoryManager->getAllCategories();
        $this->render('views/categories/categories.phtml', ["userId" => $this->data["userId"], "categories" => $categoriesTab]);
    }

    function addCategory()
    {
        $categoryManager = new CategoryManager();
        if(isset($_POST["name"]))
        {
            $categorie = new Category($_POST["name"]);
            $categoryManager->insertCategory($categorie);
            $this->render('views/categories/categories.phtml', ["userId" => $this->data["userId"]]);
        }else{
            $this->render('views/categories/add-category.phtml', ["userId" => $this->data["userId"]]);
        }
        
        
        
    }
}

?>