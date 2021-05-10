<?php
session_start();
    //if(isset($_POST['login-submit'])){
    //if (isset($_SESSION['userId']) && $_SESSION['userId'] == true){
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="Description" content="This website is build for me and my friends. You can post pictures and then if you have a inlog you can see it.">
        <meta name="keywords" content="Pictures, LoginOnly, Upload, Friends">
        <meta name="author" content="Benjamin Venema"
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Picture website</title>
        <link rel="stylesheet" type="text/css" href="mainpage.css">
    </head>
    <body>
    </body>

    <header>
        <nav>
            <div class="deskoponly">
            <div class="Menu">
                <ul class="ul-mainpage">
                    <li class="li-mainpage"><a href="mainpage-main.php">Home</a></li>
                    <li class="li-mainpage"><a href="album-mainpage.php">Folders</a></li>
                    
                <form action="includes/logout.inc.php">
                <button class="button-menubar" type="submit" name="logout-submit">Logout</button>
                </form>
                <?php
                   if(isset($_SESSION['Admin']) && $_SESSION['Admin'] == 1){
                        echo '<form action="signup.php">
                    <button class="button-menubar" type="submit" name="signup-submit">Signup</button>
                </form>';
                   }
                ?>
                </ul>
                   
            </div>
            </div>

            <div class="mobile-only">
                <div class="topnav">
                    <a href="mainpage-main.php" class="active">Logo</a>
                    <div id="mylinks">
                        <a href="mainpage-main.php">Home</a>
                        <a href="album-mainpage.php">Folders</a>
                        <form action="includes/logout.inc.php">
                            <a href="includes/logout.inc.php">Logout</a>
                            <input type="hidden" name="logout-submit" value="Logout">
                        </form>
                        <form action="signup.php">
                            <a href="signup.php">Signup</a>
                            <input type="hidden" name="signup-submit" value="Signup">
                        </form>
                    </div>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>

                <script>
                    function myFunction() {
                        var x = document.getElementById("myLinks");
                        if (x.style.display === "block") {
                            x.style.display = "none";
                        } else {
                            x.style.display = "block";
                        }
                    }
                </script>
            </div>
    </header>

