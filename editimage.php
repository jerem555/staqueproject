<?php
	session_start();

	include("db.php");
	include("inc/functions.php");

	// echo '<pre>';
 	// print_r($_FILES);
 	// echo '</pre>';

 	$imageUpload=1;

if (!empty($_FILES)){

	if($_FILES['image']['error']==4){
		$imageUpload=0;
	}


	if ($imageUpload==1){



        $accepted = array("image/jpeg", "image/jpg", "image/gif", "image/png");

        $tmp_name = $_FILES['image']['tmp_name'];

        $parts = explode(".", $_FILES['image']['name']);
        $extension = end($parts);
        $filename = uniqid() . "." . $extension;
        $destination = "uploads/" . $filename;

        // Retourne le type mime
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $tmp_name);
        finfo_close($finfo);

        //mime type accepté ici ???
        if (in_array($mime, $accepted)){
            move_uploaded_file($tmp_name, $destination);

            //manipulation de l'image
            //avec SimpleImage
            require("SimpleImage.php");

            $img = new abeautifulsite\SimpleImage($destination);
            $img->thumbnail(300,300)->save("uploads/avatar/" . $filename);
            // $img->thumbnail(50,50)->save("uploads/miniature/" . $filename);
            }
        }

	}
