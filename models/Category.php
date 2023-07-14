<?php
class Category
{
    private ?int $id;
    private string $name;
    private int $expense_id;

    public function __construct(string $name, int $expense_id)
    {
        $this->id = null;
        $this->name = $name;
        $this->expense_id = $expense_id;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setName(int $name)
    {
        $this->name = $name;
    }

    public function getExpenseId() : int
    {
        return $this->expense_id;
    }

    public function setExpenseId(int $id)
    {
        $this->id = $id;
    }
}
?>