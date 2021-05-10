<?php
    session_start();
        if(isset($_SESSION['Admin']) && $_SESSION['Admin'] == 1){
?>
    <main>

        <head>
        <link rel="stylesheet" type="text/css" href="inlogpage.css">
        </head>

        <div class="nav-header-main">
            <section class="header-login">
                <h1 class="h1-signuppage">Signup</h1>
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == "emptyfields"){
                            echo '<p class="p-error"> Fill in all fields!</p>';
                        } else if ($_GET['error'] == "invaliduidmail"){
                            echo '<p class="p-error"> Invalid username and e-mail!</p>';
                        } else if ($_GET['error'] == "invaliduid"){
                            echo '<p class="p-error"> Invalid username!</p>';
                        } else if ($_GET['error'] == "invalidmail"){
                            echo '<p class="p-error"> Invalid E-mail!</p>';  
                        } else if ($_GET['error'] == "passwordcheck"){
                            echo '<p class="p-error"> Your password do not match!</p>';
                        } else if ($_GET['error'] == "usertaken"){
                            echo '<p class="p-error"> username is already taken!</p>';
                        }  
                    }
                ?>
                <form  action="includes/signup.inc.php" method="post"> <br>
                    <input class="input-inlogpage" type="text" name="uid" placeholder="Username"> <br>
                    <input class="input-inlogpage" type="text" name="mail" placeholder="E-mail"> <br>
                    <input class="input-inlogpage" type="Password" name="pwd" placeholder="Password"> <br>
                    <input class="input-inlogpage" type="Password" name="pwd-repeat" placeholder="Password repeat"> <br>
                    <div class="flex">
                    <button class="button-inlogpage" type="submit" name="signup-submit">Signup</button>
                </form>
                <form action="mainpage-main.php" method="post">
                    <button class="button-inlogpage" type="submit" name="index-submit">Back</button>
                </form>
                </div>
            </section>
        </div>
    </main>

<?php
    }else{
        if ((!isset($_SESSION['userUid']) && $_SESSION['userUid'] != '')){
            header("Location: ./mainpage.php");
            exit();
        }else{
            header("Location: ./index.php");  
            exit();
        }
    }
    require "footer.php"
    //1:12:44
?>