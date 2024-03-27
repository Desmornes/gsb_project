
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>medicament</title>
    </head>
    <body>
      <img class="side-img" src="images/medicaments.jpg">
      <div>
        <h1>Nom du médicament</h1>
        <div class="card" style="width: 18rem;">
          <img src="images/pill-icon.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Nom du médicament</h5>
            <p class="card-text">Description du médicament</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Effets thérapeutiques</li>
            <li class="list-group-item">Effets secondaires</li>
          </ul>
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

      .card {
        background-color: #2A201E;
        color: white;
        border-radius:0px;
        border-width: 2px;
        border-color: white;
      }

      .card-body {
        background-color: #2A201E;
        color: white;
      }
      
    </style>
</html>
