<?php

// Configurazione errori per debug (commentare in produzione)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Carica PHPMailer
require_once __DIR__ . '/PHPMailer/Exception.php';
require_once __DIR__ . '/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Configurazione email
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_USER', 'francescadipietro00@gmail.com');
define('SMTP_PASS', 'lrom cput ccfc drtw');
define('SMTP_PORT', 587);
define('FROM_EMAIL', 'francescadipietro00@gmail.com');
define('FROM_NAME', 'Mandarì');
define('TO_EMAIL', 'francescadipietro00@gmail.com');

// Avvio sessione
session_start();

// Genera token CSRF
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Variabili di stato
$feedback = '';
$feedbackType = '';
$formData = [
  'nome' => '',
  'email' => '',
  'oggetto' => '',
  'messaggio' => ''
];

/**
 * Valida i dati del form
 */
function validateForm($data)
{
  $errors = [];

  // Nome
  if (empty(trim($data['nome']))) {
    $errors[] = 'Il nome è obbligatorio';
  } elseif (strlen(trim($data['nome'])) < 2) {
    $errors[] = 'Il nome deve contenere almeno 2 caratteri';
  }

  // Email
  if (empty(trim($data['email']))) {
    $errors[] = 'L\'email è obbligatoria';
  } elseif (!filter_var(trim($data['email']), FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'L\'email non è valida';
  }

  // Oggetto
  if (empty(trim($data['oggetto']))) {
    $errors[] = 'L\'oggetto è obbligatorio';
  } elseif (strlen(trim($data['oggetto'])) < 3) {
    $errors[] = 'L\'oggetto deve contenere almeno 3 caratteri';
  }

  // Messaggio
  if (empty(trim($data['messaggio']))) {
    $errors[] = 'Il messaggio è obbligatorio';
  } elseif (strlen(trim($data['messaggio'])) < 10) {
    $errors[] = 'Il messaggio deve contenere almeno 10 caratteri';
  }

  return $errors;
}

/**
 * Invia email tramite PHPMailer
 */
function sendEmail($nome, $email, $oggetto, $messaggio)
{
  try {
    $mail = new PHPMailer(true);

    // Configurazione server
    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = SMTP_USER;
    $mail->Password = SMTP_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = SMTP_PORT;

    // Mittente e destinatario
    $mail->setFrom(FROM_EMAIL, FROM_NAME);
    $mail->addAddress(TO_EMAIL);
    $mail->addReplyTo($email, $nome);

    // Contenuto email
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = '🍊 Mandarì - ' . $oggetto;

    // Corpo HTML
    $mail->Body = '
        <html>
        <head><meta charset="UTF-8"></head>
        <body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
            <div style="max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f9f9;">
                <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <h2 style="color:#A3B18A; margin-bottom: 20px; text-align: center;">
                        <span style="color: #E07A5F;">📧</span> Nuovo messaggio da Mandarì.
                    </h2>
                    
                    <div style="background: #F4E3D7 ; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                        <h3 style="color:#A3B18A; margin-top: 0;">Dettagli Contatto</h3>
                        <p style="margin: 8px 0;"><strong>Nome:</strong> ' . htmlspecialchars($nome) . '</p>
                        <p style="margin: 8px 0;"><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>
                        <p style="margin: 8px 0;"><strong>Oggetto:</strong> ' . htmlspecialchars($oggetto) . '</p>
                        <p style="margin: 8px 0;"><strong>Data:</strong> ' . date('d/m/Y H:i') . '</p>
                    </div>
                    
                    <div style="background: #fff; padding: 20px; border-left: 4px solid #E07A5F ; margin-bottom: 20px;">
                        <h3 style="color: #2c3e50; margin-top: 0;">Messaggio:</h3>
                        <div style="color: #34495e; line-height: 1.6;">
                            ' . nl2br(htmlspecialchars($messaggio)) . '
                        </div>
                    </div>
                    
                    <div style="text-align: center; padding-top: 20px; border-top: 1px solid #ecf0f1;">
                        <p style="color: #7f8c8d; font-size: 14px; margin: 0;">
                            Messaggio inviato automaticamente dal sito Mandarì.
                        </p>
                    </div>
                </div>
            </div>
        </body>
        </html>';

    // Testo
    $mail->AltBody = "Nuovo messaggio da Mandarì\n\n" .
      "Nome: $nome\n" .
      "Email: $email\n" .
      "Oggetto: $oggetto\n" .
      "Data: " . date('d/m/Y H:i') . "\n\n" .
      "Messaggio:\n$messaggio\n\n" .
      "---\n" .
      "Messaggio inviato da Mandarì";

    return $mail->send();
  } catch (Exception $e) {
    error_log("Errore invio email: " . $e->getMessage());
    return false;
  }
}

// Gestione POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verifica CSRF
  if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
    http_response_code(403);
    die('Token CSRF non valido');
  }


  // Sanitizza input
  $formData = [
    'nome' => trim($_POST['nome'] ?? ''),
    'email' => trim($_POST['email'] ?? ''),
    'oggetto' => trim($_POST['oggetto'] ?? ''),
    'messaggio' => trim($_POST['messaggio'] ?? '')
  ];

  // Validazione
  $errors = validateForm($formData);

  if (empty($errors)) {
    // Invio email
    if (sendEmail($formData['nome'], $formData['email'], $formData['oggetto'], $formData['messaggio'])) {
      $feedback = 'Perfetto! Il tuo messaggio è stato inviato con successo.';
      $feedbackType = 'success';

      // Reset form e rigenera token
      $formData = ['nome' => '', 'email' => '', 'oggetto' => '', 'messaggio' => ''];
      $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    } else {
      $feedback = 'Si è verificato un errore durante l\'invio. Riprova più tardi o contattami direttamente via email.';
      $feedbackType = 'danger';
    }
  } else {
    $feedback = implode('<br>• ', $errors);
    $feedbackType = 'danger';
  }
}
?>


