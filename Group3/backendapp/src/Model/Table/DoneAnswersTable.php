<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DoneAnswers Model
 *
 * @property \App\Model\Table\ClientsTable&\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\ExercisesTable&\Cake\ORM\Association\BelongsTo $Exercises
 * @property \App\Model\Table\QuestionsTable&\Cake\ORM\Association\BelongsTo $Questions
 * @property \App\Model\Table\AnswersTable&\Cake\ORM\Association\BelongsTo $Answers
 *
 * @method \App\Model\Entity\DoneAnswer get($primaryKey, $options = [])
 * @method \App\Model\Entity\DoneAnswer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DoneAnswer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DoneAnswer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DoneAnswer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DoneAnswer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DoneAnswer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DoneAnswer findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DoneAnswersTable extends Table
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

        $this->setTable('done_answers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

//        $this->belongsTo('Clients', [
//            'foreignKey' => 'client_id',
//            'joinType' => 'INNER',
//        ]);
        $this->belongsTo('Exercises', [
            'foreignKey' => 'exercise_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Answers', [
            'foreignKey' => 'answer_id',
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
//        $rules->add($rules->existsIn(['exercise_id'], 'Exercises'));
//        $rules->add($rules->existsIn(['question_id'], 'Questions'));
//        $rules->add($rules->existsIn(['answer_id'], 'Answers'));

        return $rules;
    }
}
