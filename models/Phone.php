<?php

class Phone
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPhone($contact_id, $type, $number)
    {
        $sql = "INSERT INTO contact_phones (contact_id, phone_type, phone_number)
VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$contact_id, $type, $number]);
    }

    public function getPhones($contact_id)
    {
        $sql = "SELECT * FROM contact_phones WHERE contact_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$contact_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletePhones($contact_id)
    {
        $sql = "DELETE FROM contact_phones WHERE contact_id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$contact_id]);
    }
}
