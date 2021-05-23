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
                <h1 class="m-5 text-center">Sign Up</h1>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <?php 
                    if (isset($_GET["error"])) {

                        if ($_GET["error"] == "emptyInputSignup") {
                            echo "<div class='alert alert-danger'>Please Fill All Fields!</div>";

                        } elseif ($_GET["error"] == "passwordMatch") {
                            echo "<div class='alert alert-danger'>Passwords Dont Match!</div>";

                        } elseif ($_GET["error"] == "validEmail") {
                            echo "<div class='alert alert-danger'>Please Enter a Valid Email Address!</div>";

                        } elseif ($_GET["error"] == "validUsername") {
                            echo "<div class='alert alert-danger'>Please Enter a Suitable Username!<br> (Only Letters & Numbers is Allowed)</div>";

                        } else if ($_GET["error"] == "passwordLength") {
                            echo "<div class='alert alert-danger'>Password Must Be At Least 6 Charecters!</div>";

                        } elseif ($_GET["error"] == "userExists") {
                            echo "<div class='alert alert-danger'>Email Already Taken!</div>";

                        } elseif ($_GET["error"] == "stmtFaialed") {
                            echo "<div class='alert alert-danger'>Signup Failed! Please Try Again Later!</div>";

                        } elseif ($_GET["error"] == "none") {
                            echo "<div class='alert alert-success'>Your Account Created Successfully! Login In Now</div>";
                        }
                    }
                ?>

                <form action="includes/signup_process.php" method="POST" class="form login">

                    <div class="form-group">
                        <input type="text" name="username" placeholder="Username" class="form-control" autocomplete="on" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" name="email" placeholder="Email" class="form-control" autocomplete="on" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="password" name="password_repeat" placeholder="Repeat Password" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" value="Sign Up" class="btn btn-success form-control">
                    </div>

                </form>

                <p class="text--center">Already member? <a href="login.php">Log in now</a></p>

            </div>
        </div>
    </div>

</body>

<?php 
    require "includes/footer.php";
?>

