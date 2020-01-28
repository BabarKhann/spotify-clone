<?php

class Account
{
    private $conn;
    public $errors = [];

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->errors = [];
    }

    public function login($username, $pass)
    {
        $pass = md5($pass);
        $query = mysqli_query($this->conn, "SELECT * FROM users WHERE username = '$username' AND password = '$pass'");

        if (mysqli_num_rows($query) === 1) :
            return true;
        else :
            $this->errors['login'] = Constants::$loginFailed;
            return false;
        endif;
    }

    public function register($username, $firstName, $lastName, $email, $email2, $password, $password2)
    {
        $this->validateUserName($username);
        $this->validateFirstName($firstName);
        $this->validateLastName($lastName);
        $this->validateEmails($email, $email2);
        $this->validatePasswords($password, $password2);

        if (empty($this->errors)) :
            return $this->insertUserDetails($username, $firstName, $lastName, $email, $password);
        else :
            return false;
        endif;
    }

    public function getError($error)
    {
        if (array_key_exists($error, $this->errors)) :
            return "<span class='errorMessage'>" . $this->errors[$error] . '</span>';
        else :
            $error = '';
        endif;

        // if (!in_array($error, $this->errors)) :
        //     $error = "";
        // endif;

        // return "<span class='errorMessage'>$error</span>";
    }

    private function insertUserDetails($username, $firstName, $lastName, $email, $password)
    {
        $encryptedPass = md5($password);
        $profilePic = 'assets/images/profile_pics/user.png';
        $date = date('Y-m-d');

        $query = "INSERT INTO users
                VALUES ('', '$username', '$firstName', '$lastName', '$email', '$encryptedPass', '$profilePic', '$date')";

        $result = mysqli_query($this->conn, $query);

        return $result;
    }

    private function validateUserName($username)
    {
        if (strlen($username) < 5 || strlen($username > 25)) :
            $this->errors['username'] = Constants::$userNameCharacters;
            // array_push($this->errors, "Your username must be between 5 and 25 characters");
            return;
        endif;

        $check_username = mysqli_query($this->conn, "SELECT username FROM users WHERE username = '$username'");

        if (mysqli_num_rows($check_username) != 0) :
            $this->errors['username'] = Constants::$userNameTaken;
            return;
        endif;
    }

    private function validateFirstName($value)
    {
        if (strlen($value) < 2 || strlen($value > 25)) :
            $this->errors['firstname'] = Constants::$firstNameCharacters;
            // array_push($this->errors, "Your first name must be between 2 and 25 characters");
            return;
        endif;
    }

    private function validateLastName($value)
    {
        if (strlen($value) < 2 || strlen($value > 25)) :
            $this->errors['lastname'] = Constants::$lastNameCharacters;
            // array_push($this->errors, "Your last name must be between 2 and 25 characters");
            return;
        endif;
    }

    private function validateEmails($email1, $email2)
    {
        if ($email1 !== $email2) :
            $this->errors['email'] = Constants::$emailDoNotMatch;
            // array_push($this->errors, "Your emails don't match");
            return;
        endif;

        if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) :
            $this->errors['email'] = Constants::$emailInvalid;
            // array_push($this->errors, "Email is invalid");
            return;
        endif;

        $check_email = mysqli_query($this->conn, "SELECT email FROM users WHERE email = '$email1'");

        if (mysqli_num_rows($check_email) != 0) :
            $this->errors['email'] = Constants::$emailTaken;
            return;
        endif;
    }

    private function validatePasswords($value1, $value2)
    {
        if ($value1 != $value2) :
            $this->errors['password'] = Constants::$passwordsDoNotMatch;
            // array_push($this->errors, "");
            return;
        endif;

        if (preg_match('/[^A-Za-z0-9]/', $value1)) :
            $this->errors['password'] = Constants::$passwordIsNotAlphaNumeric;
            // array_push($this->errors, "");
            return;
        endif;

        if (strlen($value1) < 5 || strlen($value1) > 20) :
            $this->errors['password'] = Constants::$passwordCharacters;
            // array_push($this->errors, "");
            return;
        endif;
    }
}