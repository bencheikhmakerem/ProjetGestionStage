<?php

 session_start();
    if(isset($_SESSION['user'])){
        
            require_once('ConnexionWithBD.php');
            
            $idUser=isset($_GET['iduser'])?$_GET['iduser']:0;

            $requete="delete from utilisateur where iduser=?";
            
            $params=array($iduser);
            
            $result=$pdo->prepare($req);
            
            $result->execute($params);
            
            header('location:users.php');   
            
     }else {
                header('location: index.php');
        }
    

?>

