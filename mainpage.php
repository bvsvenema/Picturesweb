
<?php
session_start();
$_SESSION['Admin'] = 1;
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

        <h1>You are in </h1>
    </body>

    <header>
        <nav>
            <div>
                <ul>
                    <li><a href="mainpage.php">Home</a></li>
                    <li><a href="#">Upload</a></li>
                </ul>
                <form action="includes/logout.inc.php">
                <button type="submit" name="logout-submit">Logout</button>
                </form>
                <?php
                   if(isset($_SESSION['Admin']) && $_SESSION['Admin'] == 1){
                        echo '<form action="signup.php">
                    <button type="submit" name="signup-submit">signup</button>
                </form>';
                    }
                ?>
                

            </div>
        </nav>
    </header>
