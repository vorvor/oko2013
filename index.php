<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<link href="css/html5-doctor-reset-stylesheet.css" rel="stylesheet"/>
<link href="css/style.css" rel="stylesheet"/>
<script src="scripts/jquery-1.11.1.min.js"></script>
<script src="scripts/script.js"></script>
</head>
<?php 
  if (isset($_GET['q'])) {
    $body_class = $_GET['q'];
  }
  else {
    $body_class = 'nyitolap';
  }
?>
<body class="<?php print $body_class; ?>">
  <div id="top-header">
    <div class="contacts">
      <div class="contact" id="contact-phone">
        <span class="info">+36 1 411 3500</span>
      </div>
      <div class="contact" id="contact-mail">
        <span class="info">okotars@okotars.hu</span>
      </div>
      <div class="contact" id="contact-web">
        <span class="info">www.okotars.hu</span>
      </div>
      <div class="contact" id="contact-address">
        <span class="info">H-1056 Budapest, Szerb utca 17-19.</span>
      </div>
      <div class="contact" id="contact-fb">
        <span class="info">Facebook
      </div>
    </div>
  </div>
  <div id="header">
    <div id="header-logo"></div>
    <div id="header-text">
      <h2>Éves jelentés</h2>
      <p class="text">
        Az Ökotárs Alapítvány nem nyereségérdekelt, politikától független, a környezet állapotának javulásáért és a hazai civil szféra és lakosság környezeti érzékenységének és tudatosságának fejlesztéséért tevékenykedő szervezet.
      </p>
    </div>
  </div>
  <div id="main-menu">
    <?php include('inc/mainmenu.inc'); ?>
  </div>
  <div id="main-content">
    <?php (empty($_GET['q']) || $_GET['q'] == 'nyitolap') ? include('inc/idoszalag.php') : include('inc/' . $_GET['q'] . '.php'); ?>
  </div>
  <div id="footer">
    <div id="slider-wrapper">
      <div id="slider-title">
        <h2>Rólunk mondták</h2>
      </div>
      <div id="slider">
        <div id="slides">
          <div id="slide-tape">
            <div class="slide slide-1 slide-first">
              ... Ennyire "civil és felhasználóbarát”  pályázati kiírással és lebonyolítással nem találkoztam, mintaértékű, ahogy kialakítottátok a pályázati rendszert.
            </div>
            <div class="slide slide-2">
              ….A projekt során kapott támogatás, a személyes kapcsolattartás szinte szárnyakat ad egy meggyötört, lepattintáshoz  szokott civilnek.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="footer-bottom">
    <div class="contacts">
      <div class="contact" id="contact-phone">
        <span class="info">+36 1 411 3500</span>
      </div>
      <div class="contact" id="contact-mail">
        <span class="info">okotars@okotars.hu</span>
      </div>
      <div class="contact" id="contact-web">
        <span class="info">www.okotars.hu</span>
      </div>
      <div class="contact" id="contact-address">
        <span class="info">H-1056 Budapest, Szerb utca 17-19.</span>
      </div>
      <div class="contact" id="contact-fb">
        <span class="info">Facebook
      </div>
    </div>
  </div>
</body>
</html>