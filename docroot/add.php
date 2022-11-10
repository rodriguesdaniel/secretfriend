<?php

$name = $_POST['name'];
$whatsapp = $_POST['whatsapp'];

$file = 'participantes.json';
$string = file_get_contents($file);
if ($string === false) {
    // deal with error...
}

$json = json_decode($string, true);
if ($json === null) {
    // deal with error...
}

if(!empty($json)) {
    foreach($json as $user) {
        if($user['name'] == $name) {
            header('Location: admin.php?msg=Participante já cadastrado');
            exit();
        }
    }
}

$keys = array_keys($json);
$last_key = array_pop($keys);

$id = $json[$last_key]['id'];

if(empty($id)) {
    $id = 1;
}
else {
    $id++;
}

$json[] = [
    'id' => $id,
    'name' => $name,
    'whatsapp' => $whatsapp,
    ];

if(!empty($json)) {
    $json = json_encode($json);
    file_put_contents('participantes.json', $json);
    header('Location: admin.php?msg=Sucesso');
}