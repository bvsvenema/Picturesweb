<?php 

require "includes/dbh.inc.php";
include 'mainpage.php';

    if(isset($_GET['album_id'])){
        $album_id = $_GET['album_id'];
        $get_album = $conn->query("SELECT * FROM gallery_albums WHERE album_id = $album_id");
        $album_data = $get_album->fetch_assoc();
    }else{
        header("location: mainpage.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="Description" content="this is example of a meta discription. this will often show up in search result">
        <meta name="Viewport" content="width=device-width, initial-scale=1">
        <title>Picture website</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <?php
            $photo_count = $conn->query("SELECT * FROM gallery_photos WHERE album_id = $album_id")
        ?>
    </body>

    <!---<header>
        <nav>
            <div class="Menu">
                <ul class="ul-mainpage">
                    <li class="li-mainpage"><a href="mainpage.php">Home</a></li>
                    <li class="li-mainpage"><a href="#">Upload</a></li>
                    
                <form action="includes/logout.inc.php">
                <button class="button-menubar" type="submit" name="logout-submit">Logout</button>
                </form>
                <?php/*
                   if(isset($_SESSION['Admin']) && $_SESSION['Admin'] == 1){
                        echo '<form action="includes/signup.php">
                    <button class="button-menubar" type="submit" name="signup-submit">Signup</button>
                </form>';
                   }
                */?>
                </ul>
            </div>
        </nav>   
    </header>--->

    <main>
        <section class="gallery-links">
            <div class="wrapper">
                <h2 class="gallery-title">Gallery  <?php echo $album_data['album_name']?></h2>
                 <div class="gallery-container">
                 <?php
                include_once 'includes/dbh.inc.php';

                $sql = "SELECT * FROM gallery_photos WHERE albumId=?  ORDER BY orderGallery DESC";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo "SQL statement failed";
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $album_id);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    while($row = mysqli_fetch_assoc($result)){
                        echo'<a href="#">
                        <div style="background-image: url(Img/Gallery/'.$row["imgFullNameGallery"].');"></div>
                        <h3>'.$row["titleGallery"].'</h3>
                        <p>'.$row["descGallery"].'</p>
                    </a>';
                    }
                }

            
                    ?>
                 </div>   
            <?php if(isset($_SESSION['Admin']) && $_SESSION['Admin'] == 1){ ?>
                <div class="gallery-upload">
                    <div class="gallery-upload-form">
                        <form action="includes/gallary-upload.inc.php" method="POST" enctype="multipart/form-data"> <br>
                        <h2>Upload to <?php echo $album_data['album_name']?> </h2> <br>
                            <input type="hidden" name="albumid" value="<?php echo $album_id; ?>">
                            <input class="input-form" type="text" name="filename" placeholder="File name..."> <br>
                            <input class="input-form" type="text" name="filetitle" placeholder="Image title..."> <br>
                            <input class="input-form" type="text" name="filedesc" placeholder="Image description..."> <br>
                            <input class="input-from-file" type="file" name="file">
                            <button type="submit" name="submit">Upload</button>
                        </div>
                        </form>
                    </div> 
                </div>
            <?php } ?>
        </section>
    </main>
</html>    