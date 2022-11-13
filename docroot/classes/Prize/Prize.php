<?php

namespace classes\Prize;

use classes\File\Parse;

class Prize {

    public function generate(array $participantes) {
        $result = [];
        $idList = 1;

        foreach($participantes as $participante) {
            $amigo = $this->sorteio($participante['id']);

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

        $show = new Parse();
        return $show->showResults($result);
    }

    public function sorteio($id = 1) {
        //global $data;

        $data = new Parse();
        $data = $data->File('participantes.json');
    
        if(count($data) > 1) {
            srand((float) microtime() * 10000000);
            $sorteado = array_rand($data);
    
            if($data[$sorteado]['id'] != $id) {
                $escolhido = $data[$sorteado];
                unset($data[$sorteado]);
                return $escolhido;
            }
            else {
                return $this->sorteio($id);
            }
        }
        else {
            foreach ($data as $nome) {
                return $nome;
            }
        }
    }
}