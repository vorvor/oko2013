<?php

$settlements = array();
$topics = array('altatom' => 'Alternatíva az atomenergiára',
                'adomprog' => 'Adományi program',
                //'atom' => 'Atom és hitelek',
                'norvegfix' => 'Norvég Civil Támogatási Alap',
                'svajcfix' => 'Svájci Magyar Civil és Ösztöndíj',
                'zoldfix' => 'Zöldövezet');

$topics_en = array('altatom' => 'Alternatives to nuclear energy',
                'adomprog' => 'Grant program',
                //'atom' => 'Atom és hitelek',
                'norvegfix' => 'EEA/Norway NGO Fund',
                'svajcfix' => 'Swiss-Hungarian NGO and Scholarship Funds',
                'zoldfix' => 'Green Belt');

$curr = array('altatom' => 'eur',
              'adomprog' => 'huf',
              'norvegfix' => 'eur',
              'svajcfix' => 'huf',
              'zoldfix' => 'huf');
                
                
$even = 'true';
 
function read_reports() {
  global $settlements, $topics, $topics_en, $lang;
  
  $files = array('adomprog', 'altatom', 'norvegfix', 'svajcfix', 'zoldfix');
  
  
  $map = array('adomprog' => 'project_name_hu,org_name_hu,settlement,project_sum_hu,amount_huf,project_sum_en,project_name_en',
               'altatom' => 'project_name_hu,org_name_hu,settlement,project_sum_hu,amount_huf,project_name_en,project_sum_en',
               //'atom' => 'category,id,url,project_name_hu,project_name_en,org_name_hu',
               'norvegfix' => 'topic_hu,topic_en,id,id_code,org_name_hu,project_name_hu,project_name_en,settlement_en,settlement,org_name_en,project_name_number,project_sum_en,project_sum_hu,empty,amount_eur',
                'svajcfix' => 'title_hu,empty,org_name_hu,org_name_en,project_name_hu,project_name_en,project_sum_en,project_sum_hu,state,amount_huf,id_code,settlement,empty,empty,empty,empty',
                'zoldfix' => 'id,org_name_hu,org_name_en,project_name_hu,project_name_en,project_sum_hu,project_sum_en,state,settlement,amount_huf');
  
  for ($c = 0; $c < 5; $c++) {


    $datas = array_map('str_getcsv', file('./reports/' . $files[$c] . '.csv'));


    
    $header = explode(',', $map[$files[$c]]);
    
    foreach ($datas as $key => $data) {
      $i = 0;
      
      $udata[$key]['topic'] = $files[$c];
      foreach ($data as $row) {
        $udata[$key][$header[$i]] = $row;
        if ($header[$i] == 'settlement' && !in_array($row, $settlements)) {
          
          $settlements[] = $row;
        }
        
        $i++;
        if ($i > count($header)-1) {
          break;
        }
      }
    }
    $uudata[$files[$c]] = $udata;
    unset($udata);
  }
  $output = '';
  $output.= '<div id="search-results">';
  $output.= '<div id="table-header">';
  
  if ($lang != 'en') {
    $output.= '<div class="topic field">Témakör</div>';
    $output.= '<div class="project-name field">Projekt neve</div>';
    $output.= '<div class="org-name field">Szervezet neve</div>';
    $output.= '<div class="settlement field">Település</div>';
    $output.= '<div class="summary field">Projekt összegzése</div>';
    $output.= '<div class="amount field">Összeg</div>';
    
  } else {
    $output.= '<div class="topic field">Program code</div>';
    $output.= '<div class="project-name field">Project title</div>';
    $output.= '<div class="org-name field">Grantee\'s name</div>';
    $output.= '<div class="settlement field">Settlement</div>';
    $output.= '<div class="summary field">Project summary</div>';
    $output.= '<div class="amount field">Grant amount</div>';
    
  }
  $output.= '</div>';
  foreach ($uudata as $keys => $rows) {
    //$output.= '<h1>' . $keys . '</h1>';
    foreach ($rows as $key => $row) {
      
        $output.= theme($keys, $row);
        
      
    }
    //$output.= $keys;
  }
  $output.= '</div>';
  return $output;
}

