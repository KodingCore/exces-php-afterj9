<?php
class CategoryManager extends AbstractManager{
    
    function getAllCategories() : array
    {
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);
        $categoriesTab = [];
        foreach($categories as $category)
        {
            $categoryInstance = new Category($category->getName(), $category->getExpenseId());
            array_push($categoriesTab, $categoryInstance);
        }
        return $categoriesTab;
    }

    function getCategories() : array
    {
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);
        $categoriesTab = [];
        foreach($categories as $category)
        {
            $categoryInstance = new Category($category->getName(), $category->getExpenseId());
            array_push($categoriesTab, $categoryInstance);
        }
        return $categoriesTab;
    }

    function insertCategory(Category $category) : Category
    {
        $query = $this->db->prepare("INSERT INTO categories(name, expense_id) VALUES(:name, :expense_id')");
        $parameters = [
            'name' => $category->getName(),
            'expense_id' => $category->getExpenseId()
        ];
        $query->execute($parameters);
        $category = $query->fetch(PDO::FETCH_ASSOC);
        $categoryInstance = new Category($category->getName(), $category->getExpenseId());
        return $categoryInstance;
    }

    function deleteCategory(Category $category) : Category
    {
        $query = $this->db->prepare("
            DELETE FROM `categories`
            WHERE id = :id
        ");
        $parameters = [
            'id' => $category->getId()
        ];
        $query->execute($parameters);
        $category = $query->fetch(PDO::FETCH_ASSOC);
        $categoryDeleted = new Category($category->getName(), $category->getExpenseId());
        return $categoryDeleted;
    }
}

?>