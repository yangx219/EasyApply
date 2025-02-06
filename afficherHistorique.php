

<?php
// Démarrer la session
if(session_status() === PHP_SESSION_NONE) session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['nom'])) {
  // Afficher un message de bienvenue avec le nom de l'utilisateur
  $message_bienvenue = "Bienvenue, " . $_SESSION['nom'] . "!";
} else {
  // Si l'utilisateur n'est pas connecté, afficher un message d'invitation à la connexion
  $message_bienvenue = "Connectez-vous pour accéder à toutes les fonctionnalités du site";
}
?>

<html>
 <body>
    
 <ul>
  <li><a href="home.php">Deconnexion</a></li>
  <li><a href="afficherCandidature.php">Mes candidatures</a></li>
  <li><a href="signUp.html">Mes infos</a></li>
  <li><a href="homeUtilisateur.php">Home</a></li>
        </ul> 


        
<?php 


//identifiants base de donnée 
$username = 'c##amerab3_a';
$password = 'amerab3_a';

$conn = oci_connect($username, $password, null, 'AL32UTF8');
if (!$conn) {
//erreur de connexion

}

//affichier la liste de tout l'historique de l'utilisateur 
$idc=$_SESSION["idc"];
$stid = oci_parse($conn, "SELECT * FROM historique WHERE idc='$idc'");
oci_execute($stid);



echo '<table>';
while ($row = oci_fetch_assoc($stid)) {
    echo '<tr>';
    foreach ($row as $cell) {
        echo '<td>' . $cell . '</td>';
    }
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


ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #463e3e;
}

li {
  float: right;
}

li a {
  display: block;
  color: white;
  text-alihassnouaign: center;
  padding: 20px 16px;
  text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: #111;
}
.bg-img {
  /* The image used */
  background-image: url("img_nature.jpg");

  min-height: 1500px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: repeat;
  background-size: cover;
  opacity: 1;

  /* Needed to position the navbar */
  position: relative;
}


footer {
  background-color: #463e3e;
  color: #ffffff;
  padding: 20px;
  text-align: center;
  position: relative;
  bottom: 0;
  width: 100%;
}

.footer-content {
  display: flex;
  justify-content: center;
}




</style>





</html>