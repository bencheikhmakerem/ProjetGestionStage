<?php
    try {

        $pdo = new PDO("mysql:host=localhost;dbname=APPLIETUDIANT",
            "root", "");

    }catch (Exception $e){
        die('Impossible de se connecter à la base ' . $e->getMessage());

    }
?>