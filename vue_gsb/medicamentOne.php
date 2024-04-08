<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Nom du médicament</title>
    </head>
    <body>
      <img class="side-img" src="images/medicaments.jpg">
      <div class="contenu">
        <h1>Nom du médicament</h1>
        <br>
        <div>
          <!-- <img src="images/pill-icon.png" class="card-img-top" alt="..."> -->
          <h2>
            Type
          </h2>
          <p>blabla contenu type</p>
          <hr>
          <h2>
            Effets thérapeutiques
          </h2>
          <p>blabla contenu effets thérapeutiques</p>
          <hr>
          <h2>
            Effets secondaires
          </h2>
          <p>blabla contenu effets secondaires</p>
          <hr>
          <h2>
            Interactions
          </h2>
          <p>blabla contenu interactions</p>
          <hr>
          <h2>
            Indications
          </h2>
          <p>blabla contenu indications</p>          
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

      .contenu {
        margin-left:50px;
        margin-top:50px;
      }
      
    </style>
</html>