function theme($topic, $data, $lang = 'hu') {
  global $topics, $even, $curr, $lang, $topics_en;
  
  $project_name = isset($data['project_name_hu']) ? $data['project_name_hu'] : 'nincs adat';
  if ($lang == 'en') {
    $project_name = isset($data['project_name_en']) ? $data['project_name_en'] : $project_name;
  }
  
  
  
  $org_name = isset($data['org_name_hu']) ? $data['org_name_hu'] : 'nincs adat';
  if ($lang == 'en') {
    $org_name = isset($data['org_name_en']) ? $data['org_name_en'] : $org_name;
  }
  
  
  
  
  
  $settlement = (isset($data['settlement'])) ? $data['settlement'] : 'nincs_adat';
  
  $summary = (isset($data['project_sum_hu'])) ? $data['project_sum_hu'] : 'nincs_adat';
  if ($lang == 'en') {
    $summary = (isset($data['project_sum_en'])) ? $data['project_sum_en'] : $summary;
  }
  
  
  
  
  
  if (isset($data['amount_huf'])) {
    $amount = preg_replace("/[^0-9]/","",$data['amount_huf']);
  }
  elseif (isset($data['amount_eur'])) {
    $amount =     $amount = preg_replace("/[^0-9]/","",$data['amount_eur']);
    //$amount = 'EUR' . preg_replace("/[^0-9]/","",$data['amount_eur']);
    //$amount = (int)($amount * 298.8) . ' Ft';
  } else {
    $amount = 'nincs adat';
  }
  
  if ($lang == '') {
    if ($curr[$topic] == 'eur') {
      $newamount = $amount * 298.8;
      //print $topic . ':' . $curr[$topic] . '|' . $amount .'|' . $newamount . '<br />';
    } else {
      $newamount = $amount * 1;
    }
    $newamount = number_format($newamount, 0,'',' ') . ' Ft';
  } else {
    if ($curr[$topic] == 'huf') {
      $newamount = $amount / 298.8;
      //print $topic . ':' . $curr[$topic] . '|' . $amount .'|' . $newamount . '<br />';
    } else {
      $newamount = $amount * 1;
    }
    $newamount = number_format($newamount, 0,'',' ') . ' Eur';
  }
  
  
  $amount = $newamount;
  
  if ($even == 'true') {
    $rowclass = 'even';
    $even = 'false';
  } else {
    $rowclass = 'odd';
    $even = 'true';
  }
  $output = '';
  $output.= '<div class="row ' . $rowclass . '" data-settlement="' . $settlement . '" data-topic="' . $topic . '">';
  if ($lang != 'en') {
    $output.= '<div class="topic field">' . $topics[$data['topic']] . '</div>';
  } else {
    $output.= '<div class="topic field">' . $topics_en[$data['topic']] . '</div>';
  }
  $output.= '<div class="project-name field">' . $project_name . '</div>';
  $output.= '<div class="org-name field">' . $org_name . '</div>';
  
  $output.= '<div class="settlement field">' . $settlement . '</div>';
  
  $output.= '<div class="summary field">' . $summary . '</div>';
  
  $output.= '<div class="amount field">' . $amount . '</div>';
  
  $output.= '</div>';
  
  return $output;
}

function filter() {
  global $settlements, $topics, $topics_en, $lang;
  asort($settlements);
  $output = '';
  $output.= '<div id="filter-wrapper">';
  $output.= '<select id="settlement-filter">';
  
  array_shift($settlements);
  //array_unshift($settlements, 'nincs_adat');
  if ($lang != 'en') {
    array_unshift($settlements, 'Összes város');
  } else {
    array_unshift($settlements, 'All settlements');
  }
  foreach ($settlements as $settlement) {
    $output.= '<option>' . $settlement . '</option>';
  }
  $output.= '</select>';

  if ($lang != 'en') {
    array_unshift($topics, 'Összes program');
  } else {
    $topics = $topics_en;
    array_unshift($topics, 'All programs');
  }
  $output.= '<select id="topic-filter">';
  foreach ($topics as $key => $topic) {
    $output.= '<option value="' . $key . '">' . $topic . '</option>';
  }
  $output.= '</select>';
  $output.= '<span class="search-keyword">';
  if ($lang != 'en') {
    $output.= 'Keresés';
  } else {
    $output.= 'Search';
  }
  $output.= '<input type="text" id="keyword"></span>';
  $output.= '</div>';
  
  return $output;
  
}


 $table = read_reports();
 print filter();
 print $table;
 

?>