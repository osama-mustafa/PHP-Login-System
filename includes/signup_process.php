<?php 

require_once "db.php";
require_once "functions.php";

if (isset($_POST["submit"])) {

    $username           = $_POST["username"];
    $email              = $_POST["email"];
    $password           = $_POST["password"];
    $repeatedPassword   = $_POST["password_repeat"];

    if (emptyInputSignup($username, $email, $password, $repeatedPassword) !== false) {
        header("location: ../signup.php?error=emptyInputSignup");
        exit();
    } 

    if (validUsername($username) != false) {
        header("Location: ../signup.php?error=validUsername");
        exit();
    }

    if (validEmail($email) == false) {
        header("Location: ../signup.php?error=validEmail");
        exit();
    }

    if (passwordLength($password) != false) {
        header("Location: ../signup.php?error=passwordLength");
        exit();
    }

    if (passwordMatch($password, $repeatedPassword) != false) {
        header("Location: ../signup.php?error=passwordMatch");
        exit();
    }

    if (userExists($connection, $email) != false) {
        header("Location: ../signup.php?error=userExists");
        exit();
    }

    if (createUser($connection, $username, $email, $password) != false) {
        header("location: ../signup.php?error=none");
        exit();
    };

} else {
    header("location: ../index.php");
    exit();
}