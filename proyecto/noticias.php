<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of noticias
 *
 * @author ira3ck
 */
include 'mySQLphpClass.php';

class noticias {

    function enHome($cant) {
        $conn = new mySQLphpClass();
        $result = $conn->get_noticias($cant);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {

                echo "<div class='nota' onclick='noticia(01)'><div class='row no-gutters'>
                      <div class='col-12'><h2>" . $row["Título"] . "</h2></div></div>
                      <div class='row no-gutters'><div class='col-lg-5'>
                      <img src='https://pbs.twimg.com/media/EgvGhYbXYAA2Ean?format=png&name=small' class='notaIMG'/>
                      </div><div class='col-lg-7 p-2'><div class='row no-gutters' style='height: 90%;'>
                      <p>" . $row["Descripción"] . "</p></div><div class='row no-gutters'>
                      <div class='col'><p class='autor'>" . $row["Nombre_Rep"] . " - " . $row["fechaPublicado"] .
                      "</p></div></div></div></div></div>";
            }
        } else {
            echo "0 results";
        }
    }

}
