<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DoneAnswer Entity
 *
 * @property int $id
 * @property string $client_id
 * @property int $exercise_id
 * @property int $question_id
 * @property int $answer_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Exercise $exercise
 * @property \App\Model\Entity\Question $question
 * @property \App\Model\Entity\Answer $answer
 */
class DoneAnswer extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'id' => false,
        '*' => true
    ];
}
