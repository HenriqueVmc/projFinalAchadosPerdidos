<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Objetos Model
 *
 * @method \App\Model\Entity\Objeto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Objeto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Objeto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Objeto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Objeto|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Objeto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Objeto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Objeto findOrCreate($search, callable $callback = null, $options = [])
 */
class ObjetosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('objetos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasOne('Publicacoes', array(
            'foreignKey'=> "objetoId",
            'dependent'=> true, 
            'cascadeCallbacks'=> true
        ));
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 120)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->scalar('cor')
            ->maxLength('cor', 100)
            ->allowEmpty('cor');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 200)
            ->allowEmpty('descricao');

        $validator
            ->requirePresence('situacao', 'create')
            ->notEmpty('situacao');

        $validator
            ->date('dtSituacao')
            ->requirePresence('dtSituacao', 'create')
            ->notEmpty('dtSituacao');

        $validator
            ->scalar('localSituacao')
            ->maxLength('localSituacao', 200)
            ->requirePresence('localSituacao', 'create')
            ->notEmpty('localSituacao');

        $validator
            ->scalar('recompensa')
            ->allowEmpty('recompensa');

        $validator
            ->decimal('valRecompensa')
            ->allowEmpty('valRecompensa');

        return $validator;
    }

    public function buscarListaObjetos(){
        $lista = $this->find()->contain(['Publicacoes'])->toArray();
		return $lista;
    }
    public function selectObjetos(){
        $consulta = $this->find();
        $consulta->select(['Objetos.id', 'Objetos.nome'])->distinct(['Objetos.id', 'Objetos.nome']);;        
        return  $consulta->toArray();
    }
}
