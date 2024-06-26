<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        // Décodage du résultat JSON
        $decoded_result = json_decode($result, true);
        // Récupération du premier médicament
        $medicament = $decoded_result[0];
    ?>
    <meta charset="utf-8">
    <link rel="icon" href="../vue_gsb/images/logo_gsb.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?php echo $medicament["_nom"] ?></title>
</head>
<body>
    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Icône de menu -->
    <div class="position-absolute top-0 end-0 m-3">
        <img class="burger-menu" src="../vue_gsb/images/burger-menu-icon.png" width="50" height="50" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"/>
    </div>
    <!-- Image latérale -->
    <img class="side-img" src="../vue_gsb/images/medicaments.jpg">
    <!-- Contenu principal -->
    <div class="contenu">
        <h1><?php echo $medicament["_nom"] ?></h1>
        <br>
        <div>
            <!-- Titre du type -->
            <h2>Type</h2>
            <!-- Affichage du type du médicament -->
            <p><?php echo $medicament["_type"] ?></p>
            <hr>
            <!-- Titre des effets thérapeutiques -->
            <h2>Effets thérapeutiques</h2>
            <ul>
                <!-- Boucle pour afficher les effets thérapeutiques -->
                <?php foreach($medicament["effets_therapeutiques"] as $effet): ?>
                <li><?php echo $effet["_nom_effet_therapeutique"] ?></li>
                <?php endforeach;?>
            </ul>
            <hr>
            <!-- Titre des effets secondaires -->
            <h2>Effets secondaires</h2>
            <ul>
                <!-- Boucle pour afficher les effets secondaires -->
                <?php foreach($medicament["effets_secondaires"] as $effet): ?>
                <li><?php echo $effet["_nom_effet_secondaire"] ?></li>
                <?php endforeach;?>
            </ul>
            <hr>
            <!-- Titre des interactions -->
            <h2>Interactions</h2>
            <ul>
                <!-- Boucle pour afficher les interactions -->
                <?php foreach($medicament["interactions"] as $medicament): ?>
                <li><?php echo $medicament["_nom"] ?></li>
                <?php endforeach;?> 
            </ul>      
        </div>
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
            <a href="../controleur_gsb/controleur_medic.php" target="_blank">Médicaments</a><br>
            <a href="../controleur_gsb/controleur_activite.php">Activités</a><br>
            <hr> <!-- Ligne de séparation -->
            <a href="../vue_gsb/mentions_legales.html" target="_blank">Mentions légales</a><br>
            <a href="../vue_gsb/politique_de_confidentialite.html" target="_blank">Politique de confidentialité</a><br>
            <a href="../vue_gsb/politique_de_cookies.html" target="_blank">Politique de cookies</a><br>
        </div>
    </div>
</body>
<style>
  /* Styles CSS */

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

  .offcanvas {
    background-color: #2A201E;
    color:white;
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
