<?php
/**
 * Created by PhpStorm.
 * User: Hang
 * Date: 11/04/2017
 * Time: 2:29 PM
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

class DataComponent extends Component
{
    function initialize(&$controller, $settings = array()) {

    }
    function startup(&$controller) {
    }
    function beforeRender(&$controller) {
    }
    function shutdown(&$controller) {
    }
    function beforeRedirect(&$controller, $url, $status=null, $exit=true) {
    }
    function redirectSomewhere($value) {
    }
    public function randd($option=12){
        $int = rand(0,10);
        $a_z = "01234567891";
        $rand_letter = $a_z[$int];
        for($i=1;$i<$option;$i++){
            $int1 = rand(0,10);
            $rand_letter.= $a_z[$int1];
        }
        return $rand_letter;
//        $value = 10;
//        return $value;
    }
}