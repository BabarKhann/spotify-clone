<?php
class Account
{
    public $errors = [];

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

        if (empty($this->errors)) :
            // Insert into DB
            return true;
        else :
            return false;
        endif;
    }

    public function getError($error)
    {
        if (!array_key_exists($error, $this->errors)) :
            $error = "";
        else :
            return "<span class='errorMessage'>" . $this->errors[$error] . "</span>";
        endif;

        // if (!in_array($error, $this->errors)) :
        //     $error = "";
        // endif;

        // return "<span class='errorMessage'>$error</span>";
    }

    private function validateUserName($value)
    {
        if (strlen($value) < 5 || strlen($value > 25)) :
            $this->errors['username'] = "Your username must be between 5 and 25 characters";
            // array_push($this->errors, "Your username must be between 5 and 25 characters");
            return;
        endif;
    }

    private function validateFirstName($value)
    {
        if (strlen($value) < 2 || strlen($value > 25)) :
            $this->errors['firstname'] = 'Your first name must be between 2 and 25 characters';
            // array_push($this->errors, "Your first name must be between 2 and 25 characters");
            return;
        endif;
    }

    private function validateLastName($value)
    {
        if (strlen($value) < 2 || strlen($value > 25)) :
            $this->errors['lastname'] = 'Your Last Name must be between 2 and 25 characters';
            // array_push($this->errors, "Your last name must be between 2 and 25 characters");
            return;
        endif;
    }

    private function validateEmails($value1, $value2)
    {
        if ($value1 !== $value2) :
            $this->errors['email'] = "Your emails don't match";
            // array_push($this->errors, "Your emails don't match");
            return;
        endif;

        if (!filter_var($value1, FILTER_VALIDATE_EMAIL)) :
            $this->errors['email'] = "Email is invalid";
            // array_push($this->errors, "Email is invalid");
            return;
        endif;
    }

    private function validatePasswords($value1, $value2)
    {
        if ($value1 != $value2) :
            $this->errors['password'] = "Your passwords don't match";
            // array_push($this->errors, "");
            return;
        endif;

        if (preg_match('/[^A-Za-z0-9]/', $value1)) :
            $this->errors['password'] = "Your password can only contains numbers and letters";
            // array_push($this->errors, "");
            return;
        endif;

        if (strlen($value1) < 5 || strlen($value1)  > 20) :
            $this->errors['password'] = "Your password must be between 5 and 30 characters";
            // array_push($this->errors, "");
            return;
        endif;
    }
}
