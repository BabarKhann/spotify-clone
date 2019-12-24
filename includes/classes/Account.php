<?php
class Account
{
    private $errors = [];

    public function __construct()
    {
        $this->errors = [];
    }

    public function register($username, $firstName, $lastName, $email, $email2, $password, $password2)
    {
        $this->validateUserName($username);
        $this->validateFirstName($firstName);
        $this->validateLastName($lastName);
        $this->validateEmails($email, $email2);
        $this->validatePasswords($password, $password2);
    }

    private function validateUserName($value)
    {
        if (strlen($value) < 5 || strlen($value > 25)) :
            array_push($this->errors, "Your username must be between 5 and 25 characters");
            return;
        endif;
    }

    private function validateFirstName($value)
    {
    }

    private function validateLastName($value)
    {
    }

    private function validateEmails($value1, $value2)
    {
    }

    private function validatePasswords($value1, $value2)
    {
    }
}
