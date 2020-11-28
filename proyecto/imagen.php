<?php
class imger{
       function imaU($imagen) {
        $image = base64_decode($imagen);
        header("Content-Lenght:" . strlen($image));
        header("content-type: image/jpeg");

        echo $image;
        header("content-type: text/html");
    } 
    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

