<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Exercises Model
 *
 * @property \App\Model\Table\TestsTable&\Cake\ORM\Association\BelongsTo $Tests
 * @property \App\Model\Table\QuestionsTable&\Cake\ORM\Association\HasMany $Questions
 *
 * @method \App\Model\Entity\Exercise get($primaryKey, $options = [])
 * @method \App\Model\Entity\Exercise newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Exercise[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Exercise|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exercise saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exercise patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Exercise[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Exercise findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExercisesTable extends Table
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

        $this->setTable('exercises');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Tests', [
            'foreignKey' => 'test_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Questions', [
            'foreignKey' => 'exercise_id',
            'saveStrategy' => 'replace'
        ]);
        $this->hasMany('ClientRecords', [
            'foreignKey' => 'exercise_id',
        ]);
        $this->hasMany('DoneAnswers', [
            'foreignKey' => 'exercise_id',
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
//            ->scalar('name')
//            ->notEmptyString('name');
//
//        $validator
//            ->scalar('description')
//            ->notEmptyString('description');

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
//        $rules->add($rules->existsIn(['test_id'], 'Tests'));

        return $rules;
    }
}
