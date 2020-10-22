<?php
session_start();
    //if(isset($_POST['login-submit'])){
    //if (isset($_SESSION['userId']) && $_SESSION['userId'] == true){
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="Description" content="this is example of a meta discription. this will often show up in search result">
        <meta name="Vieuwport" content="widht=device-width, inital-scale=1">
        <title>Picture website</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    </body>

    <header>
        <nav>
            <div class="Menu">
                <ul class="ul-mainpage">
                    <li class="li-mainpage"><a href="mainpage.php">Home</a></li>
                    <li class="li-mainpage"><a href="#">Upload</a></li>
                    
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
        </nav>
    </header>

