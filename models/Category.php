<?php
class Category
{
    private ?int $id;
    private string $name;
    private ?int $user_id;

    public function __construct(string $name)
    {
        $this->id = null;
        $this->name = $name;
        $this->user_id = null;
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

    public function getUserId() : ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $id)
    {
        $this->id = $id;
    }
}
?>