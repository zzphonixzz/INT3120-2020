<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bookmarks Model
 *
 * @property \App\Model\Table\ClientsTable&\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\BelongsTo $Items
 *
 * @method \App\Model\Entity\Bookmark get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bookmark newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bookmark[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bookmark|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bookmark saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bookmark patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bookmark[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bookmark findOrCreate($search, callable $callback = null, $options = [])
 */
class BookmarksTable extends Table
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

        $this->setTable('bookmarks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Words', [
            'foreignKey' => 'item_id',
            'bindingKey' => 'id',
            'conditions' => ['item_type' => WORD_TYPE],
            'joinType' => 'INNER',
            'propertyName' => 'word'
        ]);
        $this->belongsTo('Grammars', [
            'foreignKey' => 'item_id',
            'bindingKey' => 'id',
            'conditions' => ['item_type' => GRAMMAR_TYPE],
            'joinType' => 'INNER',
            'propertyName' => 'grammar'
        ]);
        $this->belongsTo('Questions', [
            'foreignKey' => 'item_id',
            'bindingKey' => 'id',
            'conditions' => ['item_type' => QUESTION_TYPE],
            'joinType' => 'INNER',
            'propertyName' => 'question'
        ]);
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
            ->allowEmptyString('id', null, 'create');

//        $validator
//            ->integer('type')
//            ->notEmptyString('type');
//
//        $validator
//            ->scalar('time')
//            ->maxLength('time', 255)
//            ->notEmptyString('time');

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
//        $rules->add($rules->existsIn(['client_id'], 'Clients'));
//        $rules->add($rules->existsIn(['item_id'], 'Items'));

        return $rules;
    }
}
