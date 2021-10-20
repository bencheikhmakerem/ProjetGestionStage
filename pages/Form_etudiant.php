<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" type= "text/css" href= "../css/Etudiant.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script type="text/javascript" src="../js/Etudiant.js"></script>
</head>


<body>

	<form id="msform">
	 
	  <ul id="progressbar">
		<li class="active">Infos de base</li>
		<li>Scolarité</li>
		<li>Stage</li>
	  </ul>
	  <!-- fieldsets -->
	  <fieldset>
		<h2 class="fs-title">Informations de base</h2>
		
		
		<div class="radio-block">
		  Genre
		 
		<input id="Genre1" type="radio" value="M" name="Genre"/>
		<label for="Genre1">M</label>
		
	   
		<input id="Genre2" type="radio" value="F" name="Genre"/>
		<label for="Genre2">F</label>
		  
		</div>
		
		
		
		<input type="text" name="nom" placeholder="Nom" />
		<input type="text" name="prenom" placeholder="Prenom" />
		<input type="text" name="num" placeholder="Numero etudiant" />
		<input type="text" name="date" placeholder="Date de naissance (JJ/MM/AAAA)" />
		<input type="text" name="mail" placeholder="Mail (xyz@mail.fr)" />
		 <textarea name="adresse" placeholder="Adresse"></textarea>
	   
		<input type="button" name="next" class="next action-button" value="Next" />
	  </fieldset>
	  <fieldset>
		<h2 class="fs-title">Scolarité Sup Galilée</h2>
	   
		<div class="checkbox-block">
		  Niveau
		  <!--checkbox 1-->
		<input class="checkbox-effect checkbox-effect-1" id="Telecom1" type="checkbox" value="Telecom1" name="Telecom1"/>
		<label for="Telecom1">TELE1</label>
		
		<!--checkbox 2-->
		<input class="checkbox-effect checkbox-effect-1" id="Telecom2" type="checkbox" value="Telecom2" name="Telecom2"/>
		<label for="Telecom2">TELE2</label>
		
		<!--checkbox 3-->
		<input class="checkbox-effect checkbox-effect-1" id="Telecom3" type="checkbox" value="Telecom3" name="Telecom3"/>
		<label for="Telecom3">TELE3</label>
		  
		</div>
		
		 <div class="radio-block">
		  Redoublant
		 
		<input id="Redbl1" type="radio" value="Oui" name="Redbl"/>
		<label for="Redbl1">Oui</label>
		
	   
		<input id="Redbl2" type="radio" value="Non" name="Redbl"/>
		<label for="Redbl2">Non</label>
		  
		</div>
	 
		
		<div class="radio-block">
		  Dettes
		  
		<input id="Dette1" type="radio" value="Oui" name="Dette"/>
		<label for="Dette1">Oui</label>
		
		<!--checkbox 2-->
		<input  id="Dette2" type="radio" value="Non" name="Dette"/>
		<label for="Dette2">Non</label>
		  
		</div>
		
		 <div class="radio-block">
		  TOEIC
		  
		<input id="TOEIC1" type="radio" value="Oui" name="TOEIC"/>
		<label for="TOEIC1">Obtenu</label>
		
		
		<input id="TOEIC2" type="radio" value="Non" name="TOEIC"/>
		<label for="TOEIC2">Non obtenu</label>
		  
		</div>
		<label for="releve">Relevés de notes</label>
		<input id="releve" type="file" />
		<label for="certificat">Certificat de scolarité</label>
		<input id="certificat" type="file"/>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
	  </fieldset>
	  <fieldset>
		<h2 class="fs-title">Stages</h2>
		  <div class="radio-block">
		  TELE1
		
		<input id="Stage1v" type="radio" value="Oui" name="Stage1" onchange='activeTele1()'/>
		<label for="Stage1v">Oui</label>
		
		
		<input id="Stage1f" type="radio" value="Non" name="Stage1" onchange='desactiveTele1()' />		
		 	<label for="Stage1f">Non</label>
		  
		</div>
		
		<input id="entreprise1" type="text" name="entreprise" placeholder="Nom entreprise" />
		<input id="poste1" type="text" name="poste" placeholder="Poste occupé" />
		<input id="encadrant1" type="text" name="encadrant" placeholder="Nom encadrant" />
		<input id="duree1" type="text" name="duree" placeholder="Duree stage" />
		<input id="mail1" type="text" name="tuteur" placeholder="Mail tuteur" />
		<label for="convention1">Convention de stage</label>
		<input id="convention1" type="file" />
		<label for="rapport1">Rapport de stage</label>
		<input id="rapport1" type="file"/>
		
		<div class="radio-block">
		  TELE2
		 
		<input id="Stage2v" type="radio" value="Oui" name="Stage2" onchange='activeTele2()'/>
		<label for="Stage2v">Oui</label>
		
		
		<input id="Stage2f" type="radio" value="Non" name="Stage2" onchange='desactiveTele2()'/>
		<label for="Stage2f">Non</label>
		  
		</div>
		
		<input id="entreprise2" type="text" name="entreprise" placeholder="Nom entreprise" />
		<input id="poste2" type="text" name="poste" placeholder="Poste occupé" />
		<input id="encadrant2" type="text" name="encadrant" placeholder="Nom encadrant" />
		<input id="duree2" type="text" name="duree" placeholder="Duree stage" />
		<input id="mail2" type="text" name="tuteur" placeholder="Mail tuteur" />
		<label for="convention2">Convention de stage</label>
		<input id="convention2" type="file" />
		<label for="rapport2">Rapport de stage</label>
		<input id="rapport2" type="file"/>
		
		<div class="radio-block">
		  TELE3
		  
		<input id="Stage3v" type="radio" value="Oui" name="Stage3" onchange='activeTele3()'/>
		<label for="Stage3v">Oui</label>
		
		<input id="Stage3f" type="radio" value="Non" name="Stage3" onchange='desactiveTele3()'/>
		<label for="Stage3f">Non</label>
		  
		</div>
		
		<input id="entreprise3" type="text" name="entreprise" placeholder="Nom entreprise" />
		<input id="poste3" type="text" name="poste" placeholder="Poste occupé" />
		<input id="encadrant3" type="text" name="encadrant" placeholder="Nom encadrant" />
		<input id="duree3" type="text" name="duree" placeholder="Duree stage" />
		<input id="mail3" type="text" name="tuteur" placeholder="Mail tuteur" />
		<label for="convention3">Convention de stage</label>
		<input id="convention3" type="file" />
		<label for="rapport3">Rapport de stage</label>
		<input id="rapport3" type="file"/>
		
	   
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="submit" name="submit" class="submit action-button" value="Submit" />
	  </fieldset>
	</form>

</body>
</html>