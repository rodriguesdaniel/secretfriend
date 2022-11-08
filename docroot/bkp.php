<?php
/*
Script simples para sorteio de amigo secreto
Adicione os participantes no Array e rode o script, e voalá :)
*/

$nomes = [
	[
		'id' => '1',
		'nome' => 'Daniel',
		'whatsapp' => [
			'fulano@gmail.com',
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
foreach($participantes as $participante) {
	$amigo = sorteio($participante['id']);

  if($participante['nome'] == $amigo['nome']) {
    echo '<h3>Eita Karai</h3>';
  }else {
    echo '<h2>' . $participante['nome'] . $participante['id'] . ' = ' . $amigo['nome'] . '</h2><br>';
  }

	$msgEnvio = str_replace("%nome%", $participante['nome'], $mensagem);
	$msgEnvio = str_replace("%nome_amigo%", $amigo['nome'], $msgEnvio);

	if(is_array($participante['whatsapp'])) {
		foreach ($participante['whatsapp'] as $email) {
			// if(mail($email, "Sorteio amigo da Onça - Busão UNG 2013", $msgEnvio, "From: contato@rodrigop.com.br")) {
			// 	$envio++;
			// }
		}
	}
	else {
		// if(mail($participante['email'], "Sorteio amigo da Onça - Busão UNG 2013", $msgEnvio, "From: contato@rodrigop.com.br")) {
		// 	$envio++;
		// }
	}
}

//echo "Enviados $envio E-mails";