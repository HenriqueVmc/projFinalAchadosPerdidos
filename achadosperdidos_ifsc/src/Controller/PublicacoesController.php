<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Publicacoes Controller
 *
 * @property \App\Model\Table\PublicacoesTable $Publicacoes
 *
 * @method \App\Model\Entity\Publicaco[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PublicacoesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $listaPublicacoes = $this->Publicacoes->buscarListaPublicacoes();
        $this->set(compact('listaPublicacoes'));
        $this->set('_serialize', ['listaPublicacoes']);        
    }

    /**
     * View method
     *
     * @param string|null $id Publicaco id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $publicaco = $this->Publicacoes->get($id, [
            'contain' => []
        ]);

        $this->set('publicaco', $publicaco);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $publicaco = $this->Publicacoes->newEntity();
        if ($this->request->is('post')) {
            $publicaco = $this->Publicacoes->patchEntity($publicaco, $this->request->getData());
            $publicaco->imagem = '/webroot/img/'.$publicaco->imagem;
            //new File('/webroot/img/'.$publicaco->imagem, true);
            if ($this->Publicacoes->save($publicaco)) {
                $this->Flash->success(__('The publicaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The publicaco could not be saved. Please, try again.'));
        }
        $UsuariosTable = TableRegistry::get("Usuarios");
        $listaUsuarios = $UsuariosTable->selectUsuarios();

        $ObjetosTable = TableRegistry::get("Objetos");
        $listaObjetos = $ObjetosTable->selectObjetos();

        $this->set(compact('listaObjetos'));
        $this->set('_serialize', ['listaObjetos']);
        $this->set(compact('listaUsuarios'));
        $this->set('_serialize', ['listaUsuarios']);
        $this->set(compact('publicaco'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Publicaco id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $publicaco = $this->Publicacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $publicaco = $this->Publicacoes->patchEntity($publicaco, $this->request->getData());
            if ($this->Publicacoes->save($publicaco)) {
                $this->Flash->success(__('The publicaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The publicaco could not be saved. Please, try again.'));
        }
        $this->set(compact('publicaco'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Publicaco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $publicaco = $this->Publicacoes->get($id);
        if ($this->Publicacoes->delete($publicaco)) {
            $this->Flash->success(__('The publicaco has been deleted.'));
        } else {
            $this->Flash->error(__('The publicaco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
