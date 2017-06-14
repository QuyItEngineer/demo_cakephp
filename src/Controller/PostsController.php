<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class PostsController extends AppController
{
    var $helpers = array('Paginator','Html');
    var $paginate = array();

    var $name = 'Posts';

    //public $components = array('Upload');

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public $components = array('Upload');

    public function search(){
        $url['action'] = 'result';
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
    public function result(){
        $conditions = array();
        $data = array();
        $data = $this->request->query;
         
        $conditions = [];
        if(!empty($data)):
            foreach ($data as $element_data=>$value_request){ 
                if($element_data=='title'){
                $conditions[] = array('Posts.title LIKE' => "%".$value_request."%");
                }
                else{
                    $conditions[] = array($element_data => $value_request);
                }
            }
        endif;

        $this->paginate= array(
            'contain' => ['Users'],
            'limit' => 3,
            'order' => array('id' => 'asc'),
            'conditions'=>$conditions
        );
        
        $this->data = $data;
        $this->set("posts",$this->paginate("Posts"));

    }

    public function  showcompo(){
        $data = $this->Data->randd(6);
        $this->set("data",$data);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
                'limit' => 3,
                'order' => [
                    'Posts.id' => 'asc'
                ]
            ];
        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));
        $this->set('_serialize', ['posts']);

    }
    

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('post', $post);
        $this->set('_serialize', ['post']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {

            $post = $this->Posts->patchEntity($post, $this->request->data);

            if (!empty($this->request->data)) {
                $file_name = $this->Upload->upfile($this->request->data['images']);
                if($file_name){
                    $post['images'] = $file_name;
                }

            }
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $this->set(compact('post', 'users'));
        $this->set('_serialize', ['post']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $this->set(compact('post', 'users'));
        $this->set('_serialize', ['post']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
