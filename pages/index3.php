<!DOCTYPE html>
<html lang="fr">

<?php

 
function GetRequest($nomvar,$defaut="")
{
    if (isset($_REQUEST[$nomvar]))
    { $ret=$_REQUEST[$nomvar];
    }
    else   $ret=$defaut;
      
   return $ret;
}

 
 
  $idEtudiant = GetRequest('idEtudiant',11297405); //Si pas de num etudiant en parametre on fixe un num par defaut
  $paramAction=GetRequest("paramAction","");
 

    function connectToBD(){ //Connexion à la Bdd
	
        $objetPdo = new PDO('mysql:host=localhost;dbname=applietudiant', 'root', 'hbthbt');
        if (!$objetPdo) echo "Echec de connexion à la base de données";
        $objetPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $objetPdo;        
        
    }
    
     
    
function getInfosEtudiant($idEtudiant)
{
    $objetPdo=connectToBD();
    $sql="SELECT * from STAGE where StagiaireNumero=$idEtudiant";
       // Requete
 
  // Execution de la requete

    $stmt = $objetPdo->prepare($sql);
    $executeISOk = $stmt->execute();

    // Recuperation des resultats

    $infos = $stmt->fetchAll();
    if (count($infos) > 0){
      
        return $infos[0];
    }
     
    return null;
}

function formatDate($date) {
    // Passage de yyyy-mm-dd => dd/mm/yyyy
    if (!$date) {
        return '';
    }
    $day = substr($date, 8, 2);
    $month = substr($date, 5, 2);
    $year = substr($date, 0, 4);
    if ($month=='00')
        return '';
        
        return $day."/".$month."/".$year;
}



 function formatDateForMysql($date) {
    // Passage de dd/mm/yyyy => yyyy-mm-dd
    $date=trim($date);
    if (!$date || strlen($date)<8) {
        return null;
    }
    $year = substr($date, 6, 4);
    $month = substr($date, 3, 2);
    $day = substr($date, 0, 2);
    
    return $year."-".$month."-".$day;
}


function updateForm1($idEtudiant) {
    $arrVal=array();
    $arrVal['StagiaireCivil']=GetRequest("StagiaireCivil");
    $arrVal['StagiaireNom']=GetRequest("StagiaireNom");
    $arrVal['StagiairePrenom']=GetRequest("StagiairePrenom");
    $arrVal['StagiaireDateNais']=formatDateForMysql(GetRequest("StagiaireDateNais"));
    $arrVal['StagiaireVilleNais']=GetRequest("StagiaireVilleNais");
    $arrVal['StagiaireNation']=GetRequest("StagiaireNation");
    $arrVal['StagiaireMail']=GetRequest("StagiaireMail");
    $arrVal['StagiaireTel']=GetRequest("StagiaireTel");
    $arrVal['StagiaireFax']=GetRequest("StagiaireFax");
    $arrVal['StagiaireBatiment']=GetRequest("StagiaireBatiment");
    $arrVal['StagiaireAdresse']=GetRequest("StagiaireAdresse");
    $arrVal['StagiaireCP']=GetRequest("StagiaireCP");
    $arrVal['StagiaireVille']=GetRequest("StagiaireVille");
    $arrVal['StagiairePays']=GetRequest("StagiairePays");
	updateTable("STAGE", $arrVal, "StagiaireNumero=$idEtudiant");
    
}

function updateForm2($idEtudiant) {
    $arrVal=array();
    $arrVal['TrouveStage']=GetRequest("TrouveStage");
    $arrVal['StageTitre']=GetRequest("StageTitre");
    $arrVal['StageSujet']=GetRequest("StageSujet");
    $arrVal['StageAnnee']=GetRequest("StageAnnee");
    $arrVal['Duree']=GetRequest("Duree");
	$arrVal['DateDebut']=formatDateForMysql(GetRequest("DateDebut"));
	$arrVal['DateFin']=formatDateForMysql(GetRequest("DateFin"));
    $arrVal['NombreHeureSemaine']=GetRequest("NombreHeureSemaine");
    $arrVal['LieuBat']=GetRequest("LieuBat");
    $arrVal['LieuAdresse']=GetRequest("LieuAdresse");
    $arrVal['LieuCP']=GetRequest("LieuCP");
    $arrVal['LieuVille']=GetRequest("LieuVille");
    $arrVal['LieuPays']=GetRequest("LieuPays");
	updateTable("STAGE", $arrVal, "StagiaireNumero=$idEtudiant");
    
}

