<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mandarì - Prodotti</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="favicoman.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Fascinate&family=Lora:ital,wght@0,700;1,700&family=STIX+Two+Text:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styleman.css"/>
  <style>
    .container {
      max-width: 1000px;
      margin: 50px auto;
      padding: 0 20px;
    }

    h3 {
      color: #588157;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      font-size: 24px;
      margin-top: 1rem;
    }

    .product {
      display: flex;
      flex-wrap: wrap;
      margin-bottom: 50px;
      align-items: center;
    }

.product-card {
  background-color:rgba(244, 227, 215, 0.71);
  border-radius: 20px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  padding: 20px;
  margin-bottom: 30px;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

    .product img {
      width: 100%;
      max-width: 400px;
      border-radius: 20px;
      margin: 10px;
    }

    .product-info {
      flex: 1;
      padding: 20px;
    }

    .btn {
      background-color: #A3B18A;
      color: #F4E3D7;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 10px;
      display: inline-block;
      margin-top: 10px;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #3a5a40;
      color:  #E07A5F;
    }

    @media (max-width: 768px) {
      .product {
        flex-direction: column;
        text-align: center;
      }

      .product-info {
        padding: 10px;
      }
    }
  </style>
</head>
<body>
<?php
include "../inc/navbarm.php";
?>

<div class="container">
  <h2>I nostri prodotti</h2>
  <p>Puoi ordinare i nostri prodotti qui sotto tramite e-mail, telefonarci al numero che trovi nella sezione <em>contatti</em>, o venirci a trovare se ti fa piacere! </p>
  <div class="product-card">
  <div class="product">
    <img src="tarocco.jpg" alt="Arancia Tarocco">
    <div class="product-info">
      <h3>Arancia Tarocco</h3>
      <p>Dolce, succosa, coltivata nel rispetto della natura. Disponibile da dicembre a marzo. Ideale per spremute e dolci.</p>
      <p><strong>Disponibilità:</strong> Inverno</p>
      <p><strong>Prezzo:</strong> €2,50/kg</p>
      <a href="mailto:info@mandari.it?subject=Ordine%20Arance%20Tarocco" class="btn">Ordina</a>
    </div>
  </div>
</div>

 <div class="product-card">
  <div class="product">
    <img src="avana.jpg" alt="Mandarino Avana">
    <div class="product-info">
      <h3>Mandarino Avana</h3>
      <p>Profumato e facilissimo da sbucciare. Ottimo come snack o per marmellate. Coltivato con passione a Scordia.</p>
      <p><strong>Disponibilità:</strong> Novembre - Gennaio</p>
      <p><strong>Prezzo:</strong> €2,80/kg</p>
      <a href="mailto:info@mandari.it?subject=Ordine%20Mandarini" class="btn">Ordina</a>
    </div>
  </div>
</div>
<div class="product-card">
  <div class="product">
    <img src="limoni.jpg" alt="Limoni di Sicilia">
    <div class="product-info">
      <h3>Limoni</h3>
      <p>Limoni di Sicilia profumati e succosi, perfetti per cucina e bevande. Raccolti a mano durante tutto l’anno.</p>
      <p><strong>Disponibilità:</strong> Tutto l’anno</p>
      <p><strong>Prezzo:</strong> €2,00/kg</p>
      <a href="mailto:info@mandari.it?subject=Ordine%20Limoni" class="btn">Ordina</a>
    </div>
  </div>
</div>
</div>
<?php
include "../inc/footman.php";
?>
</body>
</html>
