<?php
class Expense
{
    private ?int $id;
    private string $name;
    private int $amount;
    private DateTime $date;

    public function __construct(string $name, int $amount, DateTime $date)
    {
        $this->id = null;
        $this->name = $name;
        $this->amount = $amount;
        $this->date = $date;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getAmount() : int
    {
        return $this->amount;    
    }

    public function getDate() : DateTime
    {
        return $this->date;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setName(int $name)
    {
        $this->name = $name;
    }

    public function setAmount(int $amount)
    {
        $this->amount = $amount;
    }

    public function setDate(int $date)
    {
        $this->date = $date;
    }
}




?>