

<?php
// Démarrer la session
if(session_status() === PHP_SESSION_NONE) session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['nom']) && $_GET['filter'] && $_GET['recherche']) {
  // Afficher un message de bienvenue avec le nom de l'utilisateur
  $message_bienvenue = "Bienvenue, " . $_SESSION['nom'] . "!";
} else {
  // Si l'utilisateur n'est pas connecté, afficher un message d'invitation à la connexion
  $message_bienvenue = "Connectez-vous pour accéder à toutes les fonctionnalités du site";
}
?>

<html>
 <body>
    
 <nav>
      <img src="img_nature.jpg" alt="Logo">
      <ul>
      <ul>
          <li><a href="home.php">Deconnexion</a></li>
          <li><a href="afficherCandidature.php">Mes candidatures</a></li>
          <li><a href="afficherHistorique.php">Mon historique</a></li>
          <li><a href="homeUtilisateur.php">Home</a></li>
          
        </ul> 
        </li>
      </ul>
    </nav>


        
<?php 


//identifiants base de donnée 
$username = 'c##amerab3_a';
$password = 'amerab3_a';

$conn = oci_connect($username, $password, null, 'AL32UTF8');
if (!$conn) {
//erreur de connexion

}
$idc=$_SESSION["idc"];
$option = $_GET['filter'];
$recherche=  $_GET['recherche'];
$reqt = "SELECT * from candidature WHERE idc='$idc' and $option like '%$recherche%'";
$stid = oci_parse($conn,  $reqt);
oci_execute($stid);

 // ajouter l'action dans la table historique 
$texte="INSERT INTO historique (idc, action, date_action) VALUES ('$idc', 'chercher une candidature', SYSDATE)";
//echo $texte;
$stidd = oci_parse($conn, $texte);
// Exécution de la requête
oci_execute($stidd);

echo '<table>';
while ($row = oci_fetch_assoc($stid)) {
    echo '<tr>';
    foreach ($row as $cell) {
        echo '<td>' . $cell . '</td>';
    }
    echo "<td><form method='post' action='delete_candidature.php'>
                  <input type='hidden' name='id_candidature'>
                  <button type='submit'>Supprimer</button>
              </form></td>";

    echo '</tr>';
}
echo '</table>';


oci_close($conn);

?>




<footer>
      <div class="footer-content">
        <p>Toujours pour vous aider.</p>
      </div>
    </footer>
 </body>   
</html>


<style>

body {
       
        background-repeat: no-repeat;
        background-size: cover;
      }
      nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #292929;
        color: #fff;
        padding: 10px 50px;
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
      }

      nav img {
        height: 50px;
      }

      nav ul {
        display: flex;
        list-style-type: none;
        margin: 0;
        padding: 0;
      }

      nav ul li {
        margin: 0 10px;
      }

      nav ul li a {
        color: #fff;
        text-decoration: none;
        transition: all 0.2s ease-in-out;
      }

      nav ul li a:hover {
        color: #ffd800;
        transform: translateY(-3px);
      }



main {
  margin: 50px auto;
  max-width: 800px;
  padding: 0 20px;
}

h1 {
  font-size: 36px;
  text-align: center;
}

.cards-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}

.card {
  background-color: #fff;
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
  padding: 20px;
  width: 300px;
}

.card h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

.card p {
  font-size: 16px;
  margin-bottom: 10px;
}

footer {
  background-color: #463e3e;
  color: #ffffff;
  padding: 20px;
  text-align: center;
  position: absolute;
  bottom: 0;
  width: 100%;
}

.footer-content {
  display: flex;
  justify-content: center;
}

</style>





</html>