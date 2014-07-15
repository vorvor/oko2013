<?php
  $menu = array('nyitolap' => 'Nyitólap',
                'reporter' => 'Adományi adatbázis',
                'magunkrol' => 'Magunkról',
                'penzugyi_jelentesek' => 'Pénzügyi jelentés',
                'koszonetnyilvanitasok' => 'Köszönetnyilvánítások',
                '1szazalek' => '1%');
?>
<ul id="menu">
    <?php
    foreach ($menu as $key => $item) {
        $class = '';
        if (isset($_GET['q'])) {
          if ($_GET['q'] == $key) {
            $class = 'active';
          }
        } else {
          if ($key == 'nyitolap') {
            $class = 'active';
          }
        }
        print '<li class="' . $class . '"> <a href="index.php?q=' . $key . '">' . $item . '</a></li>';
    }
    ?>
</ul>