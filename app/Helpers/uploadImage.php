<?php
function uploadImage($image){
    $imageName = "images/" .time() . "." . $image->extension();
    $image->move(public_path('images'), $imageName);
    return $imageName;
}

?>