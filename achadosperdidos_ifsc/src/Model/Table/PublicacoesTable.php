<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Publicacoes Model
 *
 * @method \App\Model\Entity\Publicaco get($primaryKey, $options = [])
 * @method \App\Model\Entity\Publicaco newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Publicaco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Publicaco|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Publicaco|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Publicaco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Publicaco[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Publicaco findOrCreate($search, callable $callback = null, $options = [])
 */
class PublicacoesTable extends Table
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

        $this->setTable('publicacoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
        $this->belongsTo('Usuarios', array(
            'foreignKey'=> "usuarioId"
        ));
        
        $this->belongsTo('Objetos', array(
            'foreignKey'=> "objetoId"
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
            ->scalar('titulo')
            ->maxLength('titulo', 100)
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo');

        $validator
            ->scalar('imagem')
            ->maxLength('imagem', 120)
            ->requirePresence('imagem', 'create')
            ->notEmpty('imagem');

        $validator
            ->date('dtPublicacao')
            ->requirePresence('dtPublicacao', 'create')
            ->notEmpty('dtPublicacao');

        $validator
            ->integer('usuarioId')
            ->requirePresence('usuarioId', 'create')
            ->notEmpty('usuarioId');

        $validator
            ->integer('objetoId')
            ->requirePresence('objetoId', 'create')
            ->notEmpty('objetoId');

        return $validator;
    }
    
    public function buscarListaPublicacoes(){
		$lista = $this->find()->contain(['Objetos', 'Usuarios'])->toArray();
		return $lista;
	}
}