<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mandarì - Contatti</title>
  <link rel="icon" href="favicoman.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="prodotti.css" />
  <link href="https://fonts.googleapis.com/css2?family=Fascinate&family=Lora:ital,wght@0,700;1,700&family=STIX+Two+Text:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
</head>

<body>
  <?php include "../inc/navbarm.php" ?>

  <main class="main-content">
    <section class="contact-container">

      <div class="contact-columns">
        <div class="contact-info">
          <h3 style="text-align: center;">Informazioni di Contatto</h3>
          <p>Se vuoi avere più informazioni, visitare l'azienda o collaborare con noi, non esitare a contattarci. Siamo sempre felici di rispondere alle vostre domande.</p>
          <p><strong>Indirizzo:</strong> Via delle Zagare, 10, 95048 Scordia (CT), Italia</p>
          <p><strong>Email:</strong> <a href="mailto:info@mandari.it">info@mandari.it</a></p>
          <p><strong>PEC:</strong> <a href="mailto:info@mandari.it">info@mandarisrl.pec.it</a></p>
          <p><strong>Telefono:</strong> +39 095 6575 11</p>
          <p><strong>P. Iva:</strong>01234567891</p>
          <div id="map" style="height:300px; background:lightgray;"></div>
        </div>
        <div class="contact-form-wrapper">
          <div class="row">
            <div">
              <div class="contact-form">
                <div class="card-body p-3">

                  <?php if ($feedback): ?>
                    <div class="alert alert-<?php echo htmlspecialchars($feedbackType); ?>">
                      <?php echo $feedback; ?>
                    </div>
                  <?php endif; ?>

                  <form method="post" novalidate>
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label for="nome" class="form-label">Nome</label>
                        <input
                          type="text"
                          class="form-control custom-input"
                          id="nome"
                          name="nome"
                          value="<?php echo htmlspecialchars($formData['nome']); ?>"
                          placeholder="Il tuo nome"
                          required
                          maxlength="100" />
                      </div>

                      <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input
                          type="email"
                          class="form-control custom-input"
                          id="email"
                          name="email"
                          value="<?php echo htmlspecialchars($formData['email']); ?>"
                          placeholder="la-tua-email@esempio.it"
                          required
                          maxlength="255" />
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="oggetto" class="form-label">Oggetto</label>
                      <input
                        type="text"
                        class="form-control custom-input"
                        id="oggetto"
                        name="oggetto"
                        value="<?php echo htmlspecialchars($formData['oggetto']); ?>"
                        placeholder="Oggetto"
                        required
                        maxlength="200" />
                    </div>

                    <div class="mb-4">
                      <label for="messaggio" class="form-label">Messaggio</label>
                      <textarea
                        class="form-control custom-input"
                        id="messaggio"
                        name="messaggio"
                        rows="6"
                        placeholder="Scrivi qui la tua richiesta!"
                        required
                        maxlength="2000"><?php echo htmlspecialchars($formData['messaggio']); ?></textarea>
                    </div>

                    <div class="text-center contact-form-button">
                      <button
                        type="submit"
                        class="btn btn-success btn-lg custom-submit-btn">
                        <i class="fas fa-paper-plane me-2"></i>Invia Messaggio
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
    </section>
  </main>
  <?php include "../inc/footman.php" ?>

  <script>
    var map = L.map('map').setView([37.279161, 14.849313], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    var popup = L.popup()
      .setLatLng([37.279161, 14.849313])
      .setContent("Mandarì s.r.l")
      .openOn(map);
  </script>
</body>

</html>