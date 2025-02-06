<?php
if(session_status() === PHP_SESSION_NONE) session_start();
        	//identifiants base de donnée 
          $username = 'c##amerab3_a';
          $password = 'amerab3_a';
        
          $conn = oci_connect($username, $password, null, 'AL32UTF8');
          if (!$conn) {
            //erreur de connexion
            
          }
          
    $nomDuPoste=$_POST['nomDuPoste'];
    $nomEntrepise=$_POST['nomEntrepise'];
    $AdresseEntreprise=$_POST['AdresseEntreprise'];
    $Descriptif=$_POST['Descriptif'];
    $date = $_POST['date'];
    $idcc = $_SESSION["idc"];
          echo $date;


    $ajoutCandidature ="INSERT INTO candidature(id, idc,  poste, entreprise, adresse, date_candidature, competences_exigees, statut_cond)
    VALUES(seq_candidature.nextval, $idcc, '$nomDuPoste', '$nomEntrepise', '$AdresseEntreprise', TO_DATE('$date','YYYY-MM-DD'), '$Descriptif', 'en attente')";
    $curseur = oci_parse($conn, $ajoutCandidature);
    echo $curseur;
    oci_execute($curseur);	
    // ajouter l'action dans la table historique 
     $texte="INSERT INTO historique (idc, action, date_action) VALUES ('$idcc', 'ajouter une nouvelle candidature', SYSDATE)";
     echo $texte;
     $stidd = oci_parse($conn, $texte);
    // Exécution de la requête
    oci_execute($stidd);


    header("Location: https://ssh1.pgip.universite-paris-saclay.fr/~sfergui/easyapply/homeUtilisateur.php");
    oci_close($conn);

?>