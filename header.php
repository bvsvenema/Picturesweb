<?php
    session_start();
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
        <nav class="nav-header-main">
            <div class="header-login">
            <?php
             if(isset($_GET['error'])){
                if($_GET['error'] == "emptyfields"){
                    echo '<p class="p-error"> Fill in all fields!</p>';
                }else if ($_GET['error'] == "nouser"){
                    echo '<p class="p-error"> Wrong username or password</p>';
               }
            }
            ?>
                <form  action="includes/login.inc.php" method="post">
                 <input class="input-inlogpage" type="text" name="mailuid" placeholder="Username..."><br>
                    <input class="input-inlogpage" type="password" name="pwd" placeholder="Password..."><br>
                    <div class="flex">
                    <button class="button-inlogpage" type="submit" name="login-submit">Login</button> 
                    </form>
                    <form action="signup.php" method="post">
                        <button class="button-inlogpage" type="submit" name="signin-submit">Signup</button>
                    </form>  
                    </div>
                    <p class="p-inlogpage">if you cant login. You cant!<br> ask the owner</p>
                
            </div>
        </nav>
    </header>
