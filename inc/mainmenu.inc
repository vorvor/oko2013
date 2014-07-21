<?php
  if ($lang == '') {
    $menu = array('nyitolap' => 'Nyitólap',
                'reporter' => 'Adományi adatbázis',
                'magunkrol' => 'Magunkról',
                'eredmenykimutatas' => 'Pénzügyi jelentés',
                'koszonetnyilvanitasok' => 'Köszönetnyilvánítások',
                '1szazalek' => '1%');
  } else {
    $menu = array('nyitolap' => 'Home',
                'reporter' => 'Grants database',
                'aboutus' => 'About us',
                'eredmenykimutatas' => 'Financial report',
                'koszonetnyilvanitasok' => 'Acknowledgments',
                '1szazalek' => '1%');
  }
?>
<ul id="menu">
    <?php
    
    if ($lang == '') {
      $submenu1 = array('munkatarsak' => 'Munkatársak',
                     'elerhetosegek' => 'Elérhetőségek');
      $submenu2 = array('eredmenykimutatas' => 'Eredménykimutatás',
                     'merleg' => 'Mérleg');
    } else {
      $submenu1 = array('staff' => 'Staff',
                     'contact' => 'Contact');
      $submenu2 = array('eredmenykimutatas' => 'Eredménykimutatás',
                     'merleg' => 'Mérleg');
    }
    foreach ($menu as $key => $item) {
        $class = '';
        $submenu_print = '';
        $subclass = '';
        if (isset($_GET['q'])) {
          if ($_GET['q'] == $key) {
            $class = 'active';
          }
        } else {
          if ($key == 'nyitolap') {
            $class = 'active';
          }
        }
        
        if ($key == 'magunkrol' || $key == 'aboutus') {
          $submenu_print = '<ul id="submenu">';
          foreach ($submenu1 as $subkey => $subitem) {
            $submenu_print.= '<li class="' . $class . '"> <a href="index.php?q=' . $subkey . '">' . $subitem . '</a></li>';
          }
          $submenu_print.= '</ul>';
          $subclass = ($class == '') ? 'submenu' : ' submenu';
        }
        
        if ($key == 'eredmenykimutatas') {
          $submenu_print = '<ul id="submenu">';
          foreach ($submenu2 as $subkey => $subitem) {
            $submenu_print.= '<li class="' . $class . '"> <a href="index.php?q=' . $subkey . '">' . $subitem . '</a></li>';
          }
          $submenu_print.= '</ul>';
          $subclass = ($class == '') ? 'submenu' : ' submenu';
        }
        print '<li class="' . $class . $subclass . '"> <a href="index.php?q=' . $key . '">' . $item . '</a>' . $submenu_print . '</li>';
    }
    ?>
</ul>