function updateForm3($idEtudiant) {
    $arrVal=array();
    $arrVal['IngCivil']=GetRequest("IngCivil");
    $arrVal['IngNom']=GetRequest("IngNom");
    $arrVal['IngPrenom']=GetRequest("IngPrenom");
    $arrVal['IngMail']=GetRequest("IngMail");
    $arrVal['IngTel']=GetRequest("IngTel");
    $arrVal['IngFax']=GetRequest("IngFax");
    
	updateTable("STAGE", $arrVal, "StagiaireNumero=$idEtudiant");
    
}

function updateForm4($idEtudiant) {
    $arrVal=array();
    $arrVal['RAdmCivil']=GetRequest("RAdmCivil");
    $arrVal['RAdmNom']=GetRequest("RAdmNom");
    $arrVal['RAdmPrenom']=GetRequest("RAdmPrenom");
    $arrVal['RAdmMail']=GetRequest("RAdmMail");
    $arrVal['RAdmTel']=GetRequest("RAdmTel");
    $arrVal['RAdmFax']=GetRequest("RAdmFax");
    
	updateTable("STAGE", $arrVal, "StagiaireNumero=$idEtudiant");
    
}

function updateForm5($idEtudiant) {
    $arrVal=array();
    $arrVal['Ent']=GetRequest("Ent");
    $arrVal['EntActivite']=GetRequest("EntActivite");
    $arrVal['EntNom']=GetRequest("EntNom");
    $arrVal['EntBatiment']=GetRequest("EntBatiment");
    $arrVal['EntAdresse']=GetRequest("EntAdresse");
    $arrVal['EntCP']=GetRequest("EntCP");
    $arrVal['EntVille']=GetRequest("EntVille");
    $arrVal['EntPays']=GetRequest("EntPays");
    
	updateTable("STAGE", $arrVal, "StagiaireNumero=$idEtudiant");
    
}

function updateTable($table, $new_info, $where,$objetPdo=null)
{
    if ($objetPdo==null)
       $objetPdo = connectToBD();
    $sql = "update  $table  set  ";
    $i = 0;
    $arrVal=array();
    foreach ($new_info as $key => $val) {

        if ($i > 0)
            $sql .= ", ";
        $i ++;
        $sql .= " $key= :$key ";
        $arrVal[":$key"] = $val;
    }
    $sql .= "  where $where";

    // Maj
   
	 $stmt = $objetPdo->prepare($sql);
	 $stmt->execute($arrVal);
 
}

function insertIntoTable($table, $new_info, $to_exclude,$objetPdo=null)
{
    if ($objetPdo==null)
         $objetPdo = connectToBD();
    $sql = "insert into  $table (  ";
    $sqlVal = " values ( ";
    $i = 0;

    foreach ($new_info as $key => $val) {
        if ($to_exclude && array_search($key ,$to_exclude)!==false)
            continue;
        if ($i > 0) {
            $sql .= ", ";
            $sqlVal .= ", ";
        }
        $i ++;
        $sql .= " $key ";
        $sqlVal .= " :$key ";
        $arrVal[":$key"] = $val;
    }

    $sql .= ") " . $sqlVal . ")";

    $stmt = $objetPdo->prepare($sql);
    $stmt->execute($sqlVal);
 
    $new_id = $pdo->lastInsertId();

    return $new_id;
}

function HTMLEncode($str,$code=0)
{
    $ret=htmlspecialchars($str, ENT_QUOTES);
  
    return $ret;
            
}
function buildInput($libelle,$editable, $idInput, $value, $size='',$maxlength='', $extra='') {
    if ($libelle)
        echo "<tr><td>$libelle</td><td>";
    if ($editable) {
        
        echo  "<input type='text'  name='$idInput'  id='$idInput' value=\"" . HTMLEncode($value) ."\""  ;
        
        if( $size!='')   {
            
            echo   " size='$size' ";
            
        }
        
        
        if( $maxlength!='')
            echo   " maxlength='$maxlength' ";
            
            echo $extra;
            echo " />";
    }else {
        
            echo  HTMLEncode($value);
        
    }
    if ($libelle) 
        echo "</td></tr>
";
    
}




if ($paramAction=="valider1") {
     updateForm1($idEtudiant);
}

if ($paramAction=="valider2") {
     updateForm2($idEtudiant);
}

