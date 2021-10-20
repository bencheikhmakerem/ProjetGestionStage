<?php
   session_start();
    require_once("ConnexionWithBD.php");

  	//if(isset($_POST['connecter'])){
			
		if(!empty($_POST['user_name']) && !empty($_POST['password'])){
				
    				$req = $pdo->prepare('SELECT * FROM utilisateur WHERE (user_name = :user_name');
    				$req->execute(['user_name' =>$_POST['user_name']]);
								
    				$user = $req->fetch();
    					
						if($user == null){
							$_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
								}
						elseif(password_verify($_POST['password'], $user->pwd)){
									$_SESSION['auth'] = $user;
										
							        //$_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
									
							         header('Location: nvutilisateur.php');
									  exit();
    		}
		
			else{
        			$_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte'; 
		}
			}
		

?>