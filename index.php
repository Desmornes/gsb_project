<!DOCTYPE html> 
<html lang="fr"> 
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- Lien vers la bibliothèque Bootstrap -->
    <title>Page d'accueil</title> 
    <link rel="icon" href="vue_gsb/images/logo_gsb.png" type="image/png"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Manrope:wght@200&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> <!-- Liens vers les polices Google -->
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> <!-- Script JavaScript de Bootstrap -->
        <div id="carouselExampleFade" class="carousel slide carousel-fade"> <!-- Contenu du carrousel -->
            <div class="carousel-item active"> <!-- Première diapositive active -->
                <img src="vue_gsb/images/home_image.jpg" class="d-block w-100" alt="..."> <!-- Image de la diapositive -->
                <div class="carousel-caption d-none d-md-block"> <!-- Légende de la diapositive -->
                    <h1>Laboratoire GSB</h1>
                    <p>Informez-vous sur les médicaments que nous proposons ainsi que leur production.</p>
                </div>
            </div>
            <!-- Deuxième diapositive avec un lien -->
            <div class="carousel-item">
                <a href="controleur_gsb/controleur_medic.php" target="_blank">
                    <img src="vue_gsb/images/home_medicament.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Nos médicaments</h1>
                        <p>Tout savoir sur les médicaments et leurs effets thérapeutiques.</p>
                    </div>
                </a>
            </div>
            <!-- Troisième diapositive avec un lien -->
            <div class="carousel-item">
                <a href="controleur_gsb/controleur_activite.php" target="_blank">
                    <img src="vue_gsb/images/home_activite.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Nos activités</h1>
                        <p>Joignez-vous à nos activités secondaires.</p>
                    </div>
                </a>
            </div>
        </div>
        <!-- Contrôles de navigation du carrousel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</body>
<!-- Styles CSS -->
<style>
    body {
        font-family: "Playfair Display", serif;
        font-optical-sizing: auto; 
        font-weight: 500; 
        font-style: normal; 
    }
    .carousel-item img {
        object-fit: cover;  /*Ajustement de la taille de l'image*/
        height: 100vh; 
        width: 100%; 
    }
</style>
