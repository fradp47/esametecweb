<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="styleman.css">
  <link rel="icon" href="favicoman.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fascinate&family=Lora:ital,wght@0,700;1,700&family=STIX+Two+Text:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <title>Mandarì - Home</title>
</head>

<body data-bs-spy="scroll" data-bs-target="#top" data-bs-offset="100" tabindex="0">


  <nav class="navbar" id="top">
    <a class="navbar-brand d-flex align-items-center">
      <img src="favicoman.png" alt="Logo Mandarì" style="height: 60px;" class="me-2">
      Mandarì</a>
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link" href="#chisiamo">Chi Siamo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#territorio">Territorio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="prodotti.php">Prodotti</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contatti.php">Contatti</a>
      </li>
    </ul>
  </nav>

  <div style="background-image: url(hero.png); padding: 150px;  background-size:cover;">
    <p style="text-align: center; font-size: 30px; font-weight: bold; color:rgb(213, 201, 172); font-family:Verdana, Geneva, Tahoma, sans-serif">La freschezza che senti, la qualità che meriti. <br> Scopri la nostra azienda!</p>
  </div>

  <div class="main" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example p-3 rounded-2" tabindex="0">
    <div class="container my-5">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2 id="chisiamo">Chi siamo</h2>
          <p>Siamo un'azienda <b>giovane</b>, fondata da un gruppo di ragazzi appassionati che hanno deciso di valorizzare le eccellenze agrumicole della <em>nostra terra</em>. La nostra missione è coltivare e distribuire agrumi di alta qualità, nati sotto il caldo sole mediterraneo e cresciuti con metodi sostenibili che rispettano la terra e la natura. </p>
          <p>La nostra sede si trova a <a style="color: #E07A5F;" href="https://it.wikipedia.org/wiki/Scordia" target="_blank">Scordia</a>, nel cuore della Sicilia orientale, una zona rinomata per la produzione di agrumi di eccellenza. Qui, la combinazione di un clima favorevole e di un terreno fertile ci permette di offrire frutti dal <b>sapore autentico</b> e dalla freschezza ineguagliabile. </p>
          <p>Crediamo nella filiera corta: raccogliamo i nostri agrumi solo su ordinazione, garantendo così la massima freschezza e genuinità. Ogni frutto racconta una storia di passione, tradizione e impegno verso la <b>sostenibilità ambientale</b>. <br>
            La nostra visione è quella di portare sulle tavole dei nostri clienti non solo prodotti di qualità.</p>
        </div>
        <div class="col-md-6">
          <img src="arance.jpg" alt="Foto rappresentativa" class="img-fluid rounded-2">
        </div>
      </div>
    </div>
    <div class="container my-5">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner rounded-2">
              <div class="carousel-item active">
                <img src="agrum.png" class="d-block w-100" alt="Mandarini 1">
              </div>
              <div class="carousel-item">
                <img src="fto3.jpeg" class="d-block w-100" alt="Mandarini 2">
              </div>
              <div class="carousel-item">
                <img src="foto.jpg" class="d-block w-100" alt="Mandarini 3">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Precedente</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Successivo</span>
            </button>
          </div>
        </div>
        <div class="col-md-6">
          <h2 id="territorio">Il territorio</h2>
          <p>Le nostre arance nascono nel cuore della Sicilia, precisamente a Scordia, una terra ricca di storia, cultura e una lunga b
            <b>tradizione agricola</b> che si tramanda da generazioni. La <a style="color: #E07A5F;" href="https://it.wikipedia.org/wiki/Piana_di_Catania">Piana di Catania</a>, con il suo clima mite, le brezze mediterranee e il terreno vulcanico fertile arricchito dalle ceneri dell’Etna, crea un habitat ideale per la coltivazione degli agrumi.
          </p>
          <p>Scordia non è solo il nostro luogo di lavoro, ma la nostra fonte di <em>ispirazione quotidiana</em>: una terra generosa che ci regala stagionalità e autenticità. Le arance qui coltivate sono il risultato di un perfetto connubio tra natura, tradizione e innovazione, elementi che ci permettono di portare sulle vostre tavole la freschezza e la qualità di prodotti autentici, figli di un ambiente straordinario e di una passione che da sempre anima le nostre famiglie.</p>
        </div>
      </div>
    </div>
    <div class="container my-5">
      <div class="row align-items-center">
        <div class="col-md-4">
          <h2>Il nostro Calendario</h2>
          <p>Presso la nostra azienda agrumicola, la passione per la terra e il <b>rispetto dei cicli naturali</b> guidano ogni fase della produzione. Con il nostro calendario di raccolta, desideriamo offrirvi una panoramica chiara e dettagliata della stagionalità dei nostri agrumi. Ogni varietà viene raccolta al momento della sua perfetta maturazione, garantendo così il massimo del sapore, della freschezza e delle proprietà nutritive. </p>
        </div>
        <div class="col-md-8">
          <img src="calendariofrutti.png" alt="calendario" class="img-fluid rounded-2">
        </div>
      </div>
    </div>

    <?php include "../inc/footman.php" ?>
    <a href="#top" class="back-to-top" title="Torna su">↑</a>
</body>

</html>