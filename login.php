<?php 
    require_once "includes/header.php";
    require_once "includes/functions.php";

    if (isset($_SESSION["username"])) {
        header("Location: index.php");
    }    
?>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <h1 class="m-5 text-center">Login</h1>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-6">

                <?php 
                    if (isset($_GET["error"])) {

                        if ($_GET["error"] == "emptyInputLogin") {
                            echo "<div class='alert alert-danger'>Please Fill All Fields!</div>";

                        } elseif ($_GET["error"] == "validEmail") {
                            echo "<div class='alert alert-danger'>Please Enter a Valid Email Address!</div>";

                        } elseif ($_GET["error"] == "stmtFailed") {
                            echo "<div class='alert alert-danger'>Login Failed! Please Try Again Later!</div>";

                        } elseif ($_GET["error"] == "wrongLogin") {
                            echo "<div class='alert alert-danger'>Wrong Login Information!</div>";

                        } elseif ($_GET["error"] == "noAccount") {
                            echo "<div class='alert alert-danger'>No Account with This Credentials!</div>";
                        }

                    }
                ?>
                    <form action="includes/login_process.php" method="POST">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="remember_me" class="control-group">
                            <label for="remember_me">Remember me</label><br>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" value="Log In" class="btn btn-success form-control">
                        </div>
                    </form>
                    <p class="text-center">Not a member? <a href="signup.php">Sign up now</a></p>

                </div>
            </div>
        </div>

    </body>
<?php require_once "includes/footer.php"; ?>

