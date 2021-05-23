<?php  

/************ 
 Signup Part
*************/

function emptyInputSignup($username, $email, $password, $repeatedPassword) {
    $result = null;
    if (empty($username) || empty($email) || empty($password) || empty($repeatedPassword)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function passwordMatch($password, $repeatedPassword) {
    $result = null;
    if ($password !== $repeatedPassword) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function validEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function validUsername($username) {
    $result = preg_match('/^[a-zA-Z0-9]+$/', $username);
    if (!$result) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function passwordLength($password) {
    $result = null;
    if (strlen($password) < 6) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function userExists($connection, $email) {
    $query = "SELECT * FROM users WHERE email = ?;";
    $stmt  = mysqli_stmt_init($connection);
    mysqli_stmt_prepare($stmt, $query); 
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $count = mysqli_stmt_num_rows($stmt);
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}


function createUser($connection, $username, $email, $password) {
    $query  = "INSERT INTO users (username, email, password) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (mysqli_stmt_prepare($stmt, $query)) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_store_result($stmt);
        mysqli_stmt_close($stmt);
        $result = true;

    } else {
        $result = false;
    }
    return $result;
}


/************ 
 Login Part
 ************/

function emptyInputLogin( $email, $password) {
    $result = null;
    if (empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function loginUser($connection, $email) {
    $query  = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../login.php?error=stmtFailed");
        exit();
    } else {

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            if (password_verify($_POST["password"], $row["password"])) {
                session_start();
                $_SESSION["id"]         = $row["id"];
                $_SESSION["username"]   = $row["username"];
                $_SESSION["email"]      = $row["email"];    

            } else {
                header("location: ../login.php?error=wrongLogin");
                exit();
            }

            if (!empty($_POST["remember_me"])) {
                $month = time() + 3600 * 24 * 30;
                setcookie("user_id", $row["id"], $month, "/");
                setcookie("username", $row["username"], $month, "/");
                setcookie("active", 1, $month);
            } else {
                if (isset($_COOKIE["user_id"])) {
                    setcookie("user_id", "");
                } 

                if (isset($_COOKIE["username"])) {
                    setcookie("username", "");
                }
            }

        } else {
            header("location: ../login.php?error=noAccount");
            exit();

        }
         
        mysqli_stmt_close($stmt);
        header("location: ../index.php");
        exit();
        
    }

}
