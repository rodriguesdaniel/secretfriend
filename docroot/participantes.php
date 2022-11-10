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
  echo '<div class="col col-12">';
  echo '<ul class="list-group list-group-horizontal">';
  foreach ($data as $value) {
    echo '<li class="flex-fill list-group-item">';
    echo $value['name'];
    echo '</li>';
  }

  echo '</ul></div>';
}
else {
  echo "<p class=\"text-center\">Nenhum participante cadastrado!</p>";
}