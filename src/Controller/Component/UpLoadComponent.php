<?php 

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Network\Exception\NotFoundException;

/**
* 
*/
class UpLoadComponent extends Component
{
	public $max_file = 3;


	public function upfile($data = null){
        print_r($data);
		if (!empty($data)) {
//			if (count($data) > $this->max_file) {
//				throw new NotFoundException("Error Processing Request: Max nummber: {$this->max_file}", 1);
//
//			}

				$filename = $data['name'];
				$file_tmp_name = $data['tmp_name'];
				$dir = WWW_ROOT.'img'.DS.'uploads';
				$allowed = array('png' , 'jpg' , 'jpeg', 'bmp' );
				if (!in_array(substr(strchr($filename, '.'), 1), $allowed)) {
					throw new NotFoundException("Error Processing Request", 1);
				}
				elseif (is_uploaded_file($file_tmp_name)) {
					if(move_uploaded_file($file_tmp_name, $dir.'/'.$filename)){
                        return $filename;
                    }
                    else return false;
				}
			}
	}
}
?>