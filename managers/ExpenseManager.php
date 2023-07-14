<?php
class ExpenseManager extends AbstractManager{
    function getAllExpenses() : array
    {
        $query = $this->db->prepare('SELECT * FROM expenses');
        $query->execute();
        $expenses = $query->fetchAll(PDO::FETCH_ASSOC);
        $expensesTab = [];
        foreach($expenses as $expense)
        {
            $expenseInstance = new Expense($expense->getName(), $expense->getAmount(), $expense->getDate());
            array_push($expensesTab, $expenseInstance);
        }
        return $expensesTab;
    }

    function insertExpense(Expense $expense) : Expense
    {
        $query = $this->db->prepare("INSERT INTO expenses(name, amount, id) VALUES(:name, :amount, :id')");
        $parameters = [
            'name' => $expense->getName(),
            'amount' => $expense->getAmount(),
            'expense_id' => $expense->getId()
        ];
        $query->execute($parameters);
        $expense = $query->fetch(PDO::FETCH_ASSOC);
        $expenseInstance = new Expense($expense->getName(), $expense->getAmount(), $expense->getDate());
        return $expenseInstance;
    }

    function deleteExpense(Expense $expense) : Expense
    {
        $query = $this->db->prepare("
            DELETE FROM `expenses`
            WHERE id = :id
        ");
        $parameters = [
            'id' => $expense->getId()
        ];
        $query->execute($parameters);
        $expense = $query->fetch(PDO::FETCH_ASSOC);
        $expenseDeleted = new Expense($expense->getName(), $expense->getAmount(), $expense->getDate());
        return $expenseDeleted;
    }
}

?>