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
        </div>
        </form>
        
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
      
    </style>
</html>
