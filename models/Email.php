<?php
class Email
{
    private $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function addEmail($contact_id, $email)
    {
        $sql = "INSERT INTO contact_emails (contact_id, email)
VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$contact_id, $email]);
    }


    public function getEmails($contact_id)
    {
        $sql = "SELECT * FROM contact_emails WHERE contact_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$contact_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function deleteEmails($contact_id)
    {
        $sql = "DELETE FROM contact_emails WHERE contact_id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$contact_id]);
    }
}
