<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Http\Session\DatabaseSession;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 *
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function index()
    {        
        $listaUsuarios = $this->Usuarios->buscarListaUsuarios();
        
        $this->set(compact('listaUsuarios'));
        $this->set('_serialize', ['listaUsuarios']);
        $this->paginate($this->Usuarios);
    }

    public function entrar()
    {        
        $usuario = $this->Usuarios->newEntity();
        $usuario->nome = " ";
        $usuario->email = " ";
        $usuario->celular = " ";
        $usuario->perfilId = " ";

        if ($this->request->is('post')) {
            
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());            
            $encontrado = $this->Usuarios->find()->where(['Usuarios.login' => $usuario->login, 'Usuarios.senha' => $usuario->senha])->toArray();           
            
            if(!empty($encontrado)){
              
                //$session = $this->getRequest()->getSession();                
                //$Session->write('nome', $encontrado->nome);
                //$session->write('usuarioId', $encontrado->id);
                //$Session->write('perfilId', $encontrado->perfilId);

                //session_start();                
                //$_SESSION['usuarioId'] = $encontrado->id;

                return $this->redirect(['controller' => 'publicacoes', 'action' => 'index']);

            }else{
                return $this->redirect(['action' => 'entrar']);
            }
        }    
        $this->set('usuario', $usuario);
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);

        $this->set('usuario', $usuario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }

        $PerfisTable = TableRegistry::get("Perfis");
        $listaPerfis = $PerfisTable->buscarListaPerfis();

        $this->set(compact('listaPerfis'));
        $this->set('_serialize', ['listaPerfis']);
        $this->set(compact('usuario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $this->set(compact('usuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('The usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The usuario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
    
        if ($this->request->param('action') === 'actionXyz') {
            $this->eventManager()->off($this->Csrf);
        }
    }
}
