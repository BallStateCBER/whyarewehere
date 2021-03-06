<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Award Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $awarded_on
 * @property string $awarded_by
 * @property string $description
 *
 * @property \App\Model\Entity\User $user
 */
class Award extends Entity
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
    protected $accessible = [
        '*' => true,
        'id' => false
    ];
}
