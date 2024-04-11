<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php 
        $decoded_result = json_decode($result, true);
        $activite = $decoded_result[0]; ?>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        <form method="post" action="controleur_activite.php?idAct=<?php echo $activite["_id_activite"]; ?>&action=ADD">
          <div class="form-container">
            <div class="form-row">
                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Adresse Email :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="telephone">Numéro de téléphone :</label>
                    <input type="tel" id="telephone" name="telephone">
                </div>
            </div>
            <div class="form-group">
                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="4" cols="50"></textarea>
            </div>
          </div>
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
            <a href="../vue_gsb/plan_du_site.html" target="_blank">Plan du site</a><br>
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
        margin-left:50px;
        margin-top:50px;
      }

      .form-container {
          display: flex;
          flex-direction: column;
          gap: 20px;
      }

      .form-row {
          display: flex;
          gap: 20px;
      }

      .form-group {
          display: flex;
          flex-direction: column;
      }

      input, textarea {
        border-color:white;
        border-width: 2px;
        background: transparent;
        padding:4px;
        color:white;
        outline: 0;
      }

      input[type=submit]{
        margin-top:10px;
        padding:4px;
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
