<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="nederlands">
    <head>
        <meta charset="utf-8">
        <meta name="google-site-verification" content="QYyjtEp_UMFf87wVDRair-rr1iHSO9zrF9ngQ8itBO8" />
        <meta name="Description" content="This website is build for me and my friends. You can post pictures and then if you have a inlog you can see it.">
        <meta name="keywords" content="Pictures, LoginOnly, Upload, Friends, een site waar wij en onze vrienden foto's posten">
        <meta name="author" content="Benjamin Venema"
        <meta name="Viewport" content="width=device-width, initial-scale=1">
        <meta lang="Netherlands">
        <title>Picture website</title>
        <link rel="stylesheet" type="text/css" href="inlogpage.css">
    </head>
    <body>

    
    </body>

    <header>
        <!-- Google Analytics -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-XXXXX-Y', 'auto');
            ga('send', 'pageview');
        </script>
        <!-- End Google Analytics -->

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
                    </div>
                    <p class="p-inlogpage">if you cant login. You cant!<br> ask the owner</p>

            </div>
        </nav>

        <div class="copyright">
            <p>&copy;2020 Bvsvenema</p>
        </div>
    </header>