if ($paramAction=="valider3") {
     updateForm3($idEtudiant);
}

if ($paramAction=="valider4") {
     updateForm4($idEtudiant);
}

if ($paramAction=="valider5") {
     updateForm5($idEtudiant);
}

?>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="css/menu.css">
<title>Stage</title>

<script>
 function annuler(){
   document.form1.paramAction.value='annuler';
  document.form1.submit();
 
 }
 function editer(numform){
  document.form1.paramAction.value='editer'+numform;
  document.form1.submit();
  
 }
 
 
 function valider1(){
 
     var valeur1 = $("#StagiaireTel").val(); 
	 var valeur2 = $("#StagiaireFax").val(); 
	 var valeur3 = $("#StagiaireBatiment").val();
	 var valeur4 = $("#StagiaireCP").val();
	   
	  if(isNaN(valeur1))
	  {
		 alert("Le format du numero de telephone du stagiaire n'est pas respecte");
		 $("#StagiaireTel").focus(); 
	    
		 return false;
	  }
	  
	  if(isNaN(valeur2))
	  {
		 alert("Le format du numero de fax du stagiaire n'est pas respecte");
		 $("#StagiaireFax").focus(); 
	    
		 return false;
	  }
	  
	  if(isNaN(valeur3))
	  {
		 alert("Le format du numero de batiment du stagiaire n'est pas respecte");
		 $("#StagiaireBatiment").focus(); 
	    
		 return false;
	  }
	  if(isNaN(valeur4))
	  {
		 alert("Le format du numero de code postal du stagiaire n'est pas respecte");
		 $("#StagiaireCP").focus(); 
	    
		 return false;
	  }
	document.form1.paramAction.value='valider1';
	document.form1.submit();
 }
 
  
 
 function valider2(){
	 
	 var valeur1 = $("#NombreHeureSemaine").val(); 
	 var valeur2 = $("#LieuBat").val();
	 var valeur3 = $("#LieuCP").val();
	 if(isNaN(valeur1))
	  {
		 alert("Le format du nombre d'heure du stage n'est pas respecte");
		 $("#NombreHeureSemaine").focus(); 
	    
		 return false;
	  }
	  
	 if(isNaN(valeur2))
	  {
		 alert("Le format du numero de batiment du lieu du stage n'est pas respecte");
		 $("#LieuBat").focus(); 
	    
		 return false;
	  }
	  
	  if(isNaN(valeur3))
	  {
		 alert("Le format du numero de code postal du stage n'est pas respecte");
		 $("#LieuCP").focus(); 
	    
		 return false;
	  }
	 
	 
	 
	 
	document.form2.paramAction.value='valider2';
	document.form2.submit();
 }
 
  
 
 function valider3(){
	 
	var valeur1 = $("#IngTel").val(); 
	var valeur2 = $("#IngFax").val(); 
  
	if(isNaN(valeur1))
	  {
		 alert("Le format du numero de telephone du tuteur n'est pas respecte");
		 $("#IngTel").focus(); 
	    
		 return false;
	  }
	  
	if(isNaN(valeur2))
	  {
		 alert("Le format du numero de fax du tuteur n'est pas respecte");
		 $("#IngFax").focus(); 
	    
		 return false;
	  }
	  
	document.form3.paramAction.value='valider3';
	document.form3.submit();
 }
 
   
 
 function valider4(){
	var valeur1 = $("#RAdmTel").val(); 
	var valeur2 = $("#RAdmFax").val(); 
  
	if(isNaN(valeur1))
	  {
		 alert("Le format du numero de telephone de l'encadrant n'est pas respecte");
		 $("#RAdmTel").focus(); 
	    
		 return false;
	  }
	  
	if(isNaN(valeur2))
	  {
		 alert("Le format du numero de fax de l'encadrant n'est pas respecte");
		 $("#RAdmFax").focus(); 
	    
		 return false;
	  }
	
	document.form4.paramAction.value='valider4';
	document.form4.submit();
 }
 
  
 function valider5(){
	var valeur1 = $("#EntBatiment").val();
	var valeur2 = $("#EntCP").val();
	
	if(isNaN(valeur1))
	  {
		 alert("Le format du numero de batiment de l'entreprise n'est pas respecte");
		 $("#EntBatiment").focus(); 
	    
		 return false;
	  }
	  
	if(isNaN(valeur2))
	  {
		 alert("Le format du numero de code postal de l'entreprise n'est pas respecte");
		 $("#EntCP").focus(); 
	    
		 return false;
	  }
	document.form5.paramAction.value='valider5';
	document.form5.submit();
 }


