<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<link href="css/html5-doctor-reset-stylesheet.css" rel="stylesheet"/>
<link href="css/style.css" rel="stylesheet"/>

<script src="scripts/jquery-1.11.1.min.js"></script>
<script src="scripts/script.js"></script>
<script src="scripts/slider/js/bjqs-1.3.min.js"></script>


</head>
<?php 
  if (isset($_GET['q'])) {
    $body_class = $_GET['q'];
  }
  else {
    $body_class = 'nyitolap';
  }
  if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
  } else {
    $lang = '';
  }
  
?>
<body class="<?php print $body_class; ?>">
  <div id="top-header">
    <div class="contacts">
      <div class="contact" id="contact-phone">
        <span class="info">+36 1 411 3500</span>
      </div>
      <div class="contact" id="contact-mail">
        <span class="info"><a href="http://okotars.hu">okotars@okotars.hu</a></span>
      </div>
      <div class="contact" id="contact-web">
        <span class="info"><a href="http://okotars.hu">www.okotars.hu</a></span>
      </div>
      <div class="contact" id="contact-address">
        <span class="info">H-1056 Budapest, Szerb utca 17-19.</span>
      </div>
      <div class="contact" id="contact-fb">
        <span class="info"><a href="https://www.facebook.com/okotars">Facebook</a></span>
      </div>
    </div>
  </div>
  <div id="header">
    <a id="header-logo" href="index.php"></a>
    <div id="header-text">
      <h2>
        <?php ($lang == 'en') ? print 'Annual report 2013' : print 'Éves jelentés'; ?>
      </h2>
      <p class="text">
         <?php ($lang == 'en') ? print 'Hungarian Environmental Partnership Foundation is a not-for-profit, politically independent organization promoting environmental improvement and awareness among civil society and the general public.'
         : print 'Az Ökotárs Alapítvány nem nyereségérdekelt, politikától független, a környezet állapotának javulásáért és a hazai civil szféra és lakosság környezeti érzékenységének és tudatosságának fejlesztéséért tevékenykedő szervezet.';
         ?>
        
      </p>
    </div>
  </div>
  <div id="main-menu">
    <?php include('inc/mainmenu.inc'); ?>
  </div>
  <div id="main-content">
    <a href="index.php<?php (isset($_GET['q'])) ? print '?q=' . $_GET['q'] : print ''; ?>">HU</a> |
    <a href="index.php<?php (isset($_GET['q'])) ? print '?q=' . $_GET['q'] . '&lang=en' : print '?lang=en'; ?>">EN</a>
    <?php (empty($_GET['q']) || $_GET['q'] == 'nyitolap') ? include('inc/idoszalag.php') : include('inc/' . $_GET['q'] . '.php'); ?>
  </div>
  <div id="footer">
    <div id="slider-wrapper">
      <div id="slider-title">
        <h2>Rólunk mondták</h2>
      </div>
      <div id="slider">
        <ul class="bjqs">
          <?php if ($lang == '') { ?>
            <li class="slide slide-1 slide-first">
              ... Ennyire "civil és felhasználóbarát”  pályázati kiírással és lebonyolítással nem találkoztam, mintaértékű, ahogy kialakítottátok a pályázati rendszert.
            </li>
            <li class="slide slide-2">
              ... A projekt során kapott támogatás, a személyes kapcsolattartás szinte szárnyakat ad egy meggyötört, lepattintáshoz  szokott civilnek.
            </li>
            <li class="slide slide-2">
              ... Jóleső érzéssel gondolok vissza az Önök kivételesen segítőkész hozzáállására, amelyhez hasonlót hivatalos szervek részéről hosszú életem során soha nem tapasztalhattam!
            </li>
            <li class="slide slide-2">
              Közösségi összefogással sok minden elérhető. A program hatására nagyobb lett az egymás iránti bizalom.
            </li>
            <li class="slide slide-2">
              Nagyon kevés a hasonló, közösséget is erősítő programok száma. A lakosság lelkesedése és részvétele messze meghaladta várakozásainkat.
            </li>
            <li class="slide slide-2">
              Nagyon kevés a hasonló, közösséget is erősítő programok száma. A lakosság lelkesedése és részvétele messze meghaladta várakozásainkat.
            </li>
          <?php } else { ?>
            <li class="slide slide-1 slide-first">
              ...I have never seen such “civil and user”  friendly grant program and management. The design of the program has a real model value.
            </li>
            <li class="slide slide-2">
              ...The support and the personal contact during the project management  gives you wings, specially for the average NGO who got used to being ignored.
            </li>
            <li class="slide slide-2">
              ...Your helpful attitude is exceptional, I never experienced such from official bodies in my life!
            </li>
            <li class="slide slide-2">
              Only a very few programs exist that strengthen communities. The enthusiasm of the citizens far exceeded our expectations.
            </li>
            <li class="slide slide-2">
              With the cooperation of the community we can achieve a low. The project enhanced mutual trust.
            </li>
            <li class="slide slide-2">
              I have never receveid a pence from this Norwegian money and I won’t in the future either. It is not important for me. I believe in the professionalism of Ökotárs; I know that the employees are trustworthy and serious people who have a 20 years of knowledge of the sector and they have worked for it ever since.
            </li>          
          <?php }; ?>
        </ul>
      </div>
    </div>
  </div>
  <div id="top-header">
    <div class="contacts">
      <div class="contact" id="contact-phone">
        <span class="info">+36 1 411 3500</span>
      </div>
      <div class="contact" id="contact-mail">
        <span class="info"><a href="http://okotars.hu">okotars@okotars.hu</a></span>
      </div>
      <div class="contact" id="contact-web">
        <span class="info"><a href="http://okotars.hu">www.okotars.hu</a></span>
      </div>
      <div class="contact" id="contact-address">
        <span class="info">H-1056 Budapest, Szerb utca 17-19.</span>
      </div>
      <div class="contact" id="contact-fb">
        <span class="info"><a href="https://www.facebook.com/okotars">Facebook</a></span>
      </div>
    </div>
  </div>
</body>
</html>