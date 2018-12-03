<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Objetos Controller
 *
 * @property \App\Model\Table\ObjetosTable $Objetos
 *
 * @method \App\Model\Entity\Objeto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ObjetosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate($this->Objetos);

        $listaObjetos = $this->Objetos->buscarListaObjetos();
        
        $this->set(compact('listaObjetos'));
        $this->set('_serialize', ['listaObjetos']);        
    }

    /**
     * View method
     *
     * @param string|null $id Objeto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $objeto = $this->Objetos->get($id, [
            'contain' => []
        ]);

        $this->set('objeto', $objeto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $objeto = $this->Objetos->newEntity();
        if ($this->request->is('post')) {
            $objeto = $this->Objetos->patchEntity($objeto, $this->request->getData());
            $result = $this->Objetos->save($objeto);
            if ($result) {
                $this->Flash->success(__('The objeto has been saved.'));

                return $this->redirect(['controller' => 'Publicacoes', 'action' => 'add?objetoid='.$result->id]);
            }
            $this->Flash->error(__('The objeto could not be saved. Please, try again.'));
        }
        $this->set(compact('objeto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Objeto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $objeto = $this->Objetos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $objeto = $this->Objetos->patchEntity($objeto, $this->request->getData());
            if ($this->Objetos->save($objeto)) {
                $this->Flash->success(__('The objeto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The objeto could not be saved. Please, try again.'));
        }
        $this->set(compact('objeto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Objeto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $objeto = $this->Objetos->get($id);
        if ($this->Objetos->delete($objeto)) {
            $this->Flash->success(__('The objeto has been deleted.'));
        } else {
            $this->Flash->error(__('The objeto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
