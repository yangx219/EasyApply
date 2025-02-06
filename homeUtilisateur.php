<?php
// Démarrer la session
session_start();

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
 <head>
    <style>
      /* Style pour la navbar */
      body {
        background-image: url("img_nature.jpg");
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

      /* Style pour le formulaire de recherche */
      .action-buttons {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  margin-top: 100px;
}

.search-form {
  display: flex;
  align-items: center;
  margin-right: 10px;
}

.search-form input[type="text"] {
  width: 300px;
  padding: 8px;
  font-size: 16px;
  border: none;
  border-bottom: 2px solid #ccc;
  margin-right: 10px;
}

.search-form button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 8px;
  font-size: 16px;
}

.buttons-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.button {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px 16px;
  font-size: 16px;
  margin-top: 10px;
  text-align: center;
  text-decoration: none;
  cursor: pointer;
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
 </head>
 <body>
    <nav>
      <img src="img_nature.jpg" alt="Logo">
      <li><span class="message-bienvenue"><?php echo $message_bienvenue; ?></span></li>
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

    <div class="action-buttons">
      <form class="search-form" action="recherche.php" method="GET">
      <select name="filter">
        <option value="poste">Nom de poste</option>
        <option value="entreprise">Nom d'entreprise</option>
      </select>
        <input type="text" name="recherche" placeholder="Rechercher...">
        <button type="submit">Rechercher</button>
      </form>
      <div class="buttons-container">
        <a href="ajoutCandidature.html" class="button">Ajouter une candidature</a>
      </div>
    </div>
    
    <footer>
      <div class="footer-content">
        <p>Toujours pour vous aider.</p>
      </div>
    </footer>
 </body>   
</html>
