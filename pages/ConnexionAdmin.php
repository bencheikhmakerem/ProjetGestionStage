<?php

session_start();
if (isset($_SESSION['erreurLogin']))
    $erreurLogin = $_SESSION['erreurLogin'];
else {
    $erreurLogin = "";
}
session_destroy();
?>


<! DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Espace de connexion</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	
</head>
<body>
<div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
    <div class="w3-panel w3-black">
      
        <div class="panel-body">
            <form method="post" action="Connexion.php" class="form">
				<?php if(!empty($erreurLogin)){?>
                		<div class="alert alert-danger">
				
							<?php echo $erreurLogin ?>
						</div>
				     <?php } ?>
                <div class="form-group">
                    <label for="login"><span class="glyphicon glyphicon-user"></span> Nom d'utilisateur :</label>
                    <input type="text" name="user_name" placeholder="Login"
                           class="form-control" autocomplete="off"/>
                </div>

                <div class="form-group">
                    <label for="pwd"><span class="glyphicon glyphicon-lock"></span> Mot de passe :</label>
                    <input type="password" name="password"
                           placeholder="Mot de passe" class="form-control"/>
                </div>

                <button type="submit" class="w3-btn w3-black" name="connecter">
                    <span class="glyphicon glyphicon-ok"></span>
                    Se connecter
                </button>
                <p class="text-right">
                   
					<a href="DeleteUser.php">Supprimer un compte</a>

					&nbsp &nbsp

                    <a href="nvutilisateur.php">Créer un compte</a>
					
                </p>
            </form>
        </div>
    </div>
</div>
</body>
</HTML