<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Publicacoes Controller
 *
 * @property \App\Model\Table\PublicacoesTable $Publicacoes
 *
 * @method \App\Model\Entity\Publicaco[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PublicacoesController extends AppController
{
    public function initialize(){
        parent::initialize();
        
        // Include the FlashComponent
        $this->loadComponent('Flash');
    }
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
    public function add($objetoId = null)
    {
        $publicaco = $this->Publicacoes->newEntity();
        $publicaco->objetoId = $objetoId;        

        if ($this->request->is('post')) {
            
            $file = $this->request->getData('imagem');
            $publicaco = $this->Publicacoes->patchEntity($publicaco, $this->request->getData()); 
            $publicaco->usuarioId = 1;
            $publicaco->dtPublicacao = date("Y-m-d");
            
            if(!empty($this->request->data['imagem']['name'])){
                $fileName = $this->request->data['imagem']['name'];
                $uploadPath = "webroot/img/";           
                $uploadFile = $uploadPath.$fileName;
                if(move_uploaded_file($this->request->data['imagem']['tmp_name'],'/xampp/htdocs/projFinalAchadosPerdidos/achadosperdidos_ifsc/'.$uploadFile)){
                    $publicaco->imagem = $uploadFile;                    
                }else{
                    $this->Flash->error(__('Unable to upload file, please try again.'));
                }
            }

            if ($this->Publicacoes->save($publicaco)) {
                $this->Flash->success(__('The publicaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The publicaco could not be saved. Please, try again.'));
        }
        // $UsuariosTable = TableRegistry::get("Usuarios");
        // $listaUsuarios = $UsuariosTable->selectUsuarios();

        // $ObjetosTable = TableRegistry::get("Objetos");
        // $listaObjetos = $ObjetosTable->selectObjetos();

        // $this->set(compact('listaObjetos'));
        // $this->set('_serialize', ['listaObjetos']);
        // $this->set(compact('listaUsuarios'));
        // $this->set('_serialize', ['listaUsuarios']);
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
