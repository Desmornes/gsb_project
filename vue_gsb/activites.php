<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activités</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="position-relative">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="position-absolute top-0 end-0 m-3">
        <img class="burger-menu" src="../vue_gsb/images/burger-menu-icon.png" width="50" height="50" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"/>
    </div>
    <img src="../vue_gsb/images/activites-side.jpg" class="side-img">
    <div class="contenu">
        <h1 class="mb-4">Nos activités proposées</h1>
        <p>
        Chez GSB, nous croyons en l'importance d'aller au-delà de la simple fourniture de médicaments en offrant à nos clients des activités éducatives et informatives pour les aider à mieux comprendre leur santé et leurs traitements. Découvrez nos activités en lien avec les médicaments ci-dessous :        </p>
        <table class="mb-4">
          <thead>
            <tr>
              <th scope="col">Référence</th>
              <th scope="col">Nom</th>
              <th scope="col">Informations supplémentaires</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $tableauObjets = json_decode($result, true);
          foreach ($tableauObjets as $activite) : ?>
            <tr>
              <th scope="row"><?php echo $activite['_id_activite']; ?></th>
              <td><?php echo $activite['nom_activite']; ?></td>
              <td><a href="http://localhost/gsb_projet/controleur_gsb/controleur_activite.php?idAct=<?php echo $activite['_id_activite']; ?>">Voir plus d'informations</a></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
        <p>Nous sommes déterminés à vous fournir les connaissances et les outils nécessaires pour prendre en charge votre santé de manière proactive. Pour plus d'informations sur nos activités en lien avec les médicaments ou pour vous inscrire à l'un de nos événements, veuillez contacter notre équipe.</p>
        <p>Merci de choisir GSB. Nous sommes là pour vous accompagner à chaque étape de votre parcours de santé.</p>
    </div>
    <div class="position-absolute bottom-0 end-0 m-3">
      <a href="../controleur_gsb/controleur_medic.php">
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
            <a href="../controleur_gsb/controleur_medic.php" target="_blank">Médicaments</a><br>
            <a>Activités</a><br>
            <hr>
            <a href="../vue_gsb/mentions_legales.html" target="_blank">Mentions légales</a><br>
            <a href="../vue_gsb/politique_de_confidentialite.html" target="_blank">Politique de confidentialité</a><br>
            <a href="../vue_gsb/politique_de_cookies.html" target="_blank">Politique de cookies</a><br>
        </div>
    </div>
</body>
</html>
<style>
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
