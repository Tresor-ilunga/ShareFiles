<?php

if(isset($_FILES['image']) && $_FILES['image']['error'] === 0){

    // Est-ce que l'image est trop lourde
    if($_FILES['image']['size'] <= 3000000){

        $informationImage = pathinfo($_FILES['image']['name']);
        $extentionImage = $informationImage['extension'];
        $extentionArray = ['png', 'gif', 'jpg', 'jpeg'];

        // Verifier si l'extension de l'image est dans le tableau
        if(in_array($extentionImage, $extentionArray))
        {
            $newImageName = time().rand().rand().'.'.$extentionImage;
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$newImageName);
            $send = true;
        }
    }
}