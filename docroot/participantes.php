<?php

$string = file_get_contents("amigo_secreto.json");
if ($string === false) {
    // deal with error...
}

$json_a = json_decode($string, true);
if ($json_a === null) {
    // deal with error...
}

foreach ($json_a as $person_name => $person_a) {
  echo '<div class="col col-6 col-md-4">';
	echo $person_a['friend'];
  echo '</div>';
}