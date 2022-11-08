<?php

$nomes = [
	[
		'id' => '1',
		'nome' => 'Daniel',
		'whatsapp' => [
			'5519992695756',
			'fulano@yahoo.com',
    ],
],
	[
		'id' => '2',
		'nome' => 'Daisa',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '3',
		'nome' => 'Gabi',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '4',
		'nome' => 'Nilde',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '5',
		'nome' => 'Toninho',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '6',
		'nome' => 'Weber',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '7',
		'nome' => 'Manuela',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '8',
		'nome' => 'Poly',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '9',
		'nome' => 'Zardim',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '10',
		'nome' => 'Gilianderson',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '11',
		'nome' => 'Eliaberson',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '12',
		'nome' => 'Bruna',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '13',
		'nome' => 'Bombadim',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '14',
		'nome' => 'Detinha',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '15',
		'nome' => 'Filhim di mamãe',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '16',
		'nome' => 'Tita',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '17',
		'nome' => 'Novaes',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '18',
		'nome' => 'Paloma',
		'whatsapp' => 'ciclano@gmail.com',
  ],
  [
		'id' => '19',
		'nome' => 'Antonella',
		'whatsapp' => 'ciclano@gmail.com',
  ],
];


$participantes = $nomes;

$mensagem = "Ola %nome%\n\nEsse é o email de sorteio do Amigo da Onça do Busão\n\nSeu amigo da onça é \"%nome_amigo%\"\n\n";

function sorteio($id = 1) {
	global $nomes;

	if(count($nomes) > 1) {
		srand((float) microtime() * 10000000);
		$sorteado = array_rand($nomes);

		if($nomes[$sorteado]['id'] != $id) {
			$escolhido = $nomes[$sorteado];
			unset($nomes[$sorteado]);
			return $escolhido;
		}
		else {
			return sorteio($id);
		}
	}
	else {
		foreach ($nomes as $nome) {
			return $nome;
		}
	}
}

$envio = 0;
$idList = 1;
$result = [];

function generate() {
	foreach($participantes as $participante) {
		$amigo = sorteio($participante['id']);

		if($participante['nome'] == $amigo['nome']) {
			echo '<h3>Eita Karai '. $participante['nome'] . $amigo['nome'].'</h3>';
			unset($result);
			echo '<button onclick="javascript:reload();">Gerar</button>';
			break;
		}
		else {
			array_push($result, ['id' => $idList, 'name' => $participante['nome'], 'friend' => $amigo['nome']]);
			$idList++;
		}
	}

	if(!empty($result)) {
		$data_results = json_encode($result);
		file_put_contents('amigo_secreto.json', $data_results);

		echo '<div class="result">';
		foreach($result as $data) {
			//echo $data['nome'];
			// echo '<a href="https://web.whatsapp.com/send?phone=5519992695756&text=http://www.ydeia.com?amigo='.$data['id'].'" target="_blank" class="button">Link</a><br>';
			echo '<a href="resultado.php?amigo='.$data['id'].'" target="_blank" class="button">Link</a><br>';
		}
		echo '</div>';
	}
}