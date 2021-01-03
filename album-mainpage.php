<?php
    require 'includes/dbh.inc.php';
    include 'mainpage.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="Description" content="this is example of a meta discription. this will often show up in search result">
        <meta name="Viewport" content="width=device-width, initial-scale=1">
        <title>Picture websitew</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <form method="POST" action="includes/add-album.php">
            <label>Add New Album:</label><br>
            <input type="text" name="album_name" placeholder="Album name..."/>
            <label for="Date">Choose a Date:</label>
            <select name="Date" id="Date">
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            <!--- <option value="2002">2022</option>
                <option value="2002">2023</option>
                <option value="2002">2024</option>--->
            </select>
            <input type="submit" name="submit_album" value="Add"/>
        </form><br>
        

        <?php
            if(isset($_GET['add_album_action'])){
                if($_GET['add_album_action']=="successfull"){
                    echo'<br>New Album Created!<br><br>';
                }
            }
            ?>
        <section class="gallery-links">
            <div class="wrapper">
                <h2>Albums</h2>
                <div class=gallery-container"
                    <?php
                    $albums = $conn->query("SELECT * FROM gallery_albums");
                    while ($album_data = $albums->fetch_assoc()) {
                        $photos = $conn->query("SELECT * FROM gallery_photos WHERE album_id = ".$album_data['album_id']."");?>
                        <b></b> <a href='view-album.php?album_id=<?php echo $album_data['album_date'] ?>'>
                            <img class="folderimg" src="Img/Foldericon.png" alt="foldericon">
                            <p> # <?php echo $album_data['album_date']?></p>
                            <p><?php echo $album_data['album_name'] ?></p></a><br><br>
                    <?php }?>
                </div>
            </div>
        </section>
    </body>
</html>