<?php
    require "dbh.inc.php";

    $album = $_POST['album_name'];
    $date  = $_POST['Date'];
    if(isset($_POST['submit_album'])){
        if(empty($album)){
            header("Location: ../album-mainpage.php?upload=empty");

        }else{
            $add_album = $conn->query("INSERT INTO gallery_albums (album_name, album_date) VALUES ('$album', '$date')");
            if($add_album){
                header("location: ../album-mainpage.php?add_album_action=Successfull");
            } else {
                echo $conn-error;
            }
        }
    }
