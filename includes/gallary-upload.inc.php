<?php

if(isset($_POST['submit'])){

    $newFileName = $_POST['filename'];
    if(empty($fileName)){
        $newFileName = "gallery";
    } else {
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }
    $imageTitle = $_POST['filetitle'];
    $imageDesc = $_POST['filedesc'];
    $albumId = $_POST['albumid'];
    
    $file = $_FILES['file'];

    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    $fileExt = explode(".", $fileName);
    $fileActuelExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpge", "png", "mp4", "JPG");

    if(in_array($fileActuelExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 2000000000){
                $imageFullName = $newFileName . "." . uniqid("", true, ) . "." . $fileActuelExt;
                $fileDestination = "../Img/Gallery/" . $imageFullName;

                include_once "dbh.inc.php";

                if(empty($imageTitle) || empty($imageDesc)){
                    header("Location: ../mainpage.php?upload=empty");
                    exit();
                } else {
                    $sql = "SELECT * FROM gallery_photos;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        echo "SQL statement failed! 1";
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result  = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);
                        $setImageOrder = $rowCount + 1;

                        $sql = "INSERT INTO gallery_photos (albumId, titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES (?,?, ?, ?, ?);";
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            echo "SQL statement failed! 2";
                        } else {
                            mysqli_stmt_bind_param($stmt, "sssss", $albumId, $imageTitle, $imageDesc, $imageFullName, $setImageOrder);
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($fileTempName, $fileDestination);

                            header("Location: ../view-album.php");
                        }
                    }
                }
            }else{
                echo "file is to big";
                exit();
            }
        }else{
           echo "you had an error!";
           exit(); 
        }
    }else {
        echo "you need to upload a proper file type!";
        exit();
    }
}