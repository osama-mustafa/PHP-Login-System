<?php 
    require_once "includes/header.php";
?>


    <div class="container">
        <section class="m-3">
            <div class="card text-center">
                <div class="card-header">
                    <?php 
                        if (isset($_SESSION["username"])) {
                            echo "<h4>Welcome " . $_SESSION["username"] . "</h4>";
                        } 
                    ?>
                </div>
                <div class="card-body">
                    <h2 class="card-title">Login System <span><i class="fas fa-user"></i></span></h2>
                    <h3 class="card-text m-3">
                        Made with <span><i class="fas fa-heart"></i></span> & a Lot of <i class="fas fa-coffee"></i>
                    </h3>

                </div>
                <div class="card-footer text-dark">
                    PHP | MySQL | HTML | CSS | Bootstrap | Font Awesome  
                </div>
            </div>
        </section>
    </div>



<?php 
    require "includes/footer.php";
?>
