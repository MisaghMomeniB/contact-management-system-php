<?php

class Contact
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($user_id, $first, $last, $company, $notes)
    {
        $sql = "INSERT INTO contacts (user_id, first_name, last_name, company, notes)
VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id, $first, $last, $company, $notes]);
        return $this->pdo->lastInsertId();
    }

    public function getAll($user_id)
    {
        $sql = "SELECT * FROM contacts WHERE user_id = ? ORDER BY first_name";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id, $user_id)
    {
        $sql = "SELECT * FROM contacts WHERE id = ? AND user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id, $user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $user_id, $first, $last, $company, $notes)
    {
        $sql = "UPDATE contacts SET first_name=?, last_name=?, company=?, notes=?
WHERE id=? AND user_id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$first, $last, $company, $notes, $id, $user_id]);
    }

    public function delete($id, $user_id)
    {
        $sql = "DELETE FROM contacts WHERE id = ? AND user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id, $user_id]);
    }
}
