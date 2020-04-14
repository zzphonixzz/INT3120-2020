<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lessons Model
 *
 * @property \App\Model\Table\GrammarsTable&\Cake\ORM\Association\HasMany $Grammars
 *
 * @method \App\Model\Entity\Lesson get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lesson newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Lesson[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lesson|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lesson saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lesson patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lesson[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lesson findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LessonsTable extends Table
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

        $this->setTable('lessons');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Grammars', [
            'foreignKey' => 'lesson_id',
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
//            ->maxLength('name', 255)
//            ->notEmptyString('name');
//
//        $validator
//            ->scalar('thumbnail')
//            ->notEmptyString('thumbnail');
//
//        $validator
//            ->scalar('description')
//            ->notEmptyString('description');

        return $validator;
    }
}
