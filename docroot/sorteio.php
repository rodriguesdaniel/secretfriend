<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amigo Secreto</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script>
    function reload() {
      location.reload();
    }
  </script>
</head>
<body class="d-flex h-100 text-center text-bg-dark">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
  <?php include('nav.php');?>
  </header>

	<main class="px-3">

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

$participantes = $data;

function sorteio($id = 1) {
	global $data;

	if(count($data) > 1) {
		srand((float) microtime() * 10000000);
		$sorteado = array_rand($data);

		if($data[$sorteado]['id'] != $id) {
			$escolhido = $data[$sorteado];
			unset($data[$sorteado]);
			return $escolhido;
		}
		else {
			return sorteio($id);
		}
	}
	else {
		foreach ($data as $nome) {
			return $nome;
		}
	}
}

$envio = 0;

function generate($participantes) {

	$result = [];
	$idList = 1;

	foreach($participantes as $participante) {
		$amigo = sorteio($participante['id']);

		if($participante['name'] == $amigo['name']) {
			echo '<h3>Eita Karai '. $participante['name'] . $amigo['name'].'</h3>';
			unset($result);
			echo '<button onclick="javascript:reload();">Gerar</button>';
			break;
		}
		else {
			array_push($result, [
				'id' => $idList,
				'whatsapp' => $participante['whatsapp'],
				'name' => $participante['name'],
				'friend' => $amigo['name']
			]);

			$idList++;
		}
	}

	$data_results = json_encode($result);
	shuffle($result);
	file_put_contents('amigo_secreto.json', $data_results);

	result($data_results);
}

function funcDeviceType() {

	// INFO ABOUT THE BROWSER/DEVICE USER IS VISITING ON
	$useragent = $_SERVER["HTTP_USER_AGENT"]; 
	
	if(stripos($useragent, "mobile")!== false){
			return $mobile = 1;
		}else{
			return $mobile = 0;
		}
	}

function result($result) {
	if(!empty($result)) {
		$file = 'amigo_secreto.json';
		$string = file_get_contents($file);
		if ($string === false) {
			// deal with error...
		}

		$result = json_decode($string, true);
		if ($result === null) {
			// deal with error...
		}

		if(funcDeviceType() === 0) {
			$url_whatsapp = 'https://web.whatsapp.com/send?phone=';
		}else {
			$url_whatsapp = 'https://api.whatsapp.com/send?phone=';
		}
		
		$url_result = 'https://www.ydeia.com/amigosecreto/resultado.php?id=';
		$pattern = "/19/i";
		$pattern2 = '/55/i';
		$prefix = '';

		echo '<div class="result"><div class="row">';
		echo '<ul class="names">';
		foreach($result as $data) {

			if (preg_match($pattern, $data['whatsapp']) == 0) {
				$prefix = '5519';
			} elseif (preg_match($pattern2, $data['whatsapp']) == 0) {
				$prefix = '55';
			}

			echo '<li class="flex-fill">';
			echo trim($data['name']) . '-' . trim($data['friend']) . '<br>';
			echo '<a href="'.$url_whatsapp.$prefix.$data['whatsapp'].'&text='.$url_result.$data['id'].'" target="_blank" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Link</a>';
			echo '</li>';
		}
		echo '</ul></div></div>';
	}
}

@$action = $_GET['action'];

if($data) {
	if($action == "generate") {
		generate($participantes);
	} else {
		result($data);	
	}
}
else {
	echo '<div class="alert alert-danger" role="alert">
	No register found!
  </div>';
}

?>

</main>
	<footer class="mt-auto text-white-50">
    <p>Copyright &copy; 2022 <a href="https://ydeia.com/" class="text-white">YDEIA.com</a>, by <a href="https://dancodes.dev" class="text-white">@dancodes</a>.</p>
  </footer>
</div>
</body>
</html>