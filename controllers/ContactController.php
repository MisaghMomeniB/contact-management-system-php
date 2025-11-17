<?php

require_once __DIR__ . '/../models/Contact.php';
require_once __DIR__ . '/../models/Phone.php';
require_once __DIR__ . '/../models/Email.php';

class ContactController
{
    private $contactModel;
    private $phoneModel;
    private $emailModel;

    public function __construct($pdo)
    {
        $this->contactModel = new Contact($pdo);
        $this->phoneModel = new Phone($pdo);
        $this->emailModel = new Email($pdo);
    }

    public function createContact($user_id)
    {
        $contactId = $this->contactModel->create(
            $user_id,
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['company'],
            $_POST['notes']
        );


        if (!empty($_POST['phone_number'])) {
            foreach ($_POST['phone_number'] as $i => $num) {
                if (!empty($num)) {
                    $type = $_POST['phone_type'][$i];
                    $this->phoneModel->addPhone($contactId, $type, $num);
                }
            }
        }


        if (!empty($_POST['email'])) {
            foreach ($_POST['email'] as $mail) {
                if (!empty($mail)) {
                    $this->emailModel->addEmail($contactId, $mail);
                }
            }
        }


        return $contactId;
    }

    public function getContacts($user_id)
    {
        return $this->contactModel->getAll($user_id);
    }

    public function getContact($id, $user_id)
    {
        $contact = $this->contactModel->getById($id, $user_id);
        if ($contact) {
            $contact['phones'] = $this->phoneModel->getPhones($id);
            $contact['emails'] = $this->emailModel->getEmails($id);
        }
        return $contact;
    }

    public function updateContact($id, $user_id)
    {
        $this->contactModel->update(
            $id,
            $user_id,
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['company'],
            $_POST['notes']
        );


        // Remove old phones + emails
        $this->phoneModel->deletePhones($id);
        $this->emailModel->deleteEmails($id);


        // Add new phones
        if (!empty($_POST['phone_number'])) {
            foreach ($_POST['phone_number'] as $i => $num) {
                if (!empty($num)) {
                    $type = $_POST['phone_type'][$i];
                    $this->phoneModel->addPhone($id, $type, $num);
                }
            }
        }


        // Add new emails
        if (!empty($_POST['email'])) {
            foreach ($_POST['email'] as $mail) {
                if (!empty($mail)) {
                    $this->emailModel->addEmail($id, $mail);
                }
            }
        }
    }

    public function deleteContact($id, $user_id)
    {
        return $this->contactModel->delete($id, $user_id);
    }
}
