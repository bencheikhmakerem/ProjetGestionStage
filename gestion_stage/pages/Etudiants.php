<?php
    //Pour se connecter à la BD
    //l'objet PDO nous permet de se connercter à la BD
    try {
        $maBase= new PDO("mysql:host=localhost;dbname=APPLIETUDIANT","root", "");
    }catch (Exception $e){
        die('Impossible de se connecter à la base ' . $e->getMessage());
    }

    //requete qui selectionne tous les étudiants de la BD
    $req = "select * from ETUDIANT";
    $etudiants = $maBase->query($req);
    
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Gestion des filière</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
   
    </head>

    <body>
        <?php include("menu.php"); ?>
        
        <!-- Container pour centraliser -->
        <div class="container-fluid"> 
            
            <!-- Partie recherche -->
            <div class="panel panel-default">
                <div class="panel-heading"> Recherche </div>
                <div class="panel-body"> 
                    <form method="post" action="Etudiants.php" class="form-inline">
                        <div class="form-group"> 
                            <input type="text" class="form-control" placeholder="Nom, Prenom">
                        </div>
                            <button type="submit" class=" btn btn-default"> 
                                <span class="glyphicon glyphicon-filter" style="font-size:13px; "></span> Filtrer
                            </button> 
                        
                    </form>
                
                </div>
            </div>
            
            <!-- Partie liste des étudiants -->
            <div class="panel panel-default">
                <div class="panel-heading"> Liste des étudiants</div>
                <div class="panel-body"> 
                    <table class="table table-hover">
                        <!--l'entête du tableau -->
                        <thead>
                            <tr>
                                <th> Numéro etudiant </th>
                                <th> Nom </th>
                                <th> Prenom </th>
                                <th> Date de naissance </th>
                                <th> Année d'études </th>
                                <th> Modifier</th>
                                <th> Supprimer</th>
                                
                            </tr>
                        </thead>
                        <!--le corps tableau -->
                        <tbody> 
                                <!-- parcourir et afficher le tableau d'étudiants -->
                                <?php while ($tabEtudiants=$etudiants->fetch()){ ?>
                                    <tr>
                                        <td><?php echo $tabEtudiants['NumEtudiant'] ?> </td>
                                        <td><?php echo $tabEtudiants['Nom'] ?> </td>
                                        <td><?php echo $tabEtudiants['Prenom'] ?> </td> 
                                        <td><?php echo $tabEtudiants['DateNaissance'] ?> </td> 
                                        <td><?php echo $tabEtudiants['AnneeEtude'] ?> </td> 
                                        <td><a href="ModifierEtudiant.php">
                                                <span class="glyphicon glyphicon-pencil" style="font-size:15px;"></span>
                                            </a>    
                                        </td> 
                                        <td>
                                            <a onclick='return confirm ("Confirmez-vous la suppression ?")'
                                               href="SupprimerEtudiant.php">
                                                <span class="glyphicon glyphicon-trash" style="font-size:15px;" ></span>
                                            </a>
                                        </td> 
                                    </tr>
                                 <?php }?>
                                    
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="Form_etudiant.php" role="button">
                     <span class="glyphicon glyphicon-plus" style="font-size:11px;"></span> Ajouter
                </a> 
            </div>
          
            
        </div>
        
        
                                
        
    </body>
    
</html>