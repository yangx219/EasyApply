<?php
        	//identifiants base de donnée 
	$username = 'c##amerab3_a';
	$password = 'amerab3_a';

	$conn = oci_connect($username, $password, null, 'AL32UTF8');
	if (!$conn) {
		//erreur de connexion
    
	}
  if ( isset($_POST['adresse mail']) && isset($_POST['avis'])) {
    $adresse=$_POST['adresse mail'];
    $avis=$_POST['avis'];
    
      $signUp ="INSERT into avis(adresse, avis) values(seq_utilisateur.nextval,'$adresse', '$avis')";
      $curseur = oci_parse($conn, $signUp);
    //  echo $curseur;
      oci_execute($curseur);
      header("Location: https://ssh1.pgip.universite-paris-saclay.fr/~sfergui/easyapply/home.html");  
      oci_close($conn);
   
       
     
}
else {
  //erreur to do
}
?>