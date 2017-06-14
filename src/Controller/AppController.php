<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Http\ServerRequest;
use Cake\Network\Session;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
            'Form' => [
                'fields' => [
                    'username' => 'email',
                    'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
                'admin' => false
            ],
            'loginRedirect'=>[
                'prefix'=>false,
                'controller' => 'Pages',
                'action' => 'index'
            ],
            'logoutRedirect'=>[
            'prefix'=>false,
            'controller'=> 'Users',
            'action'=>'login'],
            'autoRedirect' => false,
            'authorize' => 'controller'
            /* 'unauthorizedRedirect' => false*/
        ]);  

    }

    public function isAuthorized($user = null)
    {
        if (!isset($this->request->params['prefix'])) {
            return true;
        }

        // Only admins can access admin functions
        if ($this->request->params['prefix'] == 'admin') {
            return (bool)($user['role'] == 'admin');
        }

        // Default deny
        return false;
    }

    // public function checkAdmin(){
        
    //     if(!$this->request->session()->check('Auth.User')) --check user logged--
    //         return false;
    //     $user = $this->request->session()->read('Auth.User');
    //         // return (bool)$user['role']=='admin';

    //     if((!$this->isAuthorized($user)) && !($user['role']=='admin'))
    //         return true;
    // }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }


        //check login
        if($this->request->session()->read('Auth.User')){
            $this->set('logged', true);
        }
        else{
            $this->set('logged', false);
        }

    }


}
