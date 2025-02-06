<?php
 

if (isset($_POST['identifiant']) && !empty($_POST['identifiant']) && isset($_POST['mdp']) && !empty($_POST['mdp']) ) {

	$identifiant = $_POST['identifiant'];
	$motDePasse = $_POST['mdp'];
    
    //identifiants base de donnée 
	$username = 'c##amerab3_a';
	$password = 'amerab3_a';
		
	$conn = oci_connect($username, $password, null, 'AL32UTF8');
	if (!$conn) {
				//erreur de connexion
			
	}

	$verificationLoginMdP = "SELECT * FROM candidat WHERE identifiant = '$identifiant' AND motDePasse = '$motDePasse' ";
	$curseur = oci_parse($conn, $verificationLoginMdP);
	oci_execute($curseur);	
	$Ligne = oci_fetch_array($curseur);
	if ($Ligne != false) {
		session_start();
		$_SESSION["idc"] = $Ligne[0]; //idc
		$_SESSION["nom"] = $Ligne[1];//prenom
		header("Location: https://ssh1.pgip.universite-paris-saclay.fr/~sfergui/easyapply/homeUtilisateur.php");
	}
	else {
		header("Location: https://ssh1.pgip.universite-paris-saclay.fr/~sfergui/easyapply/login.html");  
		echo "Erreur de connection";
		echo "<a href=\"$_SERVER[HTTP_REFERER]\"> Revenir page login</a>";
	}


        
} else {
	echo "mdp ou identifiant non renseigné"; //todo
}
	

?>


