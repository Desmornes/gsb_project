<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php 
        $decoded_result = json_decode($result, true);
        $activite = $decoded_result[0]; ?>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="icon" href="../vue_gsb/images/logo_gsb.png" type="image/png">
        <title><?php echo $activite["nom_activite"]; ?></title>
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="position-absolute top-0 end-0 m-3">
        <img class="burger-menu" src="../vue_gsb/images/burger-menu-icon.png" width="50" height="50" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"/>
    </div>
      <img class="side-img" src="../vue_gsb/images/activites.jpg">
      <div class="contenu">
        <h1><?php echo $activite["nom_activite"]; ?></h1>
        <br>
        <div>
          <h2>
            Description
          </h2>
          <p><?php echo $activite["_description_activite"]; ?></p>
          <hr>
          <h2>
            Lieu
          </h2>
          <p><?php echo $activite["_lieu_activite"]; ?></p>
          <hr>
          <h2>
            Date et horaires
          </h2>
          <p><?php echo $activite["_date_activite"]; ?></p>
        </div>
        <hr>
        <h2>
          S'inscrire
        </h2>
        <form method="post" action="controleur_activite.php?action=ADD">
        <div class="form-container">
            <div class="form-row">
                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom">
                </div>
            </div>
            <div class="form-group">
                <label for="email">Adresse Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <input type="hidden" id="idAct" name="idAct" value="<?php echo $activite["_id_activite"]; ?>">
        </div><br>
        <input type="submit" value="Envoyer">
        </form>
      </div>
      <!-- Menu offcanvas -->
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
          <div class="offcanvas-header">
            <a href="../">
              <img src="../vue_gsb/images/logo_gsb.png" width="100" height="100">
            </a>
          </div>
          <div class="offcanvas-body">
            <a href="../controleur_gsb/controleur_medic.php" target="_blank">Médicaments</a><br>
            <a href="../controleur_gsb/controleur_activite.php">Activités</a><br>
            <hr>
            <a href="../vue_gsb/mentions_legales.html" target="_blank">Mentions légales</a><br>
            <a href="../vue_gsb/politique_de_confidentialite.html" target="_blank">Politique de confidentialité</a><br>
            <a href="../vue_gsb/politique_de_cookies.html" target="_blank">Politique de cookies</a><br>
        </div>
      </div>
      
    </body>
    <style>
      .side-img {
        object-fit: cover;
        height: 100vh;
        width: 50%;
      }

      body {
        height: 100vh;
        display: flex;
        flex-direction: row;
        font-family: "Playfair Display", serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
        background-color: #2A201E;
        color: white;
      }

      .offcanvas {
      background-color: #2A201E;
      color:white;
      }

      .contenu {
        margin:150px;
        margin-top: 90px;
        margin-left: 90px;
      }

      .form-container {
        display: grid;
        gap: 20px;
        grid-template-columns: auto;
        width:30%;
      }

      .form-group {
        display: flex;
        flex-direction: column;
      }

      .form-row {
        display: grid;
        gap: 20px;
        grid-template-columns: repeat(2, auto);
      }

      input, textarea {
        border-color:white;
        border-width: 2px;
        background: transparent;
        padding:4px;
        color:white;
        outline: 0;
      }

      a {
      color: #E3D0CD;
      text-decoration: none;
      transition: color 0.3s ease;
      font-style: normal;
      text-decoration-line: underline;
      text-decoration-thickness: 1px;
      text-underline-offset: 2px;
    }

    a:hover {
      color: white;
    }

    .offcanvas-body a{
      font-size: 1.5rem; 
      line-height: 2rem;
      text-decoration-line: none;
    }
      
    </style>
</html>
