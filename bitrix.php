<?php
//Resize an image
$renderImage = CFile::ResizeImageGet(
    $arItem["image"],
    Array("width" => 320, "height" => 240),
    BX_RESIZE_IMAGE_EXACT, false
); 

?>