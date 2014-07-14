<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<link href="css/html5-doctor-reset-stylesheet.css" rel="stylesheet"/>
<link href="css/style.css" rel="stylesheet"/>
<script src="scripts/script.js">
</script>
</head>
<body>
<?php


$files = array('atom', 'norvegfix', 'svajcfix', 'zoldfix');

$map = array('atom' => 'category,id,url,project_name_hu,project_name_en,org_name_hu',
             'norvegfix' => 'topic_hu,topic_en,id,id_code,org_name_hu,project_name_hu,project_name_en,settlement_en,settlement,org_name_en,project_name_number,summary_en,summary_hu,empty,amount_eur',
              'svajcfix' => 'title_hu,empty,org_name_hu,org_name_en,project_name_hu,project_name_en,project_sum_en,project_sum_hu,state,amount_huf,id_code,empty,emty,emty,emty,settlement',
              'zoldfix' => 'id,org_name_hu,org_name_en,project_name_hu,project_name_en,project_sum_hu,project_sum_en,state,settlement,amount_huf');

for ($c = 0; $c < 4; $c++) {

  $datas = array_map('str_getcsv', file('./reports/' . $files[$c] . '.csv'));
  
  $header = explode(',', $map[$files[$c]]);
  
  foreach ($datas as $key => $data) {
    $i = 0;
    foreach ($data as $row) {
      $udata[$key][$header[$i]] = $row;
      $i++;
      if ($i > count($header)-1) {
        break;
      }
    }
  }
  $uudata[$files[$c]] = $udata;
}

foreach ($uudata as $keys => $rows) {
  print '<h1>' . $keys . '</h1>';
  foreach ($rows as $key => $row) {
    if ($key !== 0) {
      print theme($row);
    }
  }
}

function theme($data, $lang = 'hu') {
  $output = '';
  $output.= '<div class="row">';
  $output.= '<div class="project-name field">' . $data['project_name_hu'] . '</div>';
  $output.= '<div class="org-name field">' . $data['org_name_hu'] . '</div>';
  
  $output.= '<div class="settlement field">';
  $output.= isset($data['settlement']) ? $data['settlement'] : 'nincs adat';
  $output.= '</div>';
  
  $output.= '<div class="summary field">';
  $output.= isset($data['summary_hu']) ? $data['summary_hu'] : 'nincs adat';
  $output.= '</div>';
  
  $output.= '<div class="amount field">';
  if (isset($data['amount_huf'])) {
    $output.= $data['amount_huf'];
  }
  elseif (isset($data['amount_eur'])) {
    $output.= $data['amount_eur'];
  } else {
    $output.= 'nincs adat';
  }
  $output.= '</div>';
  
  $output.= '</div>';
  
  return $output;
}


print('<pre>');
//print_r($datas);
print('</pre>');

print('<hr />');

print('<pre>');
//print_r($uudata);
print('</pre>');

?>
</body>
</html>