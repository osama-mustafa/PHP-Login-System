<?php 

require_once "db.php";
require_once "functions.php";


if (isset($_POST["submit"])) {

    $email              = $_POST["email"];
    $password           = $_POST["password"];

    if (emptyInputLogin($email, $password) != false) {
        header("Location: ../login.php?error=emptyInputLogin");
        exit();
    } 

    if (validEmail($email) != true) {
        header("Location: ../login.php?error=validEmail");
        exit();
    }

    loginUser($connection, $email);


} else {
    header("Location: ../login.php");
    exit();
}