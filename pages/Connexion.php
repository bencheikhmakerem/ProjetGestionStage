<?php
    session_start();
    
   /*if(isset($_POST['connecter'])){
		if(!empty($_POST['user_name']) && !empty($_POST['password'])) {
			$user_name = htmlspecialchars($_POST['user_name']);
			$password =md5($_POST['password']);
			
			$recupUser = $pdo->prepare('SELECT user_name,pwd FROM utilisateur WHERE user_name= ? AND pwd=?');
			$recupUser->execute(array($user_name,$pwd));
			
			 if($recupUser->rowCount()>0) {
			 	$_SESSION['user_name'] =$user_name;
				$_SESSION ['pwd'] = $pwd;
				 echo "bienvenue";
				//header('Location: nvutilisateur.php');
			 
			 }
		
		} else{
			 
			 	echo "votre pseudo ou mdp est invalide";
			 }
		 
	   
		   }*/
	   
	   
	   
	   
   
    //$user_name=isset($_POST['user_name'])?$_POST['user_name']:"";
    
  //  $password=isset($_POST['password'])?$_POST['password']:"";

	if(!empty($_POST['user_name']) && !empty($_POST['password'])) {
			
		require_once("ConnexionWithBD.php");

			//$req="select * from utilisateur where user_name=? 
                //and pwd=?";
	
			$req = $pdo->prepare('SELECT * FROM utilisateur WHERE (user_name = :user_name');
    		$req->execute(['user_name' =>$_POST['user_name']]);
		
				
    		$user = $req->fetch(PDO::FETCH_BOTH);
    
		
    		if(password_verify($_POST['password'],$user['pwd'])){
      
            			echo "bienvenue";
					   /* $_SESSION['password']=$password;
            			header('location: nvutilisateur.php');
						exit();*/
				}
	}
			else{
						echo "erreur";
           //$_SESSION['erreurLogin']="<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
				// header('location: connexion.php');
				// exit();
    			}
	
 /*if(!empty($_POST['user_name']) && !empty($_POST['password']))
		{
			$user_name_par_defaut = "admin";
			$password_par_defaut = "admin123";
			
			$user_name_saisi = htmlspecialchars($_POST['user_name']);
			$password_saisi = htmlspecialchars($_POST['password']);
			
			if($user_name_saisi == $user_name_par_defaut && $password_saisi == $password_par_defaut) {
				$_SESSION['password'] = $password_saisi;
				header('Location: nvutilisateur.php');
			}
		
			else {
				$_SESSION['erreurLogin']="<strong>Une erreur est parvenue!</strong> nom d'utilisateur ou mot de passe erroné";
        			header('Location: ConnexionAdmin.php');			}
		}
		
		else{
		    $_SESSION['erreurLogin']="<strong>Une erreur est parvenue!</strong> Veuillez remplir tous les champs";
        			header('Location: ConnexionAdmin.php');		
		}*/
	



?>
