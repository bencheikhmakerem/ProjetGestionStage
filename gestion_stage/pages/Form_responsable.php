<!DOCTYPE html>
<!--les liens-->
<html lang="en">
	<head>
		<!-- Title -->
		<title>Formulaire responsable</title>
		<!-- Required meta tags -->
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href = "http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext" rel = "stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../css/responsable.css">
		
	</head>

<body>

	<!-- Section Formulaire -->
	
	<section id="Resp" class="container-fluid">
       
			<div class="row">
				<h3> Formulaire responsable </h3>
					<form class="form" style="margin:20px;">
						<div class="form-group">
							
								<label for="nom"> Nom <span>*</span></label>
								<input type="text" id="nom" placeholder="saisir le nom" class="form-control" required="required">
							
						</div>
						
						<div class="form-group">
							
								<label for="prenom"> Prénom <span>*</span></label>
								<input type="text" id="prenom" class="form-control" placeholder="saisir le prenom"  required="required">
							
						</div>
						
						<div class="form-group">
							
								<label for="poste"> Poste actuel <span>*</span></label>
								<input type="text" id="post" class="form-control" placeholder="saisir le poste" required="required">
							
						</div>
						
						<div class="form-group">
							
								<label for="email">  Adresse mail <span>*</span></label>
								<input type="text" id="email" class="form-control" placeholder=" nom @ univ.paris-13.fr" required="required">
							
						</div>
						
						<div class="form-group">
							
								<label for="num"> Numéro de téléphone <span>*</span></label>
								<input type="text" id="num" class="form-control" placeholder="xx.xx.xx.xx.xx" required="required">
							
						</div>
				
					
						<div class="form-group"> 
							<label for="bureau"> Bureau n° </label>
							<input type="text" id="bureau" class="form-control" size="50px">
						</div>
						
						<p id="champ"><span>*</span> Champ obligatoire <p>
						
						<button type="submit" class="btn btn-default"> Ajouter </button> 
					</form>
				
			</div>
    </section>
	
	

</body>

</html>