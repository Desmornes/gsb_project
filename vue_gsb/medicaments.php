<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../vue_gsb/images/logo_gsb.png" type="image/png">
    <title>Médicaments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="position-relative">
    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Icône de menu -->
    <div class="position-absolute top-0 end-0 m-3">
        <img class="burger-menu" src="../vue_gsb/images/burger-menu-icon.png" width="50" height="50" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"/>
    </div>
    <!-- Image latérale -->
    <img src="../vue_gsb/images/medicaments-side.jpg" class="side-img">
    <!-- Contenu principal -->
    <div class="contenu">
        <h1 class="mb-4">Liste des médicaments</h1>
        <!-- Introduction -->
        <p>
        Chez GSB, nous nous engageons à vous fournir des produits pharmaceutiques de qualité, accompagnés d'informations précises et fiables pour vous aider à prendre des décisions éclairées concernant leur santé. Explorez notre liste complète de médicaments ci-dessous :
        </p>
        <!-- Tableau des médicaments -->
        <table class="mb-4">
          <thead>
            <tr>
              <th scope="col">Référence</th>
              <th scope="col">Nom</th>
              <th scope="col">Type</th>
              <th scope="col">Informations supplémentaires</th>
            </tr>
            </thead>
            <tbody>
            <!-- Boucle PHP pour afficher les médicaments -->
            <?php
            $medicaments = json_decode($result, true);
             foreach ($medicaments as $medicament): ?>
                      <tr>
            <th scope="row"><?php echo $medicament['_id_medicament']; ?></th>
            <td><?php echo $medicament['_nom']; ?></td>
            <td><?php echo $medicament['_type']; ?></td>
            <td><a href="http://localhost/gsb_projet/controleur_gsb/controleur_medic.php?idMed=<?php echo $medicament['_id_medicament']; ?>">Voir plus d'informations</a></td>
            </tr>
            <?php endforeach; ?>
            <!-- Fin de la boucle PHP -->
          </tbody>
        </table>
        <!-- Informations complémentaires -->
        <p>Pour chaque médicament, nous fournissons des informations sur son utilisation recommandée, ses effets secondaires potentiels et les précautions à prendre lors de son utilisation. Si vous avez des questions sur l'un de nos produits ou si vous avez besoin de conseils supplémentaires, n'hésitez pas à contacter notre équipe de pharmaciens expérimentés.</p>
    </div>
    <!-- Bouton pour passer à la page suivante -->
    <div class="position-absolute bottom-0 end-0 m-3">
      <a href="../controleur_gsb/controleur_activite.php">
        <img src="../vue_gsb/images/next-page-icon.png" width="100" height="100"/>
      </a>
    </div>
    <!-- Menu offcanvas -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
        <a href="../">
            <img src="../vue_gsb/images/logo_gsb.png" width="100" height="100">
          </a>
        </div>
        <div class="offcanvas-body">
            <!-- Liens du menu offcanvas -->
            <a>Médicaments</a><br>
            <a href="../controleur_gsb/controleur_activite.php" target="_blank">Activités</a><br>
            <hr> <!-- Ligne de séparation -->
            <a href="../vue_gsb/mentions_legales.html" target="_blank">Mentions légales</a><br>
            <a href="../vue_gsb/politique_de_confidentialite.html" target="_blank">Politique de confidentialité</a><br>
            <a href="../vue_gsb/politique_de_cookies.html" target="_blank">Politique de cookies</a><br>
        </div>
    </div>
</body>
</html>

<style>
    /* Styles CSS */

    body {
      background-color: #2A201E;
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
      display: flex;
      flex-direction: column;
      width:100%;
      flex-wrap:wrap;
      margin: 50px;
      margin-top:70px;
      margin-right:120px;
    }

    .offcanvas {
      background-color: #2A201E;
      color:white;
    }

    .side-img {
      object-fit: cover;
      height: 100vh;
      width: 40%;
    }

    table, td, th {
      border-bottom: 1px solid white;
      text-align: center;
      padding:7px;
    }

    table {
      border-collapse: collapse;
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
