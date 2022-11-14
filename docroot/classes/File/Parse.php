<?php

namespace classes\File;

use classes\Utils\Device;

class Parse {

    /**
     * Function to Parse a file data.
     * 
     * @param $filename
     */
    public function File($filename) {
        @$file = file_get_contents($filename);

        if ($file === false) {
            echo 'Error with the file';
            // deal with error...
            return;
        }

        $fileData = json_decode($file, true);
        if ($file === null) {
            // deal with error...
            return;
        }

        return $fileData;
    }

    /**
     * Function to return file data.
     * 
     * @param $filename string
     */
    public function getFileData($filename = NULL) {
       if(empty($filename)) {
        $filename = 'amigo_secreto.json';
       }
       $fileInfo = $this->File($filename);

       return $fileInfo;
    }

     /**
     * Function to show results layout.
     * 
     * @param $result array
     */
    public function showResults(array $result) {
        $total = count($result);
        $duplicados = 0;
        
        $url_result = 'https://www.ydeia.com/amigosecreto/resultado.php?id=';
		$pattern = '/19/i';
		$pattern2 = '/55/i';
		$prefix = '';

        $device = new Device();
        $device = $device->getDeviceType();

        if ($device === 0) {
			$url_whatsapp = 'https://web.whatsapp.com/send?phone=';
		}
        else {
			$url_whatsapp = 'https://api.whatsapp.com/send?phone=';
		}

        echo '<div class="result">
        <div class="row">
        <div class="col-12"><p>Total: '. $total .'</p><p>Duplicados: '. $duplicados .'</p></div>
        <ul class="names">';

        $users = [];

		foreach($result as $data) {
            $id = trim($data['id']);
            $name = trim($data['name']);
            $whatsapp = trim($data['whatsapp']);
            $friend = trim($data['friend']);
            $hash = $data['hash'];

            $message = '*Hora%20de%20conhecer%20o%20seu%20Amigo%20Secreto.*%20';
            $message .= 'Clique%20no%20link%20abaixo%20';
            $message .= $url_result;
            $message .= $id;
            $message .= urlencode('&hash='.$hash);

            //text=Hora%20de%20conhecer%20seu%20amigo%20Secreto.%20https%3A%2F%2Fwww.domain.com%2Famigosecreto%2Fresultado.php%3Fid%3D1%26hash%3D02b8ba97a0530cd5372f296f6fa2b28c

			if (preg_match($pattern, $whatsapp) == 0) {
				$prefix = '5519';
			} 
            elseif (preg_match($pattern2, $whatsapp) == 0) {
				$prefix = '55';
			}

			echo '<li class="flex-fill">';
			echo $name . '-' . $friend . '<br>';
			echo '<a href="'.$url_whatsapp.$prefix.$whatsapp.'&text='.$message.'" target="_blank" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Link</a>';
			echo '</li>';
		}
        
		echo '</ul></div></div>';
    }
}