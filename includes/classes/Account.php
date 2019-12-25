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
        if (strlen($value) < 2 || strlen($value > 25)) :
            array_push($this->errors, "Your first name must be between 2 and 25 characters");
            return;
        endif;
    }

    private function validateLastName($value)
    {
        if (strlen($value) < 2 || strlen($value > 25)) :
            array_push($this->errors, "Your last name must be between 2 and 25 characters");
            return;
        endif;
    }

    private function validateEmails($value1, $value2)
    {
        if ($value1 !== $value2) :
            array_push($this->errors, "Your emails don't match");
        endif;

        if (!filter_var($value1, FILTER_VALIDATE_EMAIL)) :
            array_push($this->errors, "Email is invalid");
            return;
        endif;
    }

    private function validatePasswords($value1, $value2)
    {
        if ($value1 !== $value2) :
            array_push($this->errors, "Your passwords don't match");
            return;
        endif;

        if (preg_match('/[^A-Za-z0-9]/', $value1)) :
            array_push($this->errors, "Your password can only contains numbers and letters");
            return;
        endif;

        if (strlen($value1) < 5 || strlen($value1 > 20)) :
            array_push($this->errors, "Your password must be between 5 and 30 characters");
            return;
        endif;
    }
}
