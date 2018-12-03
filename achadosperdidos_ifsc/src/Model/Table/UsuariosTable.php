<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @method \App\Model\Entity\Usuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Usuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario findOrCreate($search, callable $callback = null, $options = [])
 */
class UsuariosTable extends Table
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

        $this->setTable('usuarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Publicacoes', array(
            'foreignKey'=> "publicacaoId",
            'dependent'=> true, 
            'cascadeCallbacks'=> true
        ));

        $this->belongsTo('Perfis', array(
            'foreignKey'=> "perfilId"
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
            ->scalar('login')
            ->maxLength('login', 100)
            ->requirePresence('login', 'create')
            ->notEmpty('login');

        $validator
            ->scalar('senha')
            ->maxLength('senha', 10)
            ->requirePresence('senha', 'create')
            ->notEmpty('senha');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 15)
            ->allowEmpty('telefone');

        $validator
            ->scalar('celular')
            ->maxLength('celular', 15)
            ->requirePresence('celular', 'create')
            ->notEmpty('celular');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 200)
            ->allowEmpty('endereco');

        $validator
            ->integer('perfilId')
            ->requirePresence('perfilId', 'create')
            ->notEmpty('perfilId');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['login']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

    public function buscarListaUsuarios(){
		$lista = $this->find()->contain(['Perfis'])->toArray();
		return $lista;
    }
    public function selectUsuarios(){
        $consulta = $this->find();
        $consulta->select(['Usuarios.id', 'Usuarios.nome'])->distinct(['Usuarios.id', 'Usuarios.nome']);;        
        return  $consulta->toArray();
    }
}
