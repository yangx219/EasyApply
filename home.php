<?php
if(session_status() !== PHP_SESSION_NONE) session_destroy();
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
      .description-cadre {
        width: 60%;
        margin: 80px auto 0 auto;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        background-color: #f5f5f5;
        text-align: justify;
      }
      .description-cadre h2 {
        color: #463e3e;
        font-size: 24px;
        margin-top: 0;
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
      <ul>
        <li><a href="questionnaireSatisfaction.html">Votre avis </a></li>
        <li><a href="signUp.html">signup</a></li>
        <li><a href="login.html">login</a></li>
        <li><a href="home.php">Home</a></li>
      </ul>
    </nav>

    <div class="description-cadre">
      <h2>Description de notre site</h2>
      <p> EasyApply est une application dédiée aux étudiants cherchant un emploi, un stage ou une alternance  afin de les accompagner dans la gestion et le suivi de leurs candidatures tout au long du processus de recherche.  
Votre avis nous intéresse ! Merci de participer à notre enquête, cela ne vous prendra que quelques minutes.
</p>
  </div>



  <footer>
  <div class="footer-content">
    <p>Toujours pour vous aider.</p>
  </div>
</footer>

 </body>   
</html>

