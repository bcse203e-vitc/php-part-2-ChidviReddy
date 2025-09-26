<?php
class PasswordException extends Exception {}

function validatePassword($password) {
    if (strlen($password) < 8) {
        throw new PasswordException("Password must be at least 8 characters long");
    }

    if (!preg_match("/[A-Z]/", $password)) {
        throw new PasswordException("Password must contain at least one uppercase letter");
    }

    if (!preg_match("/[0-9]/", $password)) {
        throw new PasswordException("Password must contain at least one digit");
    }

    if (!preg_match("/[@#$%]/", $password)) {
        throw new PasswordException("Password must contain at least one special character (@, #, $, %)");
    }

    return true;
}

$passwords = ["helloWorld", "Test1234", "Strong@123", "weakpass"];

foreach ($passwords as $pwd) {
    echo "<b>Testing:</b> $pwd <br>";
    try {
        if (validatePassword($pwd)) {
            echo "Password is valid<br><br>";
        }
    } catch (PasswordException $e) {
        echo "Error: " . $e->getMessage() . "<br><br>";
    }
}
?>
