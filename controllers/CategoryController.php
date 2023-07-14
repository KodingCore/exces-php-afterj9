<?php
class CategoryController extends AbstractController{
    function displayAllCategories()
    {
        $categoryManager = new CategoryManager();
        $categoriesTab = $categoryManager->getAllCategories();
        $categoriesNames = [];
        foreach($categoriesTab as $category)
        {
            array_push($categoriesNames, $category->getName());
        }
        $this->render('views/categories/categories.phtml', ["categories-names" => $categoriesNames]);
    }
}

?>