$(document).ready(function(){
  $( ".datepicker" ).datepicker({
		dateFormat: "dd/mm/yy"
  });
  
  $("#btnPrint").on("click", function () {
            var divContents = $(".main-container").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>Recapitulatif stage</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
 });
  
});
  



</script>

</head>

<body>
<?php 
$infos=getInfosEtudiant($idEtudiant);
 
?>

	<div class="main-container">

		<!-- HEADER -->
		<header class="block">
			<ul class="header-menu horizontal-list">
				<li><a class="header-menu-tab" href="index.php"><span
						class="glyphicon glyphicon-home scnd-font-color"></span>Accueil</a>
				</li>
				<li><a class="header-menu-tab" href="Archives.php"><span
						class="glyphicon glyphicon-folder-open scnd-font-color"></span>Archives</a>
				</li>
				<li><a class="header-menu-tab" href="Compte.php"><span
						class="glyphicon glyphicon-th-list scnd-font-color"></span>Compte</a>
				</li>
				<li><a class="header-menu-tab" href="Options.php"><span
						class="glyphicon glyphicon-pencil scnd-font-color"></span>Options</a>
				</li>
			</ul>
			<div class="profile-menu">
				<p>
					Mon Compte <a href="#26"><span
						class="entypo-down-open scnd-font-color"></span></a>
				</p>
				<div class="profile-picture small-profile-picture">
					<img width="40px" alt="image"
						src="https://thumbs.dreamstime.com/b/ligne-ic-ne-illustration-de-compte-utilisateur-de-logo-de-personne-d-ensemble-90234649.jpg">
				</div>
			</div>
		</header>

		<div class="Infos">
			<h3>Informations générales</h3>
			<form method="post" action="" id='form1' name='form1' >
			<input type='hidden' name='idEtudiant' value='<?php echo $idEtudiant; ?>' >
			<input type='hidden' name='paramAction' value='' >
			<table>
			 <?php 
			 $editable=$paramAction=="editer1";
			 buildInput("Civilité : ", $editable, 'StagiaireCivil', $infos['StagiaireCivil'], 5,5);
			 buildInput("Nom : ", $editable, 'StagiaireNom', $infos['StagiaireNom'], 20,30);
			 buildInput("Prenom : ", $editable, 'StagiairePrenom', $infos['StagiairePrenom'], 20,30);
			 buildInput("Date de naissance : ", $editable, 'StagiaireDateNais', formatDate($infos['StagiaireDateNais']), 10,10," class='datepicker' ");
			 buildInput("Ville de naissance : ", $editable, 'StagiaireVilleNais', $infos['StagiaireVilleNais'], 20,30);
			 buildInput("Nationalité : ", $editable, 'StagiaireNation', $infos['StagiaireNation'], 20,30);
			 buildInput("Adresse mail : ", $editable, 'StagiaireMail', $infos['StagiaireMail'], 20,30);
			 buildInput("Numero de téléphone : ", $editable, 'StagiaireTel', $infos['StagiaireTel'], 15,15);
			 buildInput("Numéro de Fax : ", $editable, 'StagiaireFax', $infos['StagiaireFax'], 15,15);
			 
			 echo "<tr><td>Adresse complète :</td><td>";
			      buildInput("", $editable, 'StagiaireBatiment', $infos['StagiaireBatiment'], 5,5);
			      echo " " ;
			      buildInput("", $editable, 'StagiaireAdresse', $infos['StagiaireAdresse'], 20,20);
			      echo "<br>CP : " ;
			      buildInput("", $editable, 'StagiaireCP', $infos['StagiaireCP'], 5,5);
			      echo " Ville : " ;
			      buildInput("", $editable, 'StagiaireVille', $infos['StagiaireVille'], 20,60);
			      echo "<br>Pays : " ;
			      buildInput("", $editable, 'StagiairePays', $infos['StagiairePays'], 20,60);
			      
			      echo " </td></tr>
