<?php

$file = 'participantes.json';
$string = file_get_contents($file);
if ($string === false) {
    // deal with error...
}

$data = json_decode($string, true);
if ($data === null) {
    // deal with error...
}

if(!empty($data)) {
  foreach ($data as $value) {
    echo '<div class="col col-6 col-md-4">';
    echo $value['name'];
    echo '</div>';
  }
}
else {
  echo "<p class=\"text-center\">Nenhum participante cadastrado!</p>";
}