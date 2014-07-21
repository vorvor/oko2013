<?php

$settlements = array();
$topics = array('altatom' => 'Alternatíva az atomenergiára',
                'adomprog' => 'Adományi program',
                //'atom' => 'Atom és hitelek',
                'norvegfix' => 'Norvég Civil Támogatási Alap',
                'svajcfix' => 'Svaci Magyar Civil és Ösztöndíj',
                'zoldfix' => 'Zöldövezet');

$curr = array('altatom' => 'eur',
              'adomprog' => 'huf',
              'norvegfix' => 'eur',
              'svajcfix' => 'huf',
              'zoldfix' => 'huf');
                
                
$even = 'true';

function read_reports() {
  global $settlements, $topics;
  
  $files = array('adomprog', 'altatom', 'norvegfix', 'svajcfix', 'zoldfix');
  
  
  $map = array('adomprog' => 'project_name_hu,org_name_hu,settlement,project_sum_hu,amount_huf',
               'altatom' => 'project_name_hu,org_name_hu,settlement,project_sum_hu,amount_huf',
               //'atom' => 'category,id,url,project_name_hu,project_name_en,org_name_hu',
               'norvegfix' => 'topic_hu,topic_en,id,id_code,org_name_hu,project_name_hu,project_name_en,settlement_en,settlement,org_name_en,project_name_number,project_sum_en,project_sum_hu,empty,amount_eur',
                'svajcfix' => 'title_hu,empty,org_name_hu,org_name_en,project_name_hu,project_name_en,project_sum_en,project_sum_hu,state,amount_huf,id_code,empty,emty,emty,emty,settlement',
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
  $output.= '<div class="topic field">Témakör</div>';
  $output.= '<div class="project-name field">Projekt neve</div>';
  $output.= '<div class="org-name field">Szervezet neve</div>';
  
  $output.= '<div class="settlement field">Település</div>';
  
  $output.= '<div class="summary field">Projekt összegzése</div>';
  
  $output.= '<div class="amount field">Összeg</div>';
  
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
  global $topics, $even, $curr;
  
  $project_name = isset($data['project_name_hu']) ? $data['project_name_hu'] : 'nincs adat';
  $org_name = isset($data['org_name_hu']) ? $data['org_name_hu'] : 'nincs adat';
  $settlement = (isset($data['settlement'])) ? $data['settlement'] : 'nincs_adat';
  $summary = (isset($data['project_sum_hu'])) ? $data['project_sum_hu'] : 'nincs_adat';
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
  
  if ($curr[$topic] == 'eur') {
    $newamount = $amount * 298.8;
    //print $topic . ':' . $curr[$topic] . '|' . $amount .'|' . $newamount . '<br />';
  } else {
    $newamount = $amount * 1;
  }
  
  $newamount = number_format($newamount, 0,'',' ');
  $amount = $newamount . ' Ft';
  
  if ($even == 'true') {
    $rowclass = 'even';
    $even = 'false';
  } else {
    $rowclass = 'odd';
    $even = 'true';
  }
  $output = '';
  $output.= '<div class="row ' . $rowclass . '" data-settlement="' . $settlement . '" data-topic="' . $topic . '">';
  $output.= '<div class="topic field">' . $topics[$data['topic']] . '</div>';
  $output.= '<div class="project-name field">' . $project_name . '</div>';
  $output.= '<div class="org-name field">' . $org_name . '</div>';
  
  $output.= '<div class="settlement field">' . $settlement . '</div>';
  
  $output.= '<div class="summary field">' . $summary . '</div>';
  
  $output.= '<div class="amount field">' . $amount . '</div>';
  
  $output.= '</div>';
  
  return $output;
}

function filter() {
  global $settlements, $topics;
  asort($settlements);
  $output = '';
  $output.= '<div id="filter-wrapper">';
  $output.= '<select id="settlement-filter">';
  
  array_shift($settlements);
  array_unshift($settlements, 'nincs_adat');
  array_unshift($settlements, 'Összes város');
  foreach ($settlements as $settlement) {
    $output.= '<option>' . $settlement . '</option>';
  }
  $output.= '</select>';
  
  array_unshift($topics, 'Összes program');
  $output.= '<select id="topic-filter">';
  foreach ($topics as $key => $topic) {
    $output.= '<option value="' . $key . '">' . $topic . '</option>';
  }
  $output.= '</select>';
  $output.= '<span class="search-keyword">Keresés <input type="text" id="keyword"></span>';
  $output.= '</div>';
  
  return $output;
  
}


 $table = read_reports();
 print filter();
 print $table;
 

?>