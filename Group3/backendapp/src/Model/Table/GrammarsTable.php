<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Grammars Model
 *
 * @property \App\Model\Table\LessonsTable&\Cake\ORM\Association\BelongsTo $Lessons
 *
 * @method \App\Model\Entity\Grammar get($primaryKey, $options = [])
 * @method \App\Model\Entity\Grammar newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Grammar[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Grammar|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Grammar saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Grammar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Grammar[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Grammar findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GrammarsTable extends Table
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

        $this->setTable('grammars');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Lessons', [
            'foreignKey' => 'lesson_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Bookmarks', [
            'foreignKey' => 'item_id',
            'conditions' => ['item_type' => GRAMMAR_TYPE],
            'joinType' => 'INNER',
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
//            ->scalar('word')
//            ->maxLength('word', 255)
//            ->notEmptyString('word');
//
//        $validator
//            ->scalar('sound')
//            ->maxLength('sound', 255)
//            ->notEmptyString('sound');
//
//        $validator
//            ->scalar('meaning')
//            ->notEmptyString('meaning');

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
        $rules->add($rules->existsIn(['lesson_id'], 'Lessons'));

        return $rules;
    }
}
