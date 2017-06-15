<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Controller;
use Cake\Http\ServerRequest;
use Cake\Network\Session;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    
    public function initialize()
    {
        parent::initialize();
        // $user = $this->request->session()->read('Auth.User');
        // if($this->checkAdmin()){
        //     echo 1;
        // }
        // else{
        //     echo 2;
        // }
        //$session = new Session();
        // if (!$session->check('Auth.user')) {
        //     return false;
        // }        
    }

    public function search(){
        $url['action'] = 'index';
        if($this->request->is('post'))
            $data = $this->request->data;
        if($this->request->is('get'))
            $data = $this->request->query;
        foreach ($data as $element_data=>$value_request){  
                $url[$element_data]=$value_request; 
        }
        // redirect the user to the url
        $this->redirect($url, null, true);
    }
    public function index()
    {
        $conditions = array();
        $data = array();
        $data = $this->request->query;

        $conditions = [];
        if(!empty($data)){
            foreach ($data as $element_data=>$value_request) {
                if ($element_data=='username') {
                    $conditions[] = array('Users.username LIKE'=>"%".$value_request."%");
                }
            }
        }

        $this->paginate = array(
            'conditions'=>$conditions
            );


        //$users = $this->paginate($this->Users);
        $this->data = $data;
        // $this->set(compact('users'));
        // $this->set('_serialize', ['users']);
        $this->set("users",$this->paginate("Users"));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Posts']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function adminLogout() {
        return $this->redirect($this->Auth->logout());
    }
    // public function beforeFilter(Event $event){
    //     //$this->redirect($this->Auth->logout());
    //     if ($this->checkAdmin()) {
    //         echo 1;
    //         $this->Auth->deny('index');
    //     }
    //     else echo 2;  
    // }
    
}
