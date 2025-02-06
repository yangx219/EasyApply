<?php
echo $_POST['nom'];
        	//identifiants base de donnée 
	$username = 'c##amerab3_a';
	$password = 'amerab3_a';

	$conn = oci_connect($username, $password, null, 'AL32UTF8');
	if (!$conn) {
		//erreur de connexion
    
	}
  if ( isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['identifiant']) && isset($_POST['motDePasse'])) {
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $identifiant=$_POST['identifiant'];
    $motDePasse=$_POST['motDePasse'];

    //todo : verifier si l'email n'existe pas déja en bdd avant d'inserer
    //$EmailExist = "SELECT count(*) from candidat where identifiant = 'aaaaaaa'";
    //$curseur = oci_parse($conn, $EmailExist);
    //oci_execute($curseur, OCI_DEFAULT);
    //$nbLigne = oci_fetch_all($curseur, $lignes);
    //vardump($lignes);
    //echo $nbLigne;
    //var_dump($nbLigne == 0);
    //if ($EmailExist == 0) {
    //  echo 'pass';
      $signUp ="INSERT into candidat(idc, nom, prenom, identifiant, motDePasse) values(seq_utilisateur.nextval,'$nom', '$prenom', '$identifiant', '$motDePasse')";
      $curseur = oci_parse($conn, $signUp);
    //  echo $curseur;
      oci_execute($curseur);
      header("Location: https://ssh1.pgip.universite-paris-saclay.fr/~sfergui/easyapply/login.html");  
      oci_close($conn);
   //}

    //else {
    //   //todo : email existant
    //}

        //header("Location: http://localhost:8888/Projet/easyApply/pagelogin.html");
        
        
        
       
     
}
else {
  //erreur to do
}
?>