";
			      
			 echo "<tr><td></td><td><br>";
			 if (!$editable)
			     echo " <input type='button' onclick='editer(1)' value='Modifier les informations'/>";
			    else {
			        echo " <input type='button' onclick='valider1()' value='Valider'/>";
			        echo " &nbsp;  &nbsp;  &nbsp;  &nbsp;  <input type='button'   onclick='annuler()' value='Annuler' />";
			    }
			    echo "</td></tr>";
			?>
		
			</table>
				
			
			</form>
		
		</div>

		<div class="Stage">
			<h3>Informations stage</h3>
			<form method="post" action="" id='form2' name='form2' >
			<input type='hidden' name='idEtudiant' value='<?php echo $idEtudiant; ?>' >
			<input type='hidden' name='paramAction' value='' >
			<table>
			 <?php 
			 
			 $editable=$paramAction=="editer2";
			 buildInput("Stage trouvé : ", $editable, 'TrouveStage', $infos['TrouveStage'], 5,5);
			 buildInput("Titre du stage : ", $editable, 'StageTitre', $infos['StageTitre'], 20,30);
			 buildInput("Sujet du stage : ", $editable, 'StageSujet', $infos['StageSujet'], 30,40);
			 buildInput("Année du stage : ", $editable, 'StageAnnee', $infos['StageAnnee'], 20,30);
			 buildInput("Durée du stage : ", $editable, 'Duree', $infos['Duree'], 10,10);
			 
			 echo "<tr><td>Période stage :</td><td>";
				  echo "Du " ;
			      buildInput("", $editable, 'DateDebut', formatDate($infos['DateDebut']), 5,5," class='datepicker' ");
			      echo " au " ;
			      buildInput("", $editable, 'DateFin', formatDate($infos['DateFin']), 5,5," class='datepicker' ");
			      echo "<br>" ;
			echo " </td></tr>";
			buildInput("Nombre d'heures/semaine : ", $editable, 'NombreHeureSemaine', $infos['NombreHeureSemaine'], 2,2);
			echo "<tr><td>Lieu du stage :</td><td>";
			      buildInput("", $editable, 'LieuBat', $infos['LieuBat'], 5,5);
			      echo " " ;
			      buildInput("", $editable, 'LieuAdresse', $infos['LieuAdresse'], 20,20);
			      echo "<br>CP : " ;
			      buildInput("", $editable, 'LieuCP', $infos['LieuCP'], 5,5);
			      echo " Ville : " ;
			      buildInput("", $editable, 'LieuVille', $infos['LieuVille'], 20,60);
			      echo "<br>Pays : " ;
			      buildInput("", $editable, 'LieuPays', $infos['LieuPays'], 20,60);
			      
			echo " </td></tr>";
			 
			 echo "<tr><td></td><td><br>";
			 if (!$editable)
			     echo " <input type='button' onclick='editer(2)' value='Modifier les informations'/>";
			     else {
			         echo " <input type='button' onclick='valider2()' value='Valider'/>";
			         echo " &nbsp;  &nbsp;  &nbsp;  &nbsp;  <input type='button'   onclick='annuler()' value='Annuler' />";
			     }
			     echo "</td></tr>";
			 
			 
			 ?>
		
			</table>
				
			
			</form>

		</div>
		
		<div class="Tuteur">
			<h3>Informations tuteur</h3>
			<form method="post" action="" id='form3' name='form3' >
			<input type='hidden' name='idEtudiant' value='<?php echo $idEtudiant; ?>' >
			<input type='hidden' name='paramAction' value='' >
			<table>
			 <?php 
			 
			 $editable=$paramAction=="editer3";
			 buildInput("Civilité : ", $editable, 'IngCivil', $infos['IngCivil'], 5,5);
			 buildInput("Nom : ", $editable, 'IngNom', $infos['IngNom'], 20,30);
			 buildInput("Prenom : ", $editable, 'IngPrenom', $infos['IngPrenom'], 20,30);
			 buildInput("Adresse mail : ", $editable, 'IngMail', $infos['IngMail'], 20,30);
			 buildInput("Numero de téléphone : ", $editable, 'IngTel', $infos['IngTel'], 15,15);
			 buildInput("Numéro de Fax : ", $editable, 'IngFax', $infos['IngFax'], 15,15);
			 
			 echo "<tr><td></td><td><br>";
			 if (!$editable)
			 {
				 echo " <input type='button' onclick='editer(3)' value='Modifier les informations'/>";
				 echo " <a HREF='mailto:" .$infos['IngMail'] .  "'> Contacter le tuteur</a> ";
			 }
			     
			 else {
			     echo " <input type='button' onclick='valider3()' value='Valider'/>";
			     echo " &nbsp;  &nbsp;  &nbsp;  &nbsp;  <input type='button'   onclick='annuler()' value='Annuler' />";
			 }
			 echo "</td></tr>";
			     
			 
			 ?>
			 </table>
				
			
			</form>

		</div>
		
		

		<div class="Encadrant">
			<h3>Informations responsable administratif</h3>
			<form method="post" action="" id='form4' name='form4' >
			<input type='hidden' name='idEtudiant' value='<?php echo $idEtudiant; ?>' >
			<input type='hidden' name='paramAction' value='' >
			<table>
			<?php 
			 
			 $editable=$paramAction=="editer4";
			 buildInput("Civilité : ", $editable, 'RAdmCivil', $infos['RAdmCivil'], 5,5);
			 buildInput("Nom : ", $editable, 'RAdmNom', $infos['RAdmNom'], 20,30);
			 buildInput("Prenom : ", $editable, 'RAdmPrenom', $infos['RAdmPrenom'], 20,30);
			 buildInput("Adresse mail : ", $editable, 'RAdmMail', $infos['RAdmMail'], 20,30);
			 buildInput("Numero de téléphone : ", $editable, 'RAdmTel', $infos['RAdmTel'], 15,15);
			 buildInput("Numéro de Fax : ", $editable, 'RAdmFax', $infos['RAdmFax'], 15,15);
			 
			  echo "<tr><td></td><td><br>";
			  if (!$editable){
			
			      echo " <input type='button' onclick='editer(4)' value='Modifier les informations'/>";
				  echo " <a HREF='mailto:" .$infos['RAdmMail'] .  "'> Contacter l'encadrant</a> ";
			  }
			  else {
			      echo " <input type='button' onclick='valider4()' value='Valider'/>";
			      echo " &nbsp;  &nbsp;  &nbsp;  &nbsp;  <input type='button'   onclick='annuler()' value='Annuler' />";
			  }
			  echo "</td></tr>";
			  echo "</td></tr>";
			 
			 ?>
			 </table>
				
			
			</form>

		</div>

		<div class="Entreprise">
			<h3>Informations entreprise</h3>
			<form method="post" action="" id='form5' name='form5' >
			<input type='hidden' name='idEtudiant' value='<?php echo $idEtudiant; ?>' >
			<input type='hidden' name='paramAction' value='' >
			<table>
			<?php 
			
			 $editable=$paramAction=="editer5";
			 buildInput("Type : ", $editable, 'Ent', $infos['Ent'], 5,5);
			 buildInput("Activite : ", $editable, 'EntActivite', $infos['EntActivite'], 20,30);
			 buildInput("Nom : ", $editable, 'EntNom', $infos['EntNom'], 20,30);
			 echo "<tr><td>Adresse de l'entreprise : </td><td> ";
			      buildInput("", $editable, 'EntBatiment', $infos['EntBatiment'], 5,5);
			      echo "  " ;
			      buildInput("", $editable, 'EntAdresse', $infos['EntAdresse'], 20,20);
			      echo "<br>CP : " ;
			      buildInput("", $editable, 'EntCP', $infos['EntCP'], 5,5);
			      echo " Ville : " ;
			      buildInput("", $editable, 'EntVille', $infos['EntVille'], 20,60);
			      echo "<br>Pays : " ;
			      buildInput("", $editable, 'EntPays', $infos['EntPays'], 20,60);
			      
			echo " </td></tr>";
			 
			 echo "<tr><td></td><td><br>";
			 if (!$editable)
			     echo " <input type='button' onclick='editer(5)' value='Modifier les informations'/>";
			     else {
			         echo " <input type='button' onclick='valider5()' value='Valider'/>";
			         echo " &nbsp;  &nbsp;  &nbsp;  &nbsp;  <input type='button'   onclick='annuler()' value='Annuler' />";
			     }
			     echo "</td></tr>";
			     
			 
			 ?>
		
			</table>
				
			
			</form>
			

		</div>

		<div class="Etablissement">
			<h3>Fiche d'appréciation</h3>
			<button>Remplir/Compléter la fiche</button>
			<button>Consulter la fiche</button>

			<h3>Convention de stage</h3>
			<button>Remplir/Compléter la convention</button>
			<button>Consulter la convention</button>
			<br><br>
			<?php 
			 echo "Date Signature : ". $infos['DateSignature']."<br>";
			 
			 ?>
		</div>
		<br> <br>
		<input type="button" value="Exporter en pdf" id="btnPrint" />
	</div>

</body>
